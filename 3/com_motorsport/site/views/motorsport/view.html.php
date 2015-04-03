<?php

/**
 * @version		$Id: view.html.php 
 * @package		Joomla 2.5
 * @subpackage	Components


 * 

 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
jimport('joomla.application.component.view');

$mosConfig_absolute_path = JPATH_SITE;
 $mosConfig_live_site = JURI :: base();
/**
 * HTML View class for the MotorSport Component
 */
class MotorSportViewMotorSport extends JViewLegacy
{
	// Overwriting JView display method
	function display($tpl = null) 
	{
		// Assign data to the view
		$this->msg = $this->get('Msg');

		// Check for errors.
		if (count($errors = $this->get('Errors'))) 
		{
			JError::raiseError(500, implode('<br />', $errors));
			return false;
		}
		// Display the view
		parent::display($tpl);
	}
}
