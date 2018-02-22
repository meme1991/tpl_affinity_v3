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
<?php var_dump($_SERVER['QUERY_STRING']) ?>
<div class="wrapper com_users profile <?php echo $this->pageclass_sfx; ?>">
	<div class="container">
		<div class="row">
			<?php if ($this->params->get('show_page_heading')) : ?>
				<div class="col-12">
					<?php echo JLayoutHelper::render('joomla.content.title.title_page', $this->escape($this->params->get('page_heading'))) ?>
				</div>
			<?php endif; ?>

			<div class="col-12 col-sm-12 col-md d-flex align-items-center action-block">
				<a href="<?php echo JRoute::_("index.php?".$_SERVER['QUERY_STRING']."&viewprofile=1"); ?>" class="no-underline">
					<span class="fa-stack fa-2x">
					  <i class="fas fa-circle fa-stack-2x text-light"></i>
					  <i class="fas fa-user fa-stack-1x text-primary"></i>
					</span>
					<span class="ml-3">Profilo</span>
				</a>
			</div>

			<div class="col-12 col-sm-12 col-md d-flex align-items-center action-block">
				<a href="<?= $_SERVER['PHP_SELF'] ?>">
					<span class="fa-stack fa-2x">
					  <i class="fas fa-circle fa-stack-2x text-light"></i>
					  <i class="fas fa-edit fa-stack-1x text-primary"></i>
					</span>
					<span class="ml-3">Modifica profilo</span>
				</a>
			</div>

			<div class="col-12 col-sm-12 col-md d-flex align-items-center action-block">
				<a href="<?= $_SERVER['PHP_SELF'] ?>">
					<span class="fa-stack fa-2x">
					  <i class="fas fa-circle fa-stack-2x text-light"></i>
					  <i class="fas fa-cog fa-stack-1x text-primary"></i>
					</span>
					<span class="ml-3">Impostazioni</span>
				</a>
			</div>

			<?php if(isset($_REQUEST['viewprofile'])) : ?>

				<?php switch ($_REQUEST['viewprofile']) {
					case 1: echo $this->loadTemplate('core'); break;
				} ?>

			<?php endif; ?>


		</div>
	</div>
</div>
