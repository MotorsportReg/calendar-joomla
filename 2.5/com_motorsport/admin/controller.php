<?php

/**
 * @version		$Id: controller.php 46 2010-11-21 17:27:33Z chdemko $
 * @package		Joomla 2.5
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla controller library
jimport('joomla.application.component.controller');

/**
 * General Controller of MotorSport component
 */
class MotorSportController extends JController
{
	/**
	 * display task
	 *
	 * @return void
	 */
	function display($cachable = false) 
	{
		// set default view if not set
		JRequest::setVar('view', JRequest::getCmd('view', 'MotorSports'));

		// call parent behavior
		parent::display($cachable);
	}
}
