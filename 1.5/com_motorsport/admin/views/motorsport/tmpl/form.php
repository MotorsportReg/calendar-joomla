<?php
/**
 * @version		$Id: edit.php 
 * @package		Joomla 2.5
 */
// No direct access
defined('_JEXEC') or die('Restricted access');
JHtml::_('behavior.tooltip');

//echo "<pre>";

?>
	<fieldset class="adminform">
	<div style="width:500px; float:left;">
		<div style="width:500px; float:left;">
		<form id="MotorSport-form" name="adminForm" method="post" action="index.php?option=com_motorsport&task=edit&id=1">
			
			<table>
			<tr>
			<td colspan="2">Details</td>
			<td></td>
			</tr>
			<tr>
			<td>Calendar URL</td>
			<td><input type="text" size="40" class="inputbox" value="<?php echo $this->motorsport->calenderurl; ?>" id="jform_calenderurl" name="jform[calenderurl]"> (must use https://)</td>
			</tr>
			<tr>
			<td >Update cache after</td>
			<td><select name="jform[msupdate_cachse]" id="jform_msupdate_cachse">
	<option <?php if($this->motorsport->msupdate_cachse=='48') { echo "selected='selected'"; } ?> value="48">48 hours</option>
	<option <?php if($this->motorsport->msupdate_cachse=='24') { echo "selected='selected'"; } ?> value="24">24 Hours</option>
	<option <?php if($this->motorsport->msupdate_cachse=='12') { echo "selected='selected'"; } ?> value="12">12 hours</option>
</select></td>
			</tr>
			<tr>
			<td>Date</td>
			<td><input type="radio" <?php if($this->motorsport->msr_eventdate=='1') { echo "checked='checked'"; } ?> value="1" name="jform[msr_eventdate]" id="jform_msr_eventdate0">
						<label for="jform_msr_eventdate0">Show</label>
						<input type="radio" <?php if($this->motorsport->msr_eventdate=='0') { echo "checked='checked'"; } ?> value="0" name="jform[msr_eventdate]" id="jform_msr_eventdate1">
						<label for="jform_msr_eventdate1">Hide</label></td>
			</tr>
			<tr>
			<td>Event Name</td>
			<td><input type="radio" <?php if($this->motorsport->msr_eventname=='1') { echo "checked='checked'"; } ?> value="1" name="jform[msr_eventname]" id="jform_msr_eventname0">
				<label for="jform_msr_eventname0">Show</label>
				<input type="radio" value="0"<?php if($this->motorsport->msr_eventname=='0') { echo "checked='checked'"; } ?> name="jform[msr_eventname]" id="jform_msr_eventname1">
				<label for="jform_msr_eventname1">Hide</label></td>
			</tr>
			<tr>
			<tr>
			<td>Organization</td>
			<td><input type="radio" <?php if($this->motorsport->msr_organization=='1') { echo "checked='checked'"; } ?> value="1" name="jform[msr_organization]" id="jform_msr_organization0">
						<label for="jform_msr_organization0">Show</label>
						<input type="radio" <?php if($this->motorsport->msr_organization=='0') { echo "checked='checked'"; } ?> value="0" name="jform[msr_organization]" id="jform_msr_organization1">
						<label for="jform_msr_organization1">Hide</label></td>
			</tr>
			<td>Venue Name</td>
			<td>
						<input type="radio"<?php if($this->motorsport->msr_venue=='1') { echo "checked='checked'"; } ?> value="1" name="jform[msr_venue]" id="jform_msr_venue0">
						<label for="jform_msr_venue0">Show</label>
						<input type="radio" <?php if($this->motorsport->msr_venue=='0') { echo "checked='checked'"; } ?> value="0" name="jform[msr_venue]" id="jform_msr_venue1">
						<label for="jform_msr_venue1">Hide</label></td>
			</tr>
			<tr>
			<td>Venue City</td>
			<td><input type="radio" <?php if($this->motorsport->msr_venuecity=='1') { echo "checked='checked'"; } ?> value="1" name="jform[msr_venuecity]" id="jform_msr_venuecity0">
						<label for="jform_msr_venuecity0">Show</label>
						<input type="radio" <?php if($this->motorsport->msr_venuecity=='0') { echo "checked='checked'"; } ?> value="0" name="jform[msr_venuecity]" id="jform_msr_venuecity1">
						<label for="jform_msr_venuecity1">Hide</label></td>
			</tr>
			<tr>
			<td>Event Type</td>
			<td><input type="radio" <?php if($this->motorsport->msr_eventtype=='1') { echo "checked='checked'"; } ?> value="1" name="jform[msr_eventtype]" id="jform_msr_eventtype0">
						<label for="jform_msr_eventtype0">Show</label>
						<input type="radio" <?php if($this->motorsport->msr_eventtype=='0') { echo "checked='checked'"; } ?> value="0" name="jform[msr_eventtype]" id="jform_msr_eventtype1">
						<label for="jform_msr_eventtype1">Hide</label></td>
			</tr>
			</table>
			
			
			
					<input type="hidden" value="1" id="jform_id" name="jform[id]">
					
					
						
			<div>
			<input type="hidden" name="option" value="com_motorsport" />
<input type="hidden" name="task" value="save" />
<input type="hidden" name="controller" value="motorsport" />
				</div>
		</form>
	</div>
	</div>
<div style="width:350px; float:left; margin-left:20px;">

<?php 

//echo "<pre>";
//print_r($_POST);
if(isset($_POST['submit'])) 
{
	if(isset($_POST['msr_calendar_cache'])) 
	{
		$db = JFactory::getDBO();
		$status = $_POST['msr_calendar_cache'];
		$itemidd = '1';
		$query = "UPDATE #__motorsport SET msr_calendar_cache = '" . $status . "' WHERE id = " . $itemidd;
		$db->setQuery($query);
		$db->query();
	}
}


?>
<form action="#" method="post" name="adminForm2" id="MotorSport-form2">
<h2>Flush Data</h2>
<input type="hidden" name="msr_calendar_cache" value="true" /> 
<input style="cursor:pointer;" type="submit" name="submit" value="Flush Cache" /></form>
</div>
	</fieldset>
	



