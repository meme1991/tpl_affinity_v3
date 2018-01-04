<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_menu
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// differenzio la classe a seonda del livello di profondità
if($item->level > 1){
	$class = 'dropdown-item';
} else{
	$class = 'nav-link';
}

$class .= $item->anchor_css ? ' '.trim($item->anchor_css) : '';
$title  = $item->anchor_title ? $item->anchor_title : $item->title;

$dropdownClass = '';
$dropdownAttr  = '';
if ($item->deeper){
	$dropdownClass = ' dropdown-toggle';
	$dropdownAttr  = 'id="navbarDropdownMenuLink'.$item->id.'"
										data-toggle="dropdown"
										aria-haspopup="true"
										aria-expanded="false"';
}
$class .= $dropdownClass;

switch ($item->browserNav) {
	case   0: $target = ''; break;
	case   1: $target = 'target=_blank'; break;
	case   2: $target = 'target=_parent'; break;
	default : $target = ''; break;
}
?>
<a class="<?php echo $class ?>"
	href="<?php echo $item->flink ?>"
	<?php echo $dropdownAttr ?>
	<?php echo $target ?>>
	<?php echo $item->title; ?>
</a>
