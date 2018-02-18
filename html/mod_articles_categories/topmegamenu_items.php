<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_categories
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<?php foreach ($list as $item) : ?>
	<li>
		<a href="<?= $item->link; ?>" title="<?= $item->title; ?>" class="dropdown-item"><?= $item->title; ?></a>
	</li>
<?php endforeach; ?>
