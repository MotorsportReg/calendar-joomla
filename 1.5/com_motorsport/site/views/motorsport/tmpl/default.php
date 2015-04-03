<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>
<?php //echo $this->greeting; 

$doc	= JFactory::getDocument();


$mosConfig_live_site = JURI :: base();
$doc->addStyleSheet($mosConfig_live_site.'/components/com_motorsport/css/style.css' );
?>
<h1><?php echo $this->document->title;?></h1>
<?php echo $this->greeting; ?>


