<?php defined('_JEXEC') or die('Restricted access'); ?>

<div class="wrapper jevent-weekview">
	<div class="container">
		<div class="row">
			<div class="col-12">
        <?php $this->_header(); ?>
        <?php $this->_showNavTableBar(); ?>
        <?php $cfg	 = JEVConfig::getInstance(); ?>
        <?php echo $this->loadTemplate("responsive"); ?>
        <?php $this->_viewNavAdminPanel(); ?>
        <?php $this->_footer(); ?>
			</div>
		</div>
	</div>
</div>
