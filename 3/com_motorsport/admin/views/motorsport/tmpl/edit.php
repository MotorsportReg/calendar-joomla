<?php
/**
 * @version		$Id: edit.php 
 * @package		Joomla 2.5
 */
// No direct access
defined('_JEXEC') or die('Restricted access');
JHtml::_('behavior.tooltip');

$myrul =  JURI::base();
?>

<script type="text/javascript">
    Joomla.submitbutton = function(task)
    {

        if (task == 'motorsport.cancel')
        {
            //Joomla.submitform(task, document.getElementById('MotorSport-form'));
window.location.assign("<?php echo $myrul?>");
        }
if (task == 'motorsport.apply')
        {
            Joomla.submitform(task, document.getElementById('MotorSport-form'));
        }
		
		 
    }
</script>
	<fieldset class="adminform">
	<div style="width:500px; float:left;">
		<form action="<?php echo JRoute::_('index.php?option=com_motorsport&layout=edit&id='.(int) $this->item->id); ?>" method="post" name="adminForm" id="MotorSport-form">
			<legend><?php echo JText::_( 'COM_MotorSport_MotorSport_DETAILS' ); ?></legend>
			<div class="form-horizontal">
			<?php foreach($this->form->getFieldset() as $field): ?>
			
			
			
			
				<div class="control-group">
							<div class="control-label">
								<?php echo $field->label; ?>
							</div>
							<div class="controls">
								<?php echo $field->input; ?>
							</div>
						</div>
						
						
						
			<?php endforeach; ?>
			
			</div><div>
			<input type="hidden" name="task" value="motorsport.save" />
			<?php echo JHtml::_('form.token'); ?>
			</div>
		</form>
	
		<p>For more details, view the API documentation at <a href="http://api.motorsportreg.com" target="_blank">http://api.motorsportreg.com</a></p>
		<p><strong>PLEASE subscribe</strong> to our developer group at <a href="https://groups.google.com/forum/#!forum/motorsportreg-api-developers" target="_blank">https://groups.google.com/forum/#!forum/motorsportreg-api-developers</a></p> 
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
<input class="btn btn-small" style="cursor:pointer;" type="submit" name="submit" value="Flush Cache" /></form>
</div>
	</fieldset>
	



