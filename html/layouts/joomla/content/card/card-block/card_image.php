<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;

$params = $displayData->params;
$images = json_decode($displayData->images);
$link   = JRoute::_(ContentHelperRoute::getArticleRoute($displayData->slug, $displayData->catid, $displayData->language));
$alt    = (isset($images->image_intro_alt) AND $images->image_intro_alt != '') ? $images->image_intro_alt : $displayData->title;
?>
<?php if (isset($images->image_intro) && !empty($images->image_intro)) : ?>
  <figure class="default">
    <img src="<?php echo htmlspecialchars($images->image_intro, ENT_COMPAT, 'UTF-8'); ?>" class="img-fluid" alt="<?php echo htmlspecialchars($alt, ENT_COMPAT, 'UTF-8'); ?>" />
    <figcaption class="d-flex justify-content-center align-items-center">
      <i class="far fa-external-link fa-3x"></i>
    </figcaption>
    <a href="<?php echo $link ?>" title="<?php echo $displayData->title ?>"></a>
  </figure>
<?php endif; ?>
