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
						<div class="form-group">
							<label for="jform_name"><?= JText::_('TPL_AFFINITY_REGISTRATION_NAME') ?></label>
							<input type="text" placeholder="<?= JText::_('es. Mario Rossi') ?>" name="jform[name]" id="jform_name" value="" class="form-control required invalid mb-3" size="30" required="required" aria-required="true" aria-invalid="true">
						</div>
						<div class="form-group">
							<label for="jform_password1"><?= JText::_('TPL_AFFINITY_REGISTRATION_PASSWORD') ?></label>
							<input type="password" placeholder="<?= JText::_('Digita la password') ?>" name="jform[password1]" id="jform_password1" value="" autocomplete="off" class="form-control validate-password required invalid mb-3" size="30" maxlength="99" required="required" aria-required="true" aria-invalid="true">
						</div>
						<div class="form-group">
							<label for="jform_email1"><?= JText::_('TPL_AFFINITY_REGISTRATION_EMAIL') ?></label>
							<input type="email" placeholder="<?= JText::_('es. esempio@email.it') ?>" name="jform[email1]" class="form-control validate-email required invalid mb-3" id="jform_email1" value="" size="30" autocomplete="email" required="required" aria-required="true" aria-invalid="true">
						</div>
					</div>
					<div class="col-12 col-sm-6">
						<div class="form-group">
							<label for="jform_username"><?= JText::_('TPL_AFFINITY_REGISTRATION_USERNAME') ?></label>
							<input type="text" placeholder="<?= JText::_('Digita lo username') ?>" name="jform[username]" id="jform_username" value="" class="form-control validate-username required invalid mb-3" size="30" required="required" aria-required="true" aria-invalid="true">
						</div>
						<div class="form-group">
							<label for="jform_password2"><?= JText::_('TPL_AFFINITY_REGISTRATION_PASSWORD1') ?></label>
							<input type="password" placeholder="<?= JText::_('Digita la password') ?>" name="jform[password2]" id="jform_password2" value="" autocomplete="off" class="form-control validate-password required invalid mb-3" size="30" maxlength="99" required="required" aria-required="true" aria-invalid="true">
						</div>
						<div class="form-group">
							<label for="jform_email2"><?= JText::_('TPL_AFFINITY_REGISTRATION_EMAIL1') ?></label>
							<input type="email" placeholder="<?= JText::_('es. esempio@email.it') ?>" name="jform[email2]" class="form-control validate-email required invalid mb-3" id="jform_email2" value="" size="30" required="required" aria-required="true" aria-invalid="true">
						</div>
					</div>
					<div class="col-12">
						<button type="submit" class="btn btn-primary btn-block validate mb-3">
							<i class="fas fa-check-circle"></i> <?php echo JText::_('Continua'); ?>
						</button>
						<input type="hidden" name="option" value="com_users" />
						<input type="hidden" name="task" value="registration.register" />
					</div>
				</div>

				<?php echo JHtml::_('form.token'); ?>
			</form>
		</div>
	</div>
</div>
