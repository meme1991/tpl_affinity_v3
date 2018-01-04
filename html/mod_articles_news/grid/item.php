<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_news
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<div class="grid-item col-12 col-sm-12 col-md-6 col-lg-<?php echo $col ?> mb-3">
  <?php echo JLayoutHelper::render('joomla.content.card.card-default', $item); ?>
</div>
