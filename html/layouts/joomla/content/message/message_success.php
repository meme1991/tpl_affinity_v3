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
<div class="alert alert-success" role="alert">
  <i class="icon far fa-check-circle"></i>
  <h6><?php echo JText::_("TPL_AFFINITY_MESSAGE_HEADER_SUCCESS") ?></h6>
  <p><?php echo $message ?></p>
</div>
