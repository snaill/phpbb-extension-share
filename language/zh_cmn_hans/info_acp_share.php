<?php
/**
 *
 * @package       phpBB Extension - Share
 * @copyright (c) 2020 snaill
 * @license       http://opensource.org/licenses/gpl-2.0.php GNU General Public License v3
 *
 */

/**
* DO NOT CHANGE
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine
//
// Some characters you may want to copy&paste:
// ’ » “ ” …
//

$lang = array_merge($lang, array(
	// ACP
	'ACP_SHARE_TITLE'			=> '微信分享',
	'ACP_SHARE'					=> '设置',
	'ACP_SHARE_EXPLAIN'			=> '将你的主题或帖子分享到微信。',
	'ACP_SHARE_SAVED'			=> '修改已保存。',

	'ACP_SHARE_STATUS'			=> '启用',
	'ACP_SHARE_TYPE'			=> '分享类型',
	'ACP_SHARE_TYPE_EXPLAIN'	=> '你可以选择分享 <strong>主题</strong> 链接还是主题中的每一个单独 <strong>帖子</strong>。',
	'ACP_SHARE_HOST'			=> '签名URL',
	'ACP_SHARE_HOST_EXPLAIN'	=> '微信分享需要服务器计算签名，您需要提供一个API，根据url参数，返回JSSDK config。',
	'ACP_SHARE_HOST_INVALID'	=> '签名URL不得为空。',
	'ACP_SHARE_DESC'			=> '分享说明(选填)',
	'ACP_SHARE_DESC_EXPLAIN'	=> '微信分享说明，默认使用论坛名称。',
	'ACP_SHARE_IMAGE_URL'			=> '分享图片链接',
	'ACP_SHARE_IMAGE_URL_EXPLAIN'	=> '默认使用发帖用户头像，没有设置头像则使用本链接。',
	'ACP_SHARE_IMAGE_URL_INVALID'	=> '必须包含一个有效的图片URL，否则可能无法得到有效的分享样式。'
));
