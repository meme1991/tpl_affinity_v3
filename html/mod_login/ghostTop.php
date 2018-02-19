<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_login
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// JLoader::register('UsersHelperRoute', JPATH_SITE . '/components/com_users/helpers/route.php');
//
// JHtml::_('behavior.keepalive');
// // JHtml::_('bootstrap.tooltip');
// $class_sfx      = $params->get('moduleclass_sfx');
// $bootstrap_size = ($params->get('bootstrap_size') == 0) ? '' : '-'.$params->get('bootstrap_size');
?>
<div class="inline-menu mod_login-ghost featured-htop <?php echo $class_sfx ?>">
  <ul class="list-inline">
    <li class="list-inline-item">
      <a href="http://10.0.0.12/jtest/index.php/com-users/login" role="button" title="Login">
        <i class="far fa-sign-in mr-2"></i><?php echo JText::_("TPL_AFFINITY_PLACEHOLDER_LOGIN") ?>
      </a>
    </li>
  </ul>
</div>
