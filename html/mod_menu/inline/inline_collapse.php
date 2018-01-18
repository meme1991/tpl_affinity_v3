<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_menu
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// $class  = $item->anchor_css ? trim($item->anchor_css) : '';
// $title  = $item->anchor_title ? $item->anchor_title : $item->title;
$flink  = JFilterOutput::ampReplace(htmlspecialchars($item->flink));

if ($item->anchor_title)
	$attributes['title'] = $item->anchor_title;
else
	$attributes['title'] = $item->title;

// link in evidenza
// if($linkfeatured){
// 	$item->anchor_css .= ' featured-htop ';
// }

$attributes['data-toggle'] = 'collapse';
$attributes['role'] = 'button';
$attributes['aria-expanded'] = 'false';
$attributes['aria-controls'] = 'navbarCollapseMenuLink-'.$item->id;

if ($item->anchor_css)
	$attributes['class'] = $item->anchor_css;

if ($item->anchor_rel)
	$attributes['rel'] = $item->anchor_rel;

switch ($item->browserNav) {
	case   0: unset($attributes['target']); break;
	case   1: $attributes['target'] = '_blank'; break;
	case   2: $attributes['target'] = '_parent'; break;
	// default : $attributes['target'] = ''; break;
}

if ($accesskey)
	$attributes['accesskey'] = $accesskey;

// costruisco il titolo del links se ci sono delle icone
$title = $item->title;
if($iconYN AND $pos == 1)
	$title = '<i class="'.$icon.' mr-1"></i>'.$item->title;
elseif($iconYN AND $pos == 0)
	$title = $item->title.'<i class="'.$icon.' ml-1"></i>';
?>
<?php echo JHtml::_('link', '#navbarCollapseMenuLink-'.$item->id, $title, $attributes); ?>