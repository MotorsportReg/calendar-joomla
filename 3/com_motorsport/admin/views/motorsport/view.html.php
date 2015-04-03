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
 * MotorSport View
 */
class MotorSportViewMotorSport extends JViewLegacy
{
	/**
	 * display method of Hello view
	 * @return void
	 */
	public function display($tpl = null) 
	{
		// get the Data
		$form = $this->get('Form');
		$item = $this->get('Item');

		// Check for errors.
		if (count($errors = $this->get('Errors'))) 
		{
			JError::raiseError(500, implode('<br />', $errors));
			return false;
		}
		// Assign the Data
		$this->form = $form;
		$this->item = $item;

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
		JRequest::setVar('hidemainmenu', true);
		$isNew = ($this->item->id == 0);
		JToolBarHelper::title($isNew ? JText::_('COM_MOTORSPORT_MANAGER_MOTORSPORT_NEW') : JText::_('COM_MOTORSPORT_MANAGER_MOTORSPORT_EDIT'));
		JToolBarHelper::apply('motorsport.apply');
		JToolBarHelper::cancel('motorsport.cancel', $isNew ? 'JTOOLBAR_CANCEL' : 'JTOOLBAR_CLOSE');
	}
}
