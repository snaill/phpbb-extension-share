<?php
/**
 *
 * @package       phpBB Extension - Share
 * @copyright (c) 2020 snaill
 * @license       http://opensource.org/licenses/gpl-2.0.php GNU General Public License v3
 *
 */

namespace sharepai\share\migrations;

class install_share_1_0_0 extends \phpbb\db\migration\migration
{
	public function update_data()
	{
		return [
			['config.add', ['share_status', 0]],
			['config.add', ['share_type', 1]],
			['config.add', ['share_host', '']],
			['config.add', ['share_image_url', '']],
			['config.add', ['share_desc', '']],
			[
				'module.add',
				[
					'acp',
					'ACP_CAT_DOT_MODS',
					'ACP_SHARE_TITLE',
				],
			],
			[
				'module.add',
				[
					'acp',
					'ACP_SHARE_TITLE',
					[
						'module_basename' => '\sharepai\share\acp\share_module',
						'modes'           => ['settings'],
					],
				],
			],
		];
	}
}
