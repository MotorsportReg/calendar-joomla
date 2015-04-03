<?php
/**
 * motorsport World table class
 * 
 * @package    Joomla.Tutorials
 * @subpackage Components
 * @link http://docs.joomla.org/Developing_a_Model-View-Controller_Component_-_Part_4
 * @license		GNU/GPL
 */

// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

/**
 * motorsport Table class
 *
 * @package    Joomla.Tutorials
 * @subpackage Components
 */
class Tablemotorsport extends JTable
{
	/**
	 * Primary Key
	 *
	 * @var int
	 */
	var $id = null;

	/**
	 * @var string
	 */
	var $greeting = null;

	/**
	 * Constructor
	 *
	 * @param object Database connector object
	 */
	function Tablemotorsport(& $db) {
		parent::__construct('#__motorsport', 'id', $db);
	}
}