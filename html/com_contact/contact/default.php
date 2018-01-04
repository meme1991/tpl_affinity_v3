<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_contact
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$cparams = JComponentHelper::getParams('com_media');
$tparams = $this->params;
?>
<div class="container wrapper contact <?php echo $this->pageclass_sfx; ?>" itemscope itemtype="https://schema.org/Person">
	<div class="row">
		<?php if ($tparams->get('show_page_heading')) : ?>
			<?php echo JLayoutHelper::render('joomla.content.title.title_heading', $this->escape($tparams->get('page_heading'))) ?>
		<?php endif; ?>
		<?php echo $this->item->event->afterDisplayTitle; ?>
		<?php if ($this->contact->name && $tparams->get('show_name')) : ?>
			<?php echo JLayoutHelper::render('joomla.content.title.title_page', $this->contact->name); ?>
		<?php endif; ?>
		<div class="col-12">

			<div class="row mt-3">
				<!-- IMMAGINE/MAPPA -->
				<?php if(($tparams->get('show_image') AND $this->contact->image) OR ($this->contact->address != '' && $this->contact->suburb != '')) : ?>
				<div class="col-12 col-sm-5 col-md-5 col-lg-3 figure">
					<?php if($this->contact->image && $tparams->get('show_image')) : ?>
					<figure>
						<img src="<?php echo $this->contact->image ?>" alt="<?php echo $this->contact->name; ?>" class="figure-img img-fluid rounded" itemprop="image">
					</figure>
					<?php endif; ?>
					<?php if($this->contact->address != '' && $this->contact->suburb != '') : ?>
						<?php $addressMap  = str_replace(' ', '+', $this->contact->address); ?>
						<?php $addressMap .= '+'.str_replace(' ', '+', $this->contact->suburb); ?>
						<iframe
						  frameborder="0"
							style="border:0"
							class="googleMaps"
						  src="https://www.google.com/maps/embed/v1/place?key=AIzaSyD_VIM-UpU5tWPOfngBCBqrTaTSq6qCbiM&q=<?php echo $addressMap ?>"
							allowfullscreen>
						</iframe>
					<?php endif; ?>
				</div>
				<?php endif; ?>
				<!-- IMMAGINE/MAPPA -->

				<!-- DATI, EMAIL, RUOLO, TELEFONO, ...  -->
				<div class="col">
					<?php if ($this->contact->con_position && $tparams->get('show_position')) : ?>
					<div class="field">
						<h4 class="fw-600"><i class="fas fa-user-circle"></i> <?php echo JText::_('TPL_AFFINITY_CONTACTPAGE_POSITION'); ?></h4>
						<?php echo $this->contact->con_position; ?>
					</div>
					<?php endif; ?>

					<?php echo $this->loadTemplate('address'); ?>

					<?php if ($tparams->get('show_links')) : ?>
						<?php echo $this->loadTemplate('links'); ?>
					<?php endif; ?>

					<?php //if ($tparams->get('show_user_custom_fields') && $this->contactUser) : ?>
						<?php echo $this->loadTemplate('user_custom_fields'); ?>
					<?php //endif; ?>

					<?php if ($this->contact->misc && $tparams->get('show_misc')) : ?>
						<div class="field">
							<h4 class="fw-600"><?php echo JText::_('TPL_AFFINITY_CONTACTPAGE_INFO'); ?></h4>
							<p><?php echo $this->contact->misc; ?></p>
						</div>
					<?php endif; ?>
				</div>
				<!-- DATI, EMAIL, RUOLO, TELEFONO, ...  -->

				<!-- CONTACT FORM -->
				<?php if($tparams->get('show_email_form')) : ?>
					<?php echo $this->loadTemplate('form'); ?>
				<?php endif; ?>
				<!-- CONTACT FORM -->

			</div>
		</div>
	</div>

</div>
