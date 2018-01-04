<?php defined( '_JEXEC' ) or die;

  // variables
  $app            = JFactory::getApplication();
  $doc            = JFactory::getDocument();
  $menu           = $app->getMenu();
  $active         = $app->getMenu()->getActive();
  $params         = $app->getParams();
  $pageclass      = $params->get('pageclass_sfx');
  $tpath          = $this->baseurl.'/templates/'.$this->template;
  $templateparams	= $app->getTemplate(true)->params;
  define('TPATH', $tpath);
  define('TNAME', $this->template);

  //var_dump($app);

  // template params
  $siteName      = $app->get('sitename');
  $logo_s        = $templateparams->get('logo-s');
  $subtitle      = $templateparams->get('subtitle');

  // generator tag
  $this->setGenerator(null);

  // force latest IE & chrome frame
  $doc->setMetadata('x-ua-compatible','IE=edge,chrome=1');

  // js
  // carica jquery
  JHtml::_('bootstrap.framework', false);
  JHtml::_('jquery.framework');
  // pulisco gli script di joomla
  // unset($this->_script['text/javascript']);

  unset($doc->_scripts[JURI::root(true).'/media/jui/js/jquery-noconflict.js']);
  unset($doc->_scripts[JURI::root(true).'/media/jui/js/bootstrap.min.js']);
  unset($doc->_scripts[JURI::root(true).'/media/system/js/caption.js']);

  // phocadownload
  // unset($doc->_scripts[JURI::root(true).'/media/system/js/mootools-core.js']);
  // unset($doc->_scripts[JURI::root(true).'/media/system/js/mootools-more.js']);
  // unset($doc->_scripts[JURI::root(true).'/media/system/js/core.js']);
  // unset($doc->_scripts[JURI::root(true).'/media/system/js/modal.js']);
  unset($doc->_styleSheets[JURI::root(true).'/media/com_phocadownload/css/main/phocadownload.css']);
  unset($doc->_styleSheets[JURI::root(true).'/media/com_phocadownload/css/main/rating.css']);
  unset($doc->_styleSheets[JURI::root(true).'/media/com_phocadownload/css/custom/default.css']);

  $doc->addScript($tpath.'/js/bootstrapv4/popper.min.js');
  $doc->addScript($tpath.'/js/bootstrapv4/bootstrap.min.js?v=1.0.0');
  //$doc->addScript($tpath.'/dist/easing-page/jquery.easing.min.js', 'text/javascript');
  $doc->addScript($tpath.'/dist/modernizr/modernizr-objectfit.js');
  // $doc->addScript($tpath.'/dist/font5/js/fontawesome-all.min.js');
  $doc->addScript($tpath.'/js/logic.js?ver=2.0.0');

  $doc->addStyleSheet($tpath.'/dist/font5/css/fontawesome-all.min.css');
  //$doc->addStyleSheet($tpath.'/dist/animation/animate.min.css');
  $doc->addStyleSheet($tpath.'/css/template.min.css?ver=1.9.0');
