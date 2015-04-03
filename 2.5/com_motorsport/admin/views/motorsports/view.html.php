<?php

/**
 * @version		$Id: view.html.php 51 2010-11-22 01:33:21Z chdemko $
 * @package		Joomla 2.5
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
jimport('joomla.application.component.view');

/**
 * MotorSports View
 */
class MotorSportViewMotorSports extends JView
{
	/**
	 * MotorSports view display method
	 * @return void
	 */
	function display($tpl = null) 
	{
		// Get data from the model
		$items = $this->get('Items');
		$pagination = $this->get('Pagination');

		// Check for errors.
		if (count($errors = $this->get('Errors'))) 
		{
			JError::raiseError(500, implode('<br />', $errors));
			return false;
		}
		// Assign data to the view
		$this->items = $items;
		$this->pagination = $pagination;

		// Set the toolbar
		$this->addToolBar();

		// Display the template
		parent::display($tpl);
	}

	/**
	 * Setting the toolbar
	 */
	protected function addToolBar() 
	{
		JToolBarHelper::title(JText::_('Motor Sport Registration'));
		//JToolBarHelper::deleteListX('', 'MotorSports.delete');
		//JToolBarHelper::editListX('MotorSport.edit');
		//JToolBarHelper::addNewX('MotorSport.add');
	}
}
