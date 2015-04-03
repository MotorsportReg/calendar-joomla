<?php
/**
 * motorsport Controller for motorsport World Component
 * 
 * @package    Joomla.Tutorials
 * @subpackage Components
 * @link http://docs.joomla.org/Developing_a_Model-View-Controller_Component_-_Part_4
 * @license		GNU/GPL
 */

// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

/**
 * motorsport motorsport Controller
 *
 * @package    Joomla.Tutorials
 * @subpackage Components
 */
class MotorsportsControllerMotorsport extends MotorsportsController
{
	/**
	 * constructor (registers additional tasks to methods)
	 * @return void
	 */
	function __construct()
	{
		parent::__construct();

		// Register Extra tasks
		$this->registerTask( 'add'  , 	'edit' );
	}

	/**
	 * display the edit form
	 * @return void
	 */
	function edit()
	{

		JRequest::setVar( 'view', 'motorsport' );
		JRequest::setVar( 'layout', 'form'  );
		JRequest::setVar('hidemainmenu', 1);

		parent::display();
	}

	/**
	 * save a record (and redirect to main page)
	 * @return void
	 */
	function save()
	{
	
	
	$itemidd  = $_POST['jform']['id '];
	
$calenderurl  = $_POST['jform']['calenderurl'];
	$msupdate_cachse = $_POST['jform']['msupdate_cachse'];
	
	$msr_eventname = $_POST['jform']['msr_eventname'];
	$msr_venue = $_POST['jform']['msr_venue'];
	$msr_organization = $_POST['jform']['msr_organization'];
	$msr_venuecity = $_POST['jform']['msr_venuecity'];
	$msr_eventtype = $_POST['jform']['msr_eventtype'];
	$msr_eventdate = $_POST['jform']['msr_eventdate'];
	$db = JFactory::getDBO();
		$status = $_POST['msr_calendar_cache'];
		$itemidd = '1';
		$query = "UPDATE #__motorsport SET 
		calenderurl = '" . $calenderurl . "',
		msupdate_cachse = '" . $msupdate_cachse . "',
		msr_eventname = '" . $msr_eventname . "',
		msr_venue = '" . $msr_venue . "',
		msr_organization = '" . $msr_organization . "',
		msr_venuecity = '" . $msr_venuecity . "',
		msr_eventtype = '" . $msr_eventtype . "',
		msr_eventdate = '" . $msr_eventdate . "'
		 WHERE id = " . $itemidd;
		
		$db->setQuery($query);
		$db->query();
		


		//$model = $this->getModel('motorsport');

		//if ($model->store($post)) {
			//$msg = JText::_( 'Configuration Saved!' );
		//} else {
		//	$msg = JText::_( 'Error Saving Greeting' );
		//}

		// Check the table in so it can be edited.... we are done with it anyway
		$link = 'index.php?option=com_motorsport';
		$this->setRedirect($link, $msg);
	}

	/**
	 * remove record(s)
	 * @return void
	 */
	function remove()
	{
		$model = $this->getModel('motorsport');
		if(!$model->delete()) {
			$msg = JText::_( 'Error: One or More Greetings Could not be Deleted' );
		} else {
			$msg = JText::_( 'Greeting(s) Deleted' );
		}

		$this->setRedirect( 'index.php?option=com_motorsport', $msg );
	}

	/**
	 * cancel editing a record
	 * @return void
	 */
	function cancel()
	{
		$msg = JText::_( 'Operation Cancelled' );
		$this->setRedirect( 'index.php?option=com_motorsport', $msg );
	}
}