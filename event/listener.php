<?php

/**
 *
 * @package       phpBB Extension - Share
 * @copyright (c) 2020 snaill
 * @license       http://opensource.org/licenses/gpl-2.0.php GNU General Public License v3
 *
 */

namespace sharepai\share\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Event listener
 */
class listener implements EventSubscriberInterface
{
	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\user */
	protected $user;

	/** @var string PHP file extension */
	protected $php_ext;

	/**
	 * Constructor
	 *
	 * @param \phpbb\template\template $template Template object
	 * @param \phpbb\config\config     $config   Config object
	 * @param \phpbb\user              $user     User object
	 * @param string $php_ext
	 */

	public function __construct(\phpbb\template\template $template, \phpbb\config\config $config, \phpbb\user $user, $php_ext)
	{
		$this->template = $template;
		$this->config = $config;
		$this->user = $user;
		$this->php_ext = $php_ext;
	}

	/**
	 * Assign functions defined in this class to event listeners in the core
	 *
	 * @return array
	 */
	static public function getSubscribedEvents()
	{
		return array(
			'core.common'							=> 'common_setup',
			'core.viewtopic_modify_post_row'		=> 'viewtopic_postrow_shareon',
		);
	}

	public function common_setup($event)
	{
		$this->template->assign_vars(array(
			'S_SHARE_STATUS'	=> $this->config['share_status'] ? true : false,
			'S_SHARE_TYPE'		=> $this->config['share_type'] ? true : false,
			'S_SHARE_HOST'		=> $this->config['share_host']
		));
	}

	public function viewtopic_postrow_shareon($event)
	{
		if ($this->config['share_status']) {

			$row = $event['row'];
			$forum_id = (int) $row['forum_id'];
			$topic_title = $event['topic_data']['topic_title'];

			$topic_url = generate_board_url() . "/viewtopic.$this->php_ext?" . 'f=' . $forum_id . '&t=' . $event['row']['topic_id'];
			$post_url = generate_board_url() . "/viewtopic.$this->php_ext?" . 'p=' . $event['row']['post_id'] . '#p' . $event['row']['post_id'];
			$share_url = !$this->config['share_type'] ? $post_url : $topic_url;

			$this->template->assign_vars(array(
				'S_SHARE_TITLE'		=> $topic_title,
				'S_SHARE_URL'		=> $share_url,
				'S_SHARE_DESC'		=> empty($this->config['share_desc']) ? $this->config['sitename'] : $this->config['share_desc'],
				'S_SHARE_IMGURL' 	=> $this->config['share_image_url']
			));
		}
	}
}
