<?php
/**
 * motorsport View for motorsport World Component
 * 
 * @package    Joomla.Tutorials
 * @subpackage Components
 * @link http://docs.joomla.org/Developing_a_Model-View-Controller_Component_-_Part_4
 * @license		GNU/GPL
 */

// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.view' );

/**
 * motorsport View
 *
 * @package    Joomla.Tutorials
 * @subpackage Components
 */
class MotorsportsViewMotorsport extends JView
{
	/**
	 * display method of motorsport view
	 * @return void
	 **/
	function display($tpl = null)
	{

		//get the motorsport
		$motorsport		=& $this->get('Data');
		$isNew		= ($motorsport->id < 1);

		$text = $isNew ? JText::_( 'New' ) : JText::_( 'Edit Configuration' );
		JToolBarHelper::title(   JText::_( 'MotorsportReg Calendar' ).': <small><small>[ ' . $text.' ]</small></small>' );
		JToolBarHelper::save();
		if ($isNew)  {
			JToolBarHelper::cancel();
		} else {
			// for existing items the button is renamed `close`
			JToolBarHelper::cancel( 'cancel', 'Close' );
		}

		$this->assignRef('motorsport',		$motorsport);

		parent::display($tpl);
	}
}