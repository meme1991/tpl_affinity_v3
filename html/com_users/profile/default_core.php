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
<div class="wrapper com_users profile <?php echo $this->pageclass_sfx; ?>">
	<div class="container">
		<div class="row">

			<div class="col-12 col-sm-12 col-md-3 col-lg-3 sidebar-alt">
				<ul class="list-group list-striped list-hover">
					<li class="list-group-item active">
						<a href="<?php echo JRoute::_("index.php?".$_SERVER['QUERY_STRING']."&layout=default_core"); ?>">
							<i class="fas fa-user mr-2"></i>Profilo
						</a>
					</li>
					<?php if (JFactory::getUser()->id == $this->data->id) : ?>
						<li class="list-group-item">
							<a href="<?php echo JRoute::_('index.php?option=com_users&task=profile.edit&user_id=' . (int) $this->data->id); ?>">
								<i class="fas fa-edit mr-2"></i>Modifica profilo
							</a>
						</li>
					<?php endif; ?>
					<li class="list-group-item">
						<a href="<?php echo JRoute::_("index.php?".$_SERVER['QUERY_STRING']."&layout=default_params"); ?>">
							<i class="fas fa-cog mr-2"></i>Impostazioni
						</a>
					</li>
				</ul>
			</div>
			<div class="col-12 col-sm-12 col-md col-lg core">
				<fieldset id="users-profile-core">
					<h3>
						<?php echo JText::_('COM_USERS_PROFILE_CORE_LEGEND'); ?>
					</h3>
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

		</div>
	</div>
</div>
