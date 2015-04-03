<?php
/**
* @version $Id: default.php
* @package Joomla 2.5
* @subpackage Components
* @copyright Copyright (C) 2011 - 2013 Open Source Matters, Inc. All rights reserved.
* @author Yogesh Arora
*
* @license License sun softwares version 2 or later
*/
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
$doc	= JFactory::getDocument();


$mosConfig_live_site = JURI :: base();
$doc->addStyleSheet($mosConfig_live_site.'/components/com_motorsport/css/style.css' );
?>
<h1><?php echo $this->document->title;?></h1>
<?php echo $this->msg; ?>