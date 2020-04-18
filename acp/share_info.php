<?php
/**
 *
 * @package       phpBB Extension - Share
 * @copyright (c) 2020 snaill
 * @license       http://opensource.org/licenses/gpl-2.0.php GNU General Public License v3
 *
 */

namespace sharepai\share\acp;

class share_info
{
	function module()
	{
		return [
			'filename'	=> '\sharepai\share\acp\share_module',
			'title'		=> 'ACP_SHARE_TITLE',
			'version'	=> '1.0.0',
			'modes'		=> [
				'settings'	=> [
					'title' => 'ACP_SHARE', 
					'auth'	=> 'ext_sharepai/share && acl_a_group', 
					'cat' => ['ACP_OSS_TITLE']
				],
			],
		];
	}
}
