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
?>

<div class="col-12 col-sm-12 col-md-12 col-lg-3 mt-3 mt-lg-0 form-module sidebar">
	<div class="aside-title">
		<h4><?php echo JText::_('TPL_AFFINITY_FORM_CONTACT_LABEL') ?></h4>
	</div>
	<div class="contact-form">
		<form id="contact-form" action="<?php echo JRoute::_('index.php'); ?>" method="post" class="form-validate form-horizontal well">
			<?php foreach ($this->form->getFieldsets() as $fieldset) : ?>
				<?php if ($fieldset->name === 'captcha' && !$this->captchaEnabled) : ?>
					<?php continue; ?>
				<?php endif; ?>
				<?php $fields = $this->form->getFieldset($fieldset->name); ?>
				<?php if (count($fields)) : ?>
					<fieldset>
						<?php foreach ($fields as $field) : ?>
							<?php echo $field->label; ?>
            	<?php echo $field->input; ?>
							<?php //echo $field->renderField(); ?>
						<?php endforeach; ?>
					</fieldset>
				<?php endif; ?>
			<?php endforeach; ?>
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
