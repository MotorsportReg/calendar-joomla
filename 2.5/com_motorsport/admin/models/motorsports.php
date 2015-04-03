<?php

/**
 * @version		$Id: MotorSports.php 46 2010-11-21 17:27:33Z chdemko $
 * @package		Joomla 2.5
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import the Joomla modellist library
jimport('joomla.application.component.modellist');

/**
 * MotorSports Model
 */
class MotorSportModelMotorSports extends JModelList
{
	/**
	 * Method to build an SQL query to load the list data.
	 *
	 * @return	string	An SQL query
	 */
	protected function getListQuery() 
	{
		// Create a new query object.
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);

		// Select some fields
		$query->select('id,calenderurl');

		// From the hello table
		$query->from('#__motorsport');
		return $query;
	}
}
