<?php

/**
 * @version		$Id: hello.php 
 * @package		Joomla 2.5
 * @subpackage	Components


 * 

 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import joomla controller library
jimport('joomla.application.component.controller');
$mosConfig_absolute_path = JPATH_SITE;
 $mosConfig_live_site = JURI :: base();

// Get an instance of the controller prefixed by MotorSport
$controller = JControllerLegacy::getInstance('MotorSport');

// Perform the Request task
$controller->execute(JRequest::getCmd('task'));

// Redirect if set by the controller
$controller->redirect();
