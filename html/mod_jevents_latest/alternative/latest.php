<?php
/**
 * copyright (C) 2008-2017 GWE Systems Ltd - All rights reserved
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

/**
 * HTML View class for the module  frontend
 *
 * @static
 */
include_once(JPATH_SITE."/modules/mod_jevents_latest/tmpl/default/latest.php");

class OverrideAlternativeModLatestView extends DefaultModLatestView
{

	function displayLatestEvents(){

		$cfg = JEVConfig::getInstance();
		$compname = JEV_COM_COMPONENT;

		$dispatcher	= JEventDispatcher::getInstance();
		$datenow	= JEVHelper::getNow();

		$this->getLatestEventsData();

		$content = "<div class='mod_jevents_latest aside-block'>";

		if(isset($this->eventsByRelDay) && count($this->eventsByRelDay)){

			$content .= $this->modparams->get("modlatest_templatetop") || $this->modparams->get("modlatest_templatebottom") ? $this->modparams->get("modlatest_templatetop") : '<ul class="list-group list-striped list-hover">';

			// Now to display these events, we just start at the smallest index of the $this->eventsByRelDay array
			// and work our way up.

			$firstTime=true;

			// initialize name of com_jevents module and task defined to view
			// event detail.  Note that these could change in future com_event
			// component revisions!!  Note that the '$this->itemId' can be left out in
			// the link parameters for event details below since the event.php
			// component handler will fetch its own id from the db menu table
			// anyways as far as I understand it.

			$task_events = 'icalrepeat.detail';

			$this->processFormatString();

			foreach($this->eventsByRelDay as $relDay => $daysEvents){

				reset($daysEvents);

				// get all of the events for this day
				foreach($daysEvents as $dayEvent){

					$eventcontent = "";

					// generate output according custom string
					foreach($this->splitCustomFormat as $condtoken) {

						if (isset($condtoken['cond'])) {
							if ( $condtoken['cond'] == 'a'  && !$dayEvent->alldayevent()) continue;
							else if ( $condtoken['cond'] == '!a' &&  $dayEvent->alldayevent()) continue;
							else if ( $condtoken['cond'] == 'e'  && !($dayEvent->noendtime() || $dayEvent->alldayevent())) continue;
							else if ( $condtoken['cond'] == '!e' &&  ($dayEvent->noendtime() || $dayEvent->alldayevent())) continue;
							else if ( $condtoken['cond'] == '!m' &&  $dayEvent->getUnixStartDate()!=$dayEvent->getUnixEndDate() ) continue;
							else if ( $condtoken['cond'] == 'm' &&  $dayEvent->getUnixStartDate()==$dayEvent->getUnixEndDate() ) continue;
						}
						foreach($condtoken['data'] as $token) {
							unset($match);
							unset($dateParm);
							$dateParm="";
							$match='';
							if (is_array($token)) {
								$match = $token['keyword'];
								$dateParm = isset($token['dateParm']) ? trim($token['dateParm']) : "";
							}
							else if (strpos($token,'${')!==false){
								$match = $token;
							}
							else {
								$eventcontent .= $token;
								continue;
							}

							$this->processMatch($eventcontent, $match, $dayEvent, $dateParm,$relDay);
						} // end of foreach
					} // end of foreach

					$dst = "border-left: 5px ".$dayEvent->bgcolor()." solid;";
					if($firstTime) $eventrow = '<li class="list-group-item mod_events_latest_first mb-1 px-3" style="'.$dst.'">%s'."</li>\n";
					else $eventrow = '<li class="list-group-item mod_events_latest mb-1 px-3" style="'.$dst.'">%s'."</li>\n";

					$templaterow = $this->modparams->get("modlatest_templaterow") ? $this->modparams->get("modlatest_templaterow")  : $eventrow;
					$content .= str_replace("%s", $eventcontent , $templaterow);

					$firstTime=false;
				} // end of foreach
			} // end of foreach
			$content .=$this->modparams->get("modlatest_templatebottom") || $this->modparams->get("modlatest_templatetop") ? $this->modparams->get("modlatest_templatebottom") : "</ul>\n";
		}
		else if ($this->modparams->get("modlatest_NoEvents", 1)){
			$content .= $this->modparams->get("modlatest_templatetop") ? $this->modparams->get("modlatest_templatetop") : '<div class="col-12">';
			$templaterow = $this->modparams->get("modlatest_templaterow") ? $this->modparams->get("modlatest_templaterow")  : '%s' . "\n";
			$content .= str_replace("%s", JText::_('JEV_NO_EVENTS') , $templaterow);
			$content .=$this->modparams->get("modlatest_templatebottom") ? $this->modparams->get("modlatest_templatebottom") : "</div>\n";
		}

		$callink_HTML = '<div class="mod_events_latest_callink">'
		.$this->getCalendarLink()
		. '</div>';

		if ($this->linkToCal == 1) $content = $callink_HTML . $content;
		if ($this->linkToCal == 2) $content .= $callink_HTML;

		// if ($this->displayRSS){
		// 	$rssimg = JURI::root() . "media/system/images/livemarks.png";
		// 	$callink_HTML = '<div class="mod_events_latest_rsslink">'
		// 	.'<a href="'.$this->rsslink.'" title="'.JText::_("RSS_FEED").'" target="_blank">'
		// 	.'<img src="'.$rssimg.'" alt="'.JText::_("RSS_FEED").'" />'
		// 	.JText::_("SUBSCRIBE_TO_RSS_FEED")
		// 	. '</a>'
		// 	. '</div>';
		// 	$content .= $callink_HTML;
		// }
		// if ($this->modparams->get("contentplugins", 0)){
		// 	$dispatcher = JEventDispatcher::getInstance();
		// 	$eventdata = new stdClass();
		// 	//$eventdata->text = str_replace("{/toggle","{/toggle}",$content);
		// 	$eventdata->text = $content;
		// 	$dispatcher->trigger('onContentPrepare', array('com_jevents', &$eventdata, &$this->modparams, 0));
		// 	 $content = $eventdata->text;
		// }

		$content .= '</div>';

		return $content;
	} // end of function
} // end of class