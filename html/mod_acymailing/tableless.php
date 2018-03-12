<?php
/**
 * @package	AcyMailing for Joomla!
 * @version	5.9.2
 * @author	acyba.com
 * @copyright	(C) 2009-2018 ACYBA S.A.R.L. All rights reserved.
 * @license	GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

defined('_JEXEC') or die('Restricted access');
$app 			= JFactory::getApplication();
$tmpl 		= $app->getTemplate();
$document = JFactory::getDocument();

// se il cookie non esiste mostro la modale
if(!isset($_COOKIE['newsletter_popup'])){
	$document->addScript(JUri::base(true).'/templates/'.$tmpl.'/html/'.$module->module.'/dist/func.js', 'text/javascript', true, false);
	$document->addScriptDeclaration("
		jQuery(document).ready(function($){
			$('#newsletter_popup').modal('toggle');
		})
	");
	$document->addScriptDeclaration("
		jQuery(document).ready(function($){
			$('.dismiss, .subbutton').click(function(){
				scriviCookie('newsletter_popup','denied',43200);
			})
		})
	");
}

?>
<!-- Modal -->
<div class="modal fade" id="newsletter_popup" tabindex="-1" role="dialog" aria-labelledby="newsletter_popupLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newsletter_popupLabel">Iscriviti alla newsletter</h5>
        <button type="button" class="close dismiss" data-dismiss="modal" aria-label="Close">
          <i class="fal fa-times"></i>
        </button>
      </div>
      <div class="modal-body">

				<div class="newsletter_subscription <?php echo $params->get('moduleclass_sfx')?>" id="acymailing_module_<?php echo $formName; ?>">
					<?php if(!empty($introText)) : ?>
						<div class="newsletter_introtext mb-2"><?= $introText ?></div>
					<?php endif; ?>
					<form id="<?php echo $formName; ?>" class="newsletter_popup" novalidate action="<?php echo acymailing_route('index.php'); ?>" onsubmit="return submitacymailingform('optin','<?php echo $formName;?>')" method="post" name="<?php echo $formName ?>" <?php if(!empty($fieldsClass->formoption)) echo $fieldsClass->formoption; ?> >

						<div class="form-row">
							<div class="col-12 col-sm-8">
							<?php foreach($fieldsToDisplay as $oneField) : ?>
								<?php if($oneField == 'email' AND empty($extraFields[$oneField])) : ?>
									<input id="user_email_<?php echo $formName; ?>"
										<?php if(!empty($identifiedUser->userid)) echo 'readonly="readonly" ';
										if(!$displayOutside){ ?> onfocus="if(this.value == '<?php echo $emailCaption;?>') this.value = '';"
										onblur="if(this.value=='') this.value='<?php echo $emailCaption?>';"<?php } ?>
										class="form-control"
										type="text"
										name="user[email]"
										required
										value="<?php if(!empty($identifiedUser->userid)) echo $identifiedUser->email; elseif(!$displayOutside) echo $emailCaption; ?>"
										title="<?php echo $emailCaption;?>"/>
								<?php endif; ?>
							<?php endforeach; ?>
							</div>
							<div class="col-12 col-sm-4">
								<input
									class="button subbutton btn btn-primary btn-block"
									type="submit"
									value="<?php $subtext = $params->get('subscribetextreg'); if(empty($identifiedUser->userid) OR empty($subtext)){ $subtext = $params->get('subscribetext',acymailing_translation('SUBSCRIBECAPTION')); } echo $subtext;  ?>"
									name="Submit"
									onclick="try{ return submitacymailingform('optin','<?php echo $formName;?>'); }catch(err){alert('The form could not be submitted '+err);return false;}"/>
							</div>
						</div>

						<?php if(!empty($visibleListsArray) && $listPosition == 'before') : ?>
							<div class="form-row mt-2 showlist">
								<div class="col-12">
									<?php if($params->get('dropdown',0)) : ?>
										<select name="subscription[1]" class="form-control form-control-sm">
										<?php foreach($visibleListsArray as $myListId) : ?>
											<option value="<?= $myListId ?>"><?= $allLists[$myListId]->name ?></option>
										<?php endforeach; ?>
										</select>
									<?php endif; ?>
								</div>
							</div>
						<?php endif; ?>

						<?php if($params->get('showterms',false)) : ?>
						<div class="form-row mt-2 showterms">
							<div class="col-12">
	 							<input
									id="mailingdata_terms_<?php echo $formName; ?>"
									class="checkbox"
									type="checkbox"
									name="terms"
									required
									title="<?php echo acymailing_translation('JOOMEXT_TERMS'); ?>"/>
									<?= $termslink ?>
							</div>
						</div>
						<?php endif; ?>

						<?php if(empty($identifiedUser->userid) AND $config->get('captcha_enabled') AND acymailing_level(1)) : ?>
						<div class="form-row mt-2">
							<div class="col-12">
								<?php $captchaClass = acymailing_get('class.acycaptcha'); ?>
								<?php $captchaClass->display($formName, true) ?>
							</div>
						</div>
						<?php endif; ?>

						<?php
						if(!empty($fieldsClass->excludeValue)){
							$js = "\n"."acymailingModule['excludeValues".$formName."'] = Array();";
							foreach($fieldsClass->excludeValue as $namekey => $value){
								$js .= "\n"."acymailingModule['excludeValues".$formName."']['".$namekey."'] = '".$value."';";
							}
							$js .= "\n";
							if($params->get('includejs','header') == 'header'){
								acymailing_addScript(true, $js);
							}else{
								echo "<script type=\"text/javascript\">
										<!--
										$js
										//-->
										</script>";
							}
						}
						?>

						<?php $ajax = ($params->get('redirectmode') == '3') ? 1 : 0; ?>
						<input type="hidden" name="ajax" value="<?php echo $ajax; ?>" />
						<input type="hidden" name="acy_source" value="<?php echo 'module_'.$module->id ?>" />
						<input type="hidden" name="ctrl" value="sub"/>
						<input type="hidden" name="task" value="notask"/>
						<input type="hidden" name="redirect" value="<?php echo urlencode($redirectUrl); ?>"/>
						<input type="hidden" name="redirectunsub" value="<?php echo urlencode($redirectUrlUnsub); ?>"/>
						<input type="hidden" name="option" value="<?php echo ACYMAILING_COMPONENT ?>"/>
						<?php if(!empty($identifiedUser->userid)){ ?><input type="hidden" name="visiblelists" value="<?php echo $visibleLists;?>"/><?php } ?>
						<input type="hidden" name="hiddenlists" value="<?php echo $hiddenLists;?>"/>
						<input type="hidden" name="acyformname" value="<?php echo $formName; ?>" />
						<?php if(acymailing_getVar('cmd', 'tmpl') == 'component'){ ?>
							<input type="hidden" name="tmpl" value="component" />
							<?php if($params->get('effect','normal') == 'mootools-box' AND !empty($redirectUrl)){ ?>
								<input type="hidden" name="closepop" value="1" />
							<?php } } ?>
						<?php $myItemId = $config->get('itemid',0); if(empty($myItemId)){ global $Itemid; $myItemId = $Itemid;} if(!empty($myItemId)){ ?><input type="hidden" name="Itemid" value="<?php echo $myItemId;?>"/><?php } ?>


					</form>
					<?php if(!empty($postText)) : ?>
						<div class="newsletter_finaltext mt-2"><?= $postText ?></div>
					<?php endif; ?>
				</div>


      </div><!-- modal body -->

    </div>
  </div>
</div>
