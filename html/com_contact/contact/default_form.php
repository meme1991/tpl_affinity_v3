<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_contact
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::_('behavior.keepalive');
JHtml::_('behavior.formvalidator');
$this->form->setFieldAttribute('contact_name', 'hint', 'Placeholder text');
$this->form->setFieldAttribute('contact_email', 'hint', 'Placeholder text');
$this->form->setFieldAttribute('contact_subject', 'hint', 'Placeholder text');

?>

<div class="col-12 mt-3 mt-lg-0 form-module sidebar bg-light">
	<div class="aside-title">
		<h4><?php echo JText::_('TPL_AFFINITY_FORM_CONTACT_LABEL') ?></h4>
	</div>
	<div class="contact-form">
		<form id="contact-form" action="<?php echo JRoute::_('index.php'); ?>" method="post" class="form-validate form-horizontal well">
			<div class="form-row">
				<?php foreach ($this->form->getFieldsets() as $fieldset) : ?>
					<?php if ($fieldset->name === 'captcha' && !$this->captchaEnabled) : ?>
						<?php continue; ?>
					<?php endif; ?>
					<?php $fields = $this->form->getFieldset($fieldset->name); ?>
					<?php if (count($fields)) : ?>
						<div class="col-12 col-sm-12 col-md-6 mb-3">
							<!-- name -->
							<?php echo $fields['jform_contact_name']->label ?>
							<?php echo $fields['jform_contact_name']->input ?>
							<!-- email -->
							<?php echo $fields['jform_contact_email']->label ?>
							<?php echo $fields['jform_contact_email']->input ?>
							<!-- oggetto -->
							<?php echo $fields['jform_contact_emailmsg']->label ?>
							<?php echo $fields['jform_contact_emailmsg']->input ?>
						</div>
						<div class="col-12 col-sm-12 col-md-6 mb-3">
							<!-- messaggio -->
							<?php echo $fields['jform_contact_message']->label ?>
							<?php echo $fields['jform_contact_message']->input ?>
						</div>
							<?php //var_dump($fields[0]->label) ?>
							<?php //foreach ($fields as $k => $field) : ?>
								<?php //var_dump($k) ?>
								<?php //echo $field->label; ?>
	            	<?php //echo $field->input; ?>
								<?php //echo $field->renderField(); ?>
							<?php //endforeach; ?>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
			<div class="control-group mt-2">
				<div class="controls">
					<button class="btn btn-primary btn-block validate" type="submit"><?php echo JText::_('TPL_AFFINITY_FORM_SEND_LABEL'); ?> <i class="fas fa-paper-plane pl-2"></i></button>
					<input type="hidden" name="option" value="com_contact" />
					<input type="hidden" name="task" value="contact.submit" />
					<input type="hidden" name="return" value="<?php echo $this->return_page; ?>" />
					<input type="hidden" name="id" value="<?php echo $this->contact->slug; ?>" />
					<?php echo JHtml::_('form.token'); ?>
				</div>
			</div>
		</form>
	</div>
</div>
