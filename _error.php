<?php defined( '_JEXEC' ) or die; ?>
<?php

	// variables
	$app            = JFactory::getApplication();
	$doc            = JFactory::getDocument();
	$menu           = $app->getMenu();
	$active         = $app->getMenu()->getActive();
	$params         = $app->getParams();
	$pageclass      = $params->get('pageclass_sfx');
	$tpath          = $this->baseurl.'/templates/'.$this->template;
	$templateparams	= $app->getTemplate(true)->params;

	// template params
	$siteName      = $app->get('sitename');
	$logo_s        = $templateparams->get('logo-s');
	$subtitle      = $templateparams->get('subtitle');
	$tname				 = $app->getTemplate();
 ?>
<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="<?php echo $tpath; ?>/dist/font5/css/fontawesome-all.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo $tpath; ?>/css/error.min.css?ver=4.0.0" rel="stylesheet" type="text/css" />
	<script src="<?php echo $this->baseurl; ?>/media/jui/js/jquery.min.js?f25045bd9c368c5026602df705ce0673" type="text/javascript"></script>
	<script src="<?php echo $this->baseurl; ?>/media/jui/js/jquery-migrate.min.js?f25045bd9c368c5026602df705ce0673" type="text/javascript"></script>
	<script src="<?php echo $tpath; ?>/js/bootstrapv4/popper.min.js" type="text/javascript"></script>
	<script src="<?php echo $tpath; ?>/js/bootstrapv4/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo $tpath; ?>/js/logic-lite.js?ver=2.0.0" type="text/javascript"></script>
</head>
<body>

	<?php $modules = JModuleHelper::getModules('overlay'); ?>
	<?php foreach ($modules AS $module ) : ?>
		<?php echo JModuleHelper::renderModule($module); ?>
	<?php endforeach; ?>

	<?php $navside = JModuleHelper::getModules('nav-side'); ?>
	<?php if ($navside) : ?>
		<div class="offcanvas-menu">
			<?php foreach ($navside AS $module ) : ?>
				<?php echo JModuleHelper::renderModule($module); ?>
			<?php endforeach; ?>
		</div>
		<a href="#" class="menu-button" id="open-button" data-toggle="offcanvas">
			<span class="bar"></span>
			<span class="bar"></span>
			<span class="bar"></span>
		</a>
	<?php endif; ?>

	<div class="site-wrap">
		<ul class="list-unstyled mb-0 skip-link">
			<li class="text-center goto-burger"><a href="#open-button" accesskey="1" title="<?php echo JText::_('TPL_AFFINITY_SKIPLINK_GOTO_MENU') ?>" class="page-scroll"><?php echo JText::_('TPL_AFFINITY_SKIPLINK_GOTO_MENU') ?></a></li>
			<li class="text-center goto-content"><a href="#main-content" accesskey="2" title="<?php echo JText::_('TPL_AFFINITY_SKIPLINK_GOTO_CONTENT') ?>" class="page-scroll"><?php echo JText::_('TPL_AFFINITY_SKIPLINK_GOTO_CONTENT') ?></a></li>
		</ul>

		<header>
			<?php $htopLeft  = JModuleHelper::getModules('htop-left'); ?>
			<?php $htopRight = JModuleHelper::getModules('htop-right'); ?>
			<?php if ($htopLeft OR $htopRight) : ?>
			<div class="header-top">
				<div class="container">
					<div class="row">
						<?php if ($htopLeft) : ?>
						<nav class="col-2 col-lg-7 htop-left d-flex justify-content-start top-nav navbar-expand-lg">
							<button class="navbar-toggler" type="button" data-toggle="offcanvas-collapse">
								<i class="fal fa-bars"></i>
							</button>
							<div class="navbar-collapse offcanvas-collapse" id="top-nav">
								<?php foreach ($htopLeft AS $module ) : ?>
									<?php echo JModuleHelper::renderModule($module); ?>
								<?php endforeach; ?>
							</div>
						</nav>
						<?php endif; ?>
						<?php if ($htopRight) : ?>
						<div class="col-10 col-lg-5 htop-right d-flex justify-content-end">
							<?php foreach ($htopRight AS $module ) : ?>
								<?php echo JModuleHelper::renderModule($module); ?>
							<?php endforeach; ?>
						</div>
						<?php endif; ?>
					</div>
				</div>
			</div><!-- end .header-top -->
			<?php endif; ?>

			<div class="header-banner">
				<div class="container">
					<div class="row">
						<!-- site name -->
						<div class="col-10 col-sm-10 col-md-6 col-lg-6 site-name d-flex align-items-center">
							<a href="<?php echo JURI::base() ?>" class="d-flex align-items-center" title="<?php echo $siteName ?>">
								<?php if(isset($logo_s) AND $logo_s != '') : ?>
									<img src="<?php echo JURI::base().$logo_s ?>" class="rounded img-fluid float-left mr-4" alt="<?php echo $siteName ?>">
								<?php else : ?>
									<img src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" width="80" height="80" class="rounded img-fluid float-left mr-4" alt="<?php echo $siteName ?>">
								<?php endif; ?>
								<div>
									<h1 class="mb-0"><?php echo $siteName ?></h1>
									<?php if($subtitle) : ?>
										<p class="mb-0"><?php echo $subtitle ?></p>
									<?php endif; ?>
								</div>
							</a>
						</div>
						<!-- search icon -->
						<?php $search = JModuleHelper::getModules('search'); ?>
						<?php if ($search) : ?>
						<div class="col-2 search-bar-icon">
							<a data-toggle="collapse" href="#searchBarCollapse" aria-expanded="false" aria-controls="searchBarCollapse">
								<i class="far fa-search"></i>
							</a>
						</div>
						<?php endif; ?>
						<!-- social e search bar -->
						<?php $social = JModuleHelper::getModules('social'); ?>
						<?php if($social OR $search) : ?>
						<div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex align-self-center align-items-end flex-column">
							<?php if ($social) : ?>
								<div class="social-bar-wrapper">
									<?php foreach ($social AS $module ) : ?>
										<?php echo JModuleHelper::renderModule($module); ?>
									<?php endforeach; ?>
								</div>
							<?php endif; ?>
							<?php if ($search) : ?>
								<div class="search-wrapper collapse" id="searchBarCollapse">
									<?php foreach ($search AS $module ) : ?>
										<?php echo JModuleHelper::renderModule($module); ?>
									<?php endforeach; ?>
								</div>
							<?php endif; ?>
						</div>
						<?php endif; ?>
					</div>
				</div>
			</div>

			<?php $navbar = JModuleHelper::getModules('navbar'); ?>
			<?php if ($navbar) : ?>
			<div class="header-nav">
				<div class="container p-0">
					<nav class="navbar navbar-expand-md navbar-light bg-faded">
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#meganav" aria-controls="meganav" aria-expanded="false" aria-label="Toggle navigation">
							<i class="fal fa-bars"></i>
							<span class="navbar-toggler-text">MENU</span>
						</button>
						<div class="collapse navbar-collapse" id="meganav">
							<?php foreach ($navbar AS $module ) : ?>
								<?php echo JModuleHelper::renderModule($module); ?>
							<?php endforeach; ?>
						</div>
					</nav><!-- end .navbar-nav -->
				</div>
			</div>
			<?php endif; ?>
		</header>

		<main class="wrapper error-display">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<h2 class="code-error">
							<i class="fa fa-meh-o" aria-hidden="true"></i> <?php echo $this->error->getCode() ?>!
						</h2>
						<h3 class="message"><?php echo $this->error->getMessage(); ?></h3>

						<p><?php echo JText::_("TPL_AFFINITY_ERROR_1") ?></p>
						<p class="mb-0"><?php echo JText::_("TPL_AFFINITY_ERROR_2") ?></p>
						<ul>
							<li><?php echo JText::_("TPL_AFFINITY_ERROR_3") ?></li>
							<li><?php echo JText::_("TPL_AFFINITY_ERROR_4") ?></li>
							<li><?php echo JText::_("TPL_AFFINITY_ERROR_5") ?></li>
						</ul>
						<p class="text-center">
							<a href="<?php echo JURI::base() ?>" class="btn btn-primary"><?php echo JText::_("TPL_AFFINITY_ERROR_BACKHOME") ?></a>
						</p>
					</div>
				</div>
			</div>
		</main>

		<footer class="wrapper footer">
			<div class="container pt-3 pb-5">
				<div class="row footer-sitename">
					<div class="col-12 d-flex align-items-center">
						<?php if(isset($logo_s) AND $logo_s != '') : ?>
							<img src="<?php echo JURI::base().$logo_s ?>" class="rounded img-fluid float-left mr-3" alt="<?php echo $siteName ?>">
						<?php else : ?>
							<img src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" width="80" height="80" class="rounded img-fluid float-left mr-3" alt="<?php echo $siteName ?>">
						<?php endif; ?>
						<p class="mb-0"><?php echo $siteName ?></p>
					</div>
				</div>

				<?php $footer_bottom = JModuleHelper::getModules('footer-bottom'); ?>
				<?php $attribs['style'] = 'footer'; ?>
				<?php if ($footer_bottom) : ?>
				<div class="row footer-bottom">
					<?php foreach ($footer_bottom AS $module ) : ?>
						<?php echo JModuleHelper::renderModule($module, $attribs); ?>
					<?php endforeach; ?>
					<jdoc:include type="modules" name="footer-bottom" style="footer" />
				</div>
				<?php endif; ?>
			</div>
			<div class="footer-links bg-dark py-4">
				<div class="container">
					<div class="row">
						<?php $footer_links = JModuleHelper::getModules('footer-links'); ?>
						<?php if ($footer_links) : ?>
							<div class="col-12 col-sm-12 col-md-12 col-lg-8 d-flex justify-content-start">
								<?php foreach ($footer_links AS $module ) : ?>
									<?php echo JModuleHelper::renderModule($module); ?>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>
						<div class="col-12 col-sm-12 col-md-12 col-lg footer-copy">
							<?php echo JLayoutHelper::render('joomla.content.spedisrl'); ?>
						</div>
					</div>
				</div>
			</div>
		</footer>
	</div>

</body>
</html>
