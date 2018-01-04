<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_menu
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$flink  = JFilterOutput::ampReplace(htmlspecialchars($item->flink));

if ($item->anchor_title)
	$attributes['title'] = $item->anchor_title;
else
	$attributes['title'] = $item->title;

$attributes['class'] = 'link-default';
if ($item->anchor_css)
	$attributes['class'] .= ' '.trim($item->anchor_css);

if ($item->anchor_rel)
	$attributes['rel'] = $item->anchor_rel;

if($item->browserNav != 0){
	switch ($item->browserNav) {
		case   0: $attributes['target'] = ''; break;
		case   1: $attributes['target'] = '_blank'; break;
		case   2: $attributes['target'] = '_parent'; break;
		default : $attributes['target'] = ''; break;
	}
}

if ($accesskey)
	$attributes['accesskey'] = $accesskey;

// costruisco il titolo del links se ci sono delle icone
$title = $item->title;
if($iconYN AND $pos == 1)
	$title = '<i class="'.$icon.' pr-1"></i>'.$item->title;
elseif($iconYN AND $pos == 0)
	$title = $item->title.'<i class="'.$icon.' pl-1"></i>';
?>
<?php echo JHtml::_('link', JFilterOutput::ampReplace(htmlspecialchars($flink, ENT_COMPAT, 'UTF-8', false)), $title, $attributes); ?>
