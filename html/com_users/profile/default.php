<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_users
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// if(isset($_REQUEST['viewprofile'])){
// 	$view = (int) $_REQUEST['viewprofile'];
// 	switch ($view) {
// 		case 1: echo $this->loadTemplate('core'); break; // profilo
// 		case 2: echo $this->loadTemplate('params'); break; //
// 		case 3: echo $this->loadTemplate('custom'); break; // impostazioni
// 		default: echo $this->loadTemplate('main'); break; // main menu
// 	}
// }else{
	echo $this->loadTemplate('main');
// }
?>
