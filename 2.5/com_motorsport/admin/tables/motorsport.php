<?php

/**
 * @version		$Id: MotorSport.php 46 2010-11-21 17:27:33Z chdemko $
 * @package		Joomla 2.5
 */

// No direct access
defined('_JEXEC') or die('Restricted access');

// import Joomla table library
jimport('joomla.database.table');

/**
 * Hello Table class
 */
class MotorSportTableMotorSport extends JTable
{
	/**
	 * Constructor
	 *
	 * @param object Database connector object
	 */
	function __construct(&$db) 
	{
		parent::__construct('#__motorsport', 'id', $db);
	}
}
