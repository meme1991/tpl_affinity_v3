<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_login
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// JHtml::_('behavior.keepalive');
// $class_sfx = $params->get('moduleclass_sfx');
// $bootstrap_size = ($params->get('bootstrap_size') == 0) ? '' : '-'.$params->get('bootstrap_size');
?>
<div class="inline-menu">
  <!-- render module -->
  <?php $modules = JModuleHelper::getModules('ghost-logout'); ?>
  <?php //$attribs['style'] = 'sidebar'; ?>
  <?php foreach ($modules AS $module ) : ?>
    <?php echo JModuleHelper::renderModule($module); ?>
  <?php endforeach; ?>
  <!-- render module -->
</div>
