<?php
/**
 * Hello Model for Hello World Component
 * 
 * @package    Joomla.Tutorials
 * @subpackage Components
 * @link http://dev.joomla.org/component/option,com_jd-wiki/Itemid,31/id,tutorials:components/
 * @license		GNU/GPL
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

jimport( 'joomla.application.component.model' );

/**
 * Hello Model
 *
 * @package    Joomla.Tutorials
 * @subpackage Components
 */
class MotorsportModelMotorsport extends JModel
{
	/**
	 * Gets the greeting
	 * @return string The greeting to be displayed to the user
	 */
	 
	 
	function date_display_formate($start_date,$end_date='')
	{
		$start=strtotime($start_date);
		$start_year=date('y',$start);
		$start_month=date('M',$start);
		$start_day=date('j',$start);
	
		if($end_date){
			$end=strtotime($end_date);
			$end_year=date('y',$end);
			$end_month=date('M',$end);
			$end_day=date('j',$end);
		}
	
		if($end_date)
		{
			if($start_month == $end_month)
			{
				if($start_day == $end_day)
					$date_display=$start_month.' '.$start_day;
				else
					$date_display= $start_month.' '.$start_day.'-'.$end_day;
					
			}else{
				$date_display= $start_month.' '.$start_day.' - '.$end_month.' '.$end_day;
			}
		}else{
			$date_display=$start_month.' '.$start_day;
		}
	
		return $date_display;
	}



// function handles requesting and caching the json
function request_cache($url, $dest_file, $timeout, $flush = false)
{


if (!file_exists($dest_file) || filemtime($dest_file) < (time()-$timeout) || $flush == 'true')
{
$db = JFactory::getDBO();
$status = 'false';

$statusid = '1';
$query = "UPDATE #__motorsport SET msr_calendar_cache = '" . $status . "' WHERE id = " . $statusid;
$db->setQuery($query);
$db->query();

$data = '';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
curl_setopt($ch, CURLOPT_TIMEOUT, 90);
// set content-type and authorization headers
$headers = array(
"Accept: application/vnd.pukkasoft+xml",
);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$data = curl_exec($ch);
curl_close($ch);
$tmpf = tempnam('/tmp','motorsportreg-api-request');

if (!$fp = fopen($tmpf, 'w'))
{
echo "Cannot open temporary file ($tmpf)";
exit;
}
if (fwrite($fp, $data) === FALSE)
{
echo 'Failed to write data to file';
exit;
}
fclose($fp);
if(!chmod($tmpf,0777)){
echo 'Failed to file permission temporary';

}

if (!rename($tmpf, $dest_file))
{
echo 'Failed to rename temporary file to cache file! This usually happens because PHP cannot write to the file: ' . $dest_file . '. Check permissions or consider placing the file in /tmp';
}

if(!chmod($dest_file,0777)){
echo 'Failed to file permission temporary';

}
return $data;
}
else
{
return file_get_contents($dest_file);
}
}
	 
	 
	function getGreeting()
	{
if (!isset($this->msg))
{
$id = '1';
// Get a TableMotorSport instance
$table = $this->getTable();

$db = JFactory::getDBO();
$query = "SELECT * FROM #__motorsport WHERE id = 1";

$db->setQuery($query);
$rows = $db->loadObjectList();



$url = $rows['0']->calenderurl;
$ctime = $rows['0']->msupdate_cachse;
$flush = $rows['0']->msr_calendar_cache;

$myupdatetime = $ctime * 60 * 60;

// uri to data, cached for 6 hours at a time
// if you receive "failed to rename temporary file..." errors, try changing the 2nd argument to /tmp/apimotorsportregcom.json
$json = $this->request_cache($url, 'tmp/apimotorsportregcom.xml', $myupdatetime , $flush);
$data = simplexml_load_string($json);


$arr = json_encode($data);

$data1 = json_decode($arr, true);

if($data1["recordset"]["total"] == 1){
	$events = $data1["events"];
}else{
	$events = $data1["events"]["event"];
}

$mosConfig_absolute_path = JPATH_SITE;
$mosConfig_live_site = JURI :: base();

$field_eventname = $rows['0']->msr_eventname;
$field_venue = $rows['0']->msr_venue;
$field_venuecity = $rows['0']->msr_venuecity;
$field_eventtype = $rows['0']->msr_eventtype;
$field_eventdate = $rows['0']->msr_eventdate;
$field_organization=$rows['0']->msr_organization;

$out = '<div class="msrcalendar"><h2>' . $title .'</h2>';
$out .='<table class="msrcalendar"><thead><tr>';
$out .='<th colspan="7"><span style="float:left;">'.$title.'</span><span style="float:right;">To see thousands more, <a href="http://www.motorsportreg.com/calendar/" target="_blank">view the full calendar</a></span></th></tr><tr>';
$show=false;

if($field_eventdate=='1'){
$out .='<th>'.JText::_('Date').'</th>';
$show=true;
}

if($field_eventname=='1'){
$out .='<th>'.JText::_('Name').'</th>';
$show=true;
}

if($field_organization=='1'){
$out .='<th>'.JText::_('Organization').'</th>';
$show=true;
}

if($field_venue=='1'){
$out .='<th>'.JText::_('Venue').'</th>';
$show=true;
}

if($field_venuecity=='1'){
$out .='<th>'.JText::_('Location').'</th>';
$show=true;
}

if($field_eventtype=='1'){
$out .='<th>'.JText::_('Type').'</th>';
$show=true;
}

$out .='<th>&nbsp;</th>';
$out .='</tr></thead><tbody>';

if(count($events)){

foreach($events as $event)
{
$out .='<tr>';

if($field_eventdate=='1'){
$start=$event['start'];
$end=$event['end'];
if(!$end)
$out .='<td>'.$this->date_display_formate($start).'</td>';
else
$out .='<td>'.$this->date_display_formate($start,$end).'</td>';
}

if($field_eventname=='1')
$out .='<td><a href="'.$event['detailuri'].'" class="txtlink">'.$event['name'].'</a></td>';

if($field_organization=='1')
$out .='<td>'.$event['organization']['name'].'</td>';

if($field_venue)
$out .='<td>'.$event['venue']['name'].'</td>';

if($field_venuecity=='1')
$out .='<td>'.$event['venue']['city'].', '.$event['venue']['region'].'</td>';

if($field_eventtype=='1')
$out .='<td>'.$event['type'].'</td>';

if($show && $field_eventname!='1'){
	$out .='<td><a href="'.$event['detailuri'].'" class="txtlink">Details</a></td>';
}

$out .='</tr>';
}
}else{
$out .='<tr><td colspan="7">No upcoming events for this organization.</td></tr>';
}

// please do not remove the link to motorsportreg.com - the only requirement for using our otherwise-free component is to retain an unedited link back to our site, thanks!
$out .='</tbody></table><div class="morelink">MotorsportReg.com provides online registration for thousands of <a href="http://www.motorsportreg.com/calendar/">track, HPDE, autocross, club racing and karting events</a>.</div></div>';

// Assign the message
$greeting = $out ;
}


return $greeting;
}
		
	}

