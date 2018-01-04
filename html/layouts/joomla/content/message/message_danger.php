<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;

$message = $displayData;
?>
<div class="alert alert-danger" role="alert">
  <i class="icon far fa-exclamation-triangle"></i>
  <h6><?php echo JText::_("TPL_AFFINITY_MESSAGE_HEADER_DANGER") ?></h6>
  <p><?php echo $message ?></p>
</div>
