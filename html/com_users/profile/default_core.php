<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_users
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

?>
<div class="col-12 col-sm-12 col-md-8 col-lg mt-3">
	<?php if (JFactory::getUser()->id == $this->data->id) : ?>
	<ul class="btn-toolbar pull-right">
		<li class="btn-group">
			<a class="btn btn-secondary" href="<?php echo JRoute::_('index.php?option=com_users&task=profile.edit&user_id=' . (int) $this->data->id); ?>">
				<?php echo JText::_('COM_USERS_EDIT_PROFILE'); ?>
			</a>
		</li>
	</ul>
	<?php endif; ?>

	<fieldset id="users-profile-core">
		<legend>
			<?php echo JText::_('COM_USERS_PROFILE_CORE_LEGEND'); ?>
		</legend>
		<dl class="dl-horizontal">
			<dt>
				<?php echo JText::_('COM_USERS_PROFILE_NAME_LABEL'); ?>
			</dt>
			<dd>
				<?php echo $this->data->name; ?>
			</dd>
			<dt>
				<?php echo JText::_('COM_USERS_PROFILE_USERNAME_LABEL'); ?>
			</dt>
			<dd>
				<?php echo htmlspecialchars($this->data->username, ENT_COMPAT, 'UTF-8'); ?>
			</dd>
			<dt>
				<?php echo JText::_('COM_USERS_PROFILE_REGISTERED_DATE_LABEL'); ?>
			</dt>
			<dd>
				<?php echo JHtml::_('date', $this->data->registerDate); ?>
			</dd>
			<dt>
				<?php echo JText::_('COM_USERS_PROFILE_LAST_VISITED_DATE_LABEL'); ?>
			</dt>

			<?php if ($this->data->lastvisitDate != $this->db->getNullDate()) : ?>
				<dd>
					<?php echo JHtml::_('date', $this->data->lastvisitDate); ?>
				</dd>
			<?php else : ?>
				<dd>
					<?php echo JText::_('COM_USERS_PROFILE_NEVER_VISITED'); ?>
				</dd>
			<?php endif; ?>

		</dl>
	</fieldset>
</div>
