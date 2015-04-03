<?php

/**
 * @version		$Id: MotorSport.php 72 2010-11-30 13:48:41Z chdemko $
 * @package		Joomla 2.5
 */

// No direct access to this file
defined('_JEXEC') or die;

// import the list field type
jimport('joomla.form.helper');
JFormHelper::loadFieldClass('list');

/**
 * MotorSport Form Field class for the MotorSport component
 */
class JFormFieldMotorSport extends JFormFieldList
{
	/**
	 * The field type.
	 *
	 * @var		string
	 */
	protected $type = 'MotorSport';

	/**
	 * Method to get a list of options for a list input.
	 *
	 * @return	array		An array of JHtml options.
	 */
	protected function getOptions() 
	{
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select('id,calenderurl');
		$query->from('#__motorsport');
		$db->setQuery((string)$query);
		$messages = $db->loadObjectList();
		$options = array();
		if ($messages)
		{
			foreach($messages as $message) 
			{
				$options[] = JHtml::_('select.option', $message->id, $message->calenderurl);
			}
		}
		$options = array_merge(parent::getOptions(), $options);
		return $options;
	}
}
