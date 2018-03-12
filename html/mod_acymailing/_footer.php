<?php
/**
 * @package	AcyMailing for Joomla!
 * @version	5.8.0
 * @author	acyba.com
 * @copyright	(C) 2009-2017 ACYBA S.A.R.L. All rights reserved.
 * @license	GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */
defined('_JEXEC') or die('Restricted access');

$doc = JFactory::getDocument();
unset($doc->_styleSheets[JURI::root(true).'/media/com_acymailing/css/module_default.css?v=1501405411']);
?>

		<div class="acymailing_fulldiv w-100" id="acymailing_fulldiv_<?php echo $formName; ?>">

			<?php
				$style = array();
				if($params->get('effect','normal') == 'mootools-slide'){
					if(!empty($mootoolsIntro)) echo '<p class="acymailing_mootoolsintro">'.$mootoolsIntro.'</p>'; ?>
					<div class="acymailing_mootoolsbutton" id="acymailing_toggle_<?php echo $formName; ?>" >
						<p><a class="acymailing_togglemodule" id="acymailing_togglemodule_<?php echo $formName; ?>" href="#subscribe"><?php echo $mootoolsButton ?></a></p>
			<?php
				}
				if($params->get('textalign','none') != 'none') $style[] .= 'text-align:'.$params->get('textalign');
				$styleString = empty($style) ? '' : 'style="'.implode(';',$style).'"';
					$config = acymailing_config();
			?>

			<form class="w-100" id="<?php echo $formName; ?>" action="<?php echo acymailing_route('index.php'); ?>" onsubmit="return submitacymailingform('optin','<?php echo $formName;?>', <?php echo $config->get('special_chars', 0); ?>)" method="post" name="<?php echo $formName ?>" <?php if(!empty($fieldsClass->formoption)) echo $fieldsClass->formoption; ?> >

			<?php
			$listContent = '';
			if($params->get('dropdown',0)){
				$listContent .= '<select name="subscription[1]">';
				foreach($visibleListsArray as $myListId){
					$listContent .= '<option value="'.$myListId.'">'.$allLists[$myListId]->name.'</option>';
				}
				$listContent .= '</select>';
			} else{
				$listContent .= '<table class="acymailing_lists">';
				foreach($visibleListsArray as $myListId){
					$check = in_array($myListId,$checkedListsArray) ? 'checked="checked"' : '';
					if($params->get('checkmode',0) == '0' AND !empty($identifiedUser->email)){
						if(empty($allLists[$myListId]->status)){$check = '';}
						else{
							$check = $allLists[$myListId]->status == '-1' ? '' : 'checked="checked"';
						}
					}
					$listContent .= '
					<tr>
						<td>
						<label for="acylist_'.$myListId.'">
						<input type="checkbox" class="acymailing_checkbox" name="subscription[]" id="acylist_'.$myListId.'" '.$check.' value="'.$myListId.'"/>';
						$joomItem = $params->get('itemid',0);
						if(empty($joomItem)) $joomItem = $config->get('itemid',0);
						$addItem = empty($joomItem) ? '' : '&Itemid='.$joomItem;
						$archivelink = acymailing_completeLink('archive&listid='.$allLists[$myListId]->listid.'-'.$allLists[$myListId]->alias.$addItem);
						if($params->get('overlay',0)){
							if(!$params->get('link',1) OR !$allLists[$myListId]->visible) $archivelink = '';
							$listContent .= ' '.acymailing_tooltip($allLists[$myListId]->description,$allLists[$myListId]->name,'',$allLists[$myListId]->name,$archivelink);
						}else{
							if($params->get('link',1) AND $allLists[$myListId]->visible){
								$listContent .= ' <a href="'.$archivelink.'" alt="'.$allLists[$myListId]->alias.'"'.((acymailing_getVar('cmd', 'tmpl') == 'component') ? 'target="_blank"' : '').' >';
							}
							$listContent .= $allLists[$myListId]->name;
							if($params->get('link',1) AND $allLists[$myListId]->visible){
								$listContent .= '</a>';
							}
						}
						$listContent .= '</label>
						</td>
					</tr>';
				}
				$listContent .= '</table>';
			}

			if(!empty($visibleListsArray) && $listPosition == 'before'){
				echo $listContent;
			}//endif visiblelists
			?>
			<div class="form-group row mt-3">

			<?php foreach($fieldsToDisplay as $oneField) : ?>
				<?php if($oneField == 'name' AND empty($extraFields[$oneField])) : ?>
						<label for="user_name_<?php echo $formName ?>" class="col-2 col-form-label sr-only"><?php echo $nameCaption ?></label>
						<div class="col-12 col-sm-12 col-md-6">
							<input class="form-control" type="text" id="user_name_<?php echo $formName ?>" <?php if(!empty($identifiedUser->userid)) echo 'readonly="readonly"'; if(!$displayOutside){ ?> onfocus="if(this.value == '<?php echo $nameCaption;?>') this.value = '';" onblur="if(this.value=='') this.value='<?php echo $nameCaption?>';"<?php } ?>
							name="user[name]"
							value="<?php if(!empty($identifiedUser->userid)) echo $identifiedUser->name; elseif(!$displayOutside) echo $nameCaption; ?>" title="<?php echo $nameCaption?>">
						</div>
				<?php endif; ?>
				<?php if($oneField == 'email' AND empty($extraFields[$oneField])) : ?>
						<label for="user_email_<?php echo $formName ?>" class="col-2 col-form-label sr-only"><?php echo $emailCaption ?></label>
						<div class="col-12 col-sm-12 col-md-6 mt-2 mt-md-0">
							<input class="form-control" type="text" id="user_email_<?php echo $formName ?>" <?php if(!empty($identifiedUser->userid)) echo 'readonly="readonly" '; if(!$displayOutside){ ?> onfocus="if(this.value == '<?php echo $emailCaption;?>') this.value = '';" onblur="if(this.value=='') this.value='<?php echo $emailCaption?>';"<?php } ?>
							name="user[email]"
							value="<?php if(!empty($identifiedUser->userid)) echo $identifiedUser->email; elseif(!$displayOutside) echo $emailCaption; ?>" title="<?php echo $emailCaption;?>">
						</div>
				<?php endif; ?>
			<?php endforeach; ?>

					<?php if($params->get('showsubscribe',true)) : ?>
					<div class="col-12 mt-2">
						<input class="button subbutton btn btn-featured btn-block" type="submit"
							value="<?php $subtext = $params->get('subscribetextreg'); if(empty($identifiedUser->userid) OR empty($subtext)){ $subtext = $params->get('subscribetext',acymailing_translation('SUBSCRIBECAPTION')); } echo $subtext;  ?>"
							name="Submit"
							onclick="try{ return submitacymailingform('optin','<?php echo $formName;?>', <?php echo $config->get('special_chars', 0); ?>); }catch(err){alert('The form could not be submitted '+err);return false;}"/>
					</div>
					<?php endif; ?>
					<!-- <?php if($params->get('showunsubscribe',false) AND (!$params->get('showsubscribe',true) OR empty($identifiedUser->userid) OR !empty($countUnsub)) ) : ?>
					<input class="button unsubbutton btn btn-info" type="button" value="<?php echo $params->get('unsubscribetext',acymailing_translation('UNSUBSCRIBECAPTION')); ?>" name="Submit" onclick="return submitacymailingform('optout','<?php echo $formName;?>', <?php echo $config->get('special_chars', 0); ?>)"/>
					<?php endif; ?> -->

					<?php
					if(!empty($fieldsClass->excludeValue)){
						$js = "\n"."acymailing['excludeValues".$formName."'] = Array();";
						foreach($fieldsClass->excludeValue as $namekey => $value){
							$js .= "\n"."acymailing['excludeValues".$formName."']['".$namekey."'] = '".$value."';";
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
					if(!empty($postText)) echo '<div class="acymailing_finaltext">'.$postText.'</div>';
					$ajax = ($params->get('redirectmode') == '3') ? 1 : 0;?>

				</div>

				<div class="acymailing_module_form" >
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
					</div>

			</form>

		</div>
	</div>
