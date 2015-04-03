<?php
/**
 * default body template file for MotorSports view of MotorSport component
 *
 * @version		$Id: default_body.php 46 2010-11-21 17:27:33Z chdemko $
 * @package		Joomla 2.5
 */
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');



//header('Location:index.php?option=com_MotorSport&view=MotorSport&layout=edit&id=1');

?>
<?php foreach($this->items as $i => $item): ?>
	<tr class="row<?php echo $i % 2; ?>">
		
		<td><div id="cpanel">
		<div class="icon">
		
		
		
		<a href="<?php echo JRoute::_('index.php?option=com_motorsport&task=motorsport.edit&id=' . $item->id); ?>">
				<span class="vmicon48 vm_shop_products_48"><img height="48" width="48" src="components/com_motorsport/images/icon-32-banner-client.png" /></span><?php echo "Configuration"; ?>
			</a></div></div>
			
		</td>
	</tr>
<?php endforeach; ?>

