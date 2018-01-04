<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_syndicate
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<div class="inline-menu syndicate">
	<ul class="list-inline">
		<li class="list-inline-item">
			<a href="<?php echo $link; ?>" title="<?php echo JText::_('TPL_COMUNI_DEFAULT_FEED_ENTRIES'); ?>" target="_blank">
				<?php if (str_replace(' ', '', $text) !== '') : ?>
					<?php echo $text; ?>
				<?php else : ?>
					<?php echo JText::_('TPL_COMUNI_DEFAULT_FEED_ENTRIES'); ?>
				<?php endif; ?>
				<i class="fas fa-rss"></i>
			</a>
		</li>
	</ul>
</div>
