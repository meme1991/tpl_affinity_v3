<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_users
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::_('behavior.keepalive');
JHtml::_('behavior.formvalidator');
?>
<div class="wrapper container com_users registration <?php echo $this->pageclass_sfx; ?>">
	<div class="row justify-content-center">
		<div class="col-12 col-sm-12 col-md-10 col-lg-8">
			<?php if ($this->params->get('show_page_heading')) : ?>
				<?php echo JLayoutHelper::render('joomla.content.title.title_page', $this->escape($this->params->get('page_heading'))) ?>
			<?php endif; ?>

			<form id="member-registration" action="<?php echo JRoute::_('index.php?option=com_users&task=registration.register'); ?>" method="post" class="form-validate mt-3" enctype="multipart/form-data">
				<div class="form-row">
			    <div class="col-12 col-sm-6">
						<input type="text" placeholder="<?= JText::_('Nome e cognome') ?>" name="jform[name]" id="jform_name" value="" class="form-control required invalid mb-3" size="30" required="required" aria-required="true" aria-invalid="true">
						<input type="password" placeholder="<?= JText::_('Password') ?>" name="jform[password1]" id="jform_password1" value="" autocomplete="off" class="form-control validate-password required invalid mb-3" size="30" maxlength="99" required="required" aria-required="true" aria-invalid="true">
						<input type="email" placeholder="<?= JText::_('Email') ?>" name="jform[email1]" class="form-control validate-email required invalid mb-3" id="jform_email1" value="" size="30" autocomplete="email" required="required" aria-required="true" aria-invalid="true">
					</div>
					<div class="col-12 col-sm-6">
						<input type="text" placeholder="<?= JText::_('Username') ?>" name="jform[username]" id="jform_username" value="" class="form-control validate-username required invalid mb-3" size="30" required="required" aria-required="true" aria-invalid="true">
						<input type="password" placeholder="<?= JText::_('Ridigita la password') ?>" name="jform[password2]" id="jform_password2" value="" autocomplete="off" class="form-control validate-password required invalid mb-3" size="30" maxlength="99" required="required" aria-required="true" aria-invalid="true">
						<input type="email" placeholder="<?= JText::_('Ridigita la email') ?>" name="jform[email2]" class="form-control validate-email required invalid mb-3" id="jform_email2" value="" size="30" required="required" aria-required="true" aria-invalid="true">
					</div>
					<div class="col-12">
						<button type="submit" class="btn btn-primary btn-block validate mb-3">
							<i class="fas fa-check-circle"></i> <?php echo JText::_('Continua'); ?>
						</button>
						<!-- <a class="btn btn-link btn-block" href="<?php echo JRoute::_(''); ?>" title="<?php echo JText::_('JCANCEL'); ?>">
							<i class="far fa-times"></i> <?php echo JText::_('JCANCEL'); ?>
						</a> -->
						<input type="hidden" name="option" value="com_users" />
						<input type="hidden" name="task" value="registration.register" />
					</div>
				</div>

				<?php echo JHtml::_('form.token'); ?>
			</form>
		</div>
	</div>
</div>
