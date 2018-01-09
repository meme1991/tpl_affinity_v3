<?php defined( '_JEXEC' ) or die; ?>
<?php

	// variables
	$app            = JFactory::getApplication();
	// $doc            = JFactory::getDocument();
	// $menu           = $app->getMenu();
	// $active         = $app->getMenu()->getActive();
	// $params         = $app->getParams();
	// $pageclass      = $params->get('pageclass_sfx');
	// $tpath          = $this->baseurl.'/templates/'.$this->template;
	// $templateparams	= $app->getTemplate(true)->params;

	// template params
	$siteName      = $app->get('sitename');
 ?>
<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >
<head>
	<title><?php echo $siteName ?> - <?php echo JText::_("TPL_AFFINITY_OFFLINE_HEADER") ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="<?php echo $tpath; ?>/fonts/dist/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo $tpath; ?>/css/offline.min.css?ver=1.0.0" rel="stylesheet" type="text/css" />
</head>
<body>

	<div class="container" style="margin-top: 200px;">
		<div class="row">
			<div class="col-12 text-center">
				<i class="fa fa-cogs fa-3x"></i>
				<h1 class="display-4"><?php echo JText::_("TPL_AFFINITY_OFFLINE_HEADER") ?></h1>
				<?php if ($app->getCfg('display_offline_message', 1) == 1 && str_replace(' ', '', $app->getCfg('offline_message')) != ''): ?>
					<p class="my-3 lead"><?php echo $app->getCfg('offline_message') ?></p>
				<?php else: ?>
					<p class="my-3 lead"><?php echo JText::_("TPL_AFFINITY_OFFLINE_DEFAULT_MESSAGE") ?></p>
				<?php endif; ?>
			</div>
		</div>
	</div>

</body>
</html>
