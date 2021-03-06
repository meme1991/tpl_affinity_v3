<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_login
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JLoader::register('UsersHelperRoute', JPATH_SITE . '/components/com_users/helpers/route.php');

JHtml::_('behavior.keepalive');
// JHtml::_('bootstrap.tooltip');
$class_sfx      = $params->get('moduleclass_sfx');
$bootstrap_size = ($params->get('bootstrap_size') == 0) ? '' : '-'.$params->get('bootstrap_size');
?>
<!-- Example single danger button -->
<div class="mod_login btn-group featured-htop <?php echo $class_sfx ?>">
  <button type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="far fa-sign-in mr-2"></i>
    <?php echo JText::_("TPL_AFFINITY_PLACEHOLDER_LOGIN") ?>
  </button>
  <div class="dropdown-menu dropdown-menu-right">
		<form action="<?php echo JRoute::_('index.php', true, $params->get('usesecure')); ?>" method="post" id="login-form" class="custom-form">
			<div class="form-group row" id="form-login-username">
			  <label for="modlgn-username" class="col-2 col-form-label sr-only"><?php echo JText::_('MOD_LOGIN_VALUE_USERNAME'); ?></label>
			  <div class="col-12">
			    <input class="form-control" name="username" type="text" placeholder="<?php echo JText::_('MOD_LOGIN_VALUE_USERNAME'); ?>" value="" id="modlgn-username">
			  </div>
			</div>
			<div class="form-group row" id="form-login-password">
			  <label for="modlgn-passwd" class="col-2 col-form-label sr-only"><?php echo JText::_('JGLOBAL_PASSWORD'); ?></label>
			  <div class="col-12">
			    <input class="form-control" name="password" type="password" placeholder="<?php echo JText::_('JGLOBAL_PASSWORD'); ?>" value="" id="modlgn-passwd">
			  </div>
			</div>
			<?php if (JPluginHelper::isEnabled('system', 'remember')) : ?>
			<div class="form-group row" id="form-login-remember">
				<div class="col-12">
          <label for="modlgn-remember" class="checkbox" aria-invalid="false">
          	<input type="checkbox" name="remember" value="yes" id="modlgn-remember">
            <?php echo JText::_('MOD_LOGIN_REMEMBER_ME'); ?>
          </label>
				</div>
			</div>
			<?php endif; ?>
			<div class="form-group row" id="form-login-submit">
				<div class="col-12">
					<button type="submit" name="Submit" tabindex="0" class="btn btn-primary btn-block login-button"><i class="far fa-sign-in mr-2"></i><?php echo JText::_('JLOGIN'); ?></button>
				</div>
			</div>

			<?php $usersConfig = JComponentHelper::getParams('com_users'); ?>
				<ul class="list-unstyled mb-0">
				<?php if ($usersConfig->get('allowUserRegistration')) : ?>
					<li>
						<a href="<?php echo JRoute::_('index.php?option=com_users&view=registration'); ?>">
						<?php echo JText::_('MOD_LOGIN_REGISTER'); ?> <span class="icon-arrow-right"></span></a>
					</li>
				<?php endif; ?>
					<li>
						<a href="<?php echo JRoute::_('index.php?option=com_users&view=remind'); ?>">
						<?php echo JText::_('MOD_LOGIN_FORGOT_YOUR_USERNAME'); ?></a>
					</li>
					<li>
						<a href="<?php echo JRoute::_('index.php?option=com_users&view=reset'); ?>">
						<?php echo JText::_('MOD_LOGIN_FORGOT_YOUR_PASSWORD'); ?></a>
					</li>
				</ul>

			<input type="hidden" name="option" value="com_users" />
			<input type="hidden" name="task" value="user.login" />
			<input type="hidden" name="return" value="<?php echo $return; ?>" />
			<?php echo JHtml::_('form.token'); ?>
		</form>
  </div>
</div>
