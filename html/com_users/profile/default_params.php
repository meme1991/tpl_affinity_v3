<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_users
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');

?>
<div class="wrapper com_users profile <?php echo $this->pageclass_sfx; ?>">
	<div class="container">
		<div class="row">

			<div class="col-12 col-sm-12 col-md-3 col-lg-3 sidebar-alt">
				<ul class="list-group list-striped list-hover">
					<li class="list-group-item">
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
					<li class="list-group-item active">
						<a href="<?php echo JRoute::_("index.php?".$_SERVER['QUERY_STRING']."&layout=default_params"); ?>">
							<i class="fas fa-cog mr-2"></i>Impostazioni
						</a>
					</li>
				</ul>
			</div>
			<div class="col-12 col-sm-12 col-md col-lg params">
				<?php $fields = $this->form->getFieldset('params'); ?>
				<?php if (count($fields)) : ?>
					<fieldset id="users-profile-custom">
						<h3><?php echo JText::_('COM_USERS_SETTINGS_FIELDSET_LABEL'); ?></h3>
						<dl class="dl-horizontal">
						<?php foreach ($fields as $field) :
							if (!$field->hidden) : ?>
							<dt><?php echo $field->title; ?></dt>
							<dd>
								<?php if (JHtml::isRegistered('users.' . $field->id)) : ?>
									<?php echo JHtml::_('users.' . $field->id, $field->value); ?>
								<?php elseif (JHtml::isRegistered('users.' . $field->fieldname)) : ?>
									<?php echo JHtml::_('users.' . $field->fieldname, $field->value); ?>
								<?php elseif (JHtml::isRegistered('users.' . $field->type)) : ?>
									<?php echo JHtml::_('users.' . $field->type, $field->value); ?>
								<?php else : ?>
									<?php echo JHtml::_('users.value', $field->value); ?>
								<?php endif; ?>
							</dd>
							<?php endif; ?>
						<?php endforeach; ?>
						</dl>
					</fieldset>
				<?php else: ?>
					<?php echo JLayoutHelper::render('joomla.content.message.message_info', JText::_("Non puoi visualizzare questa area. E' possibile che non esistano impostazioni da visualizzare o che non sei abilitato a visualizzarle.")); ?>
				<?php endif; ?>

			</div>

		</div>
	</div>
</div>
