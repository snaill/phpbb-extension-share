<?php
/**
 *
 * @package       phpBB Extension - Share
 * @copyright (c) 2020 snaill
 * @license       http://opensource.org/licenses/gpl-2.0.php GNU General Public License v3
 *
 */

namespace sharepai\share\acp;

class share_module
{
	var $u_action;

	function main($id, $mode)
	{
		global $user, $template, $request, $config;

		$this->config = $config;
		$this->request = $request;

		$user->add_lang('acp/common');
		$user->add_lang_ext('sharepai/share', 'info_acp_share');
		$this->tpl_name = 'acp_share';
		$this->page_title = $user->lang['ACP_SHARE_TITLE'];
		add_form_key('acp_share');

		if ($request->is_set_post('submit'))
		{
			if (!check_form_key('acp_share'))
			{
				trigger_error('FORM_INVALID');
			}

			$errors = [];
			if (empty($request->variable('share_host', '')))
			{
				$errors[] = $user->lang('ACP_SHARE_HOST_INVALID');
			}

			if (empty($request->variable('share_image_url', '')))
			{
				$errors[] = $user->lang('ACP_SHARE_IMAGE_URL_INVALID');
			}

			// If we have no errors so far, let's ensure our AWS credentials are actually working.
			if (!count($errors)) {

				$config->set('share_status', $request->variable('share_status', true));
				$config->set('share_type', $request->variable('share_type', true));
				$config->set('share_host', $request->variable('share_host', ''));
				$config->set('share_image_url', $request->variable('share_image_url', ''));
				$config->set('share_desc', $request->variable('share_desc', ''));

				trigger_error($user->lang['ACP_SHARE_SAVED'] . adm_back_link($this->u_action));
			}
		}

		$template->assign_vars(array(
			'ACP_SHARE_STATUS'		=> (!empty($this->config['share_status'])) ? true : false,
			'ACP_SHARE_TYPE'		=> (!empty($this->config['share_type'])) ? true : false,
			'ACP_SHARE_HOST'		=> $this->config['share_host'],
			'ACP_SHARE_DESC'		=> $this->config['share_desc'],
			'ACP_SHARE_IMAGE_URL'	=> $this->config['share_image_url'],
			'ACP_SHARE_ERROR'		=> (isset($errors) && (count($errors))) ? implode('<br /><br />', $errors) : '',
			'U_ACTION'				=> $this->u_action,
		));
	}
}
