<?php defined('_JEXEC') or die('Restricted access'); ?>
<?php $tmpl = JFactory::getApplication()->getTemplate(); ?>
<?php require_once JPATH_ROOT . '/templates/'.$tmpl.'/libreries/extHelper.inc.php'; ?>

<section class="wrapper pd-categories-view">
	<div class="container">
		<div class="row">
			<?php if ($this->t['showpageheading'] != 0) : ?>
				<?php echo JLayoutHelper::render('joomla.content.title.title_page', $this->escape($this->t['p']->get( 'page_heading' ))) ?>
			<?php endif; ?>

			<?php $tab = 0;
				switch ($this->t['tab']) {
					case 'up':
						$tab = 1;
					break;

					case 'cc':
					default:
						$tab = 0;
					break;
				}
			 ?>

			 <?php if ($this->t['displaytabs'] > 0) : ?>
				<div class="col-12 mt-3">

					<?php echo JHtml::_('tabs.start', 'config-tabs-com_phocadownload-user', array('useCookie'=>1, 'startOffset'=> $this->t['tab'])); ?>

					<?php echo JHtml::_('tabs.panel', JHtml::_( 'image', $this->t['pi'].'icon-document-16.png', '') . '&nbsp;'.JText::_('COM_PHOCADOWNLOAD_UPLOAD'), 'files' ); ?>

					<?php echo $this->loadTemplate('files'); ?>

					<?php echo JHtml::_('tabs.end'); ?>

				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
