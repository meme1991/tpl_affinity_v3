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
<div class="inline-menu mod_login-ghost <?php echo $class_sfx ?>">
  <ul class="list-inline">
    <li class="list-inline-item">
      <a data-toggle="collapse" href="#htop-ghost" role="button" aria-expanded="false" aria-controls="htop-ghost">
        <i class="far fa-user mr-2"></i>
        <?php if ($params->get('name') == 0) : ?>
    			<?php echo JText::_( htmlspecialchars($user->get('name'), ENT_COMPAT, 'UTF-8')); ?>
    		<?php else : ?>
    			<?php echo JText::_( htmlspecialchars($user->get('username'), ENT_COMPAT, 'UTF-8')); ?>
    		<?php endif; ?>
        <i class="far fa-chevron-down fa-xs ml-2"></i>
      </a>
    </li>
  </ul>
</div>
