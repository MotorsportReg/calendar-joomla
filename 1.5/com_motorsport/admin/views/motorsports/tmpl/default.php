<?php defined('_JEXEC') or die('Restricted access'); ?>
<form action="index.php" method="post" name="adminForm">
<div id="editcell">
	<table class="adminlist">
	<thead>
		<tr>
				
	<th style="text-align:left;" align="left">
		<?php //echo JText::_('Thanks for Using motorsport registration component ou can set the setting with below link '); ?>
	</th>
</tr>

	</thead>
<?php foreach($this->items as $i => $item): ?>
	<tr class="row<?php echo $i % 2; ?>">
		
		<td><div id="cpanel">
		<div class="icon">
		
		
		
		<a href="<?php echo JRoute::_('index.php?option=com_motorsport&controller=motorsport&task=edit&cid[]=' . $item->id); ?>">
				<span class="vmicon48 vm_shop_products_48"><img height="48" width="48" src="components/com_motorsport/images/icon-32-banner-client.png" /></span><?php echo "Configuration"; ?>
			</a></div></div>
			
		</td>
	</tr>
<?php endforeach; ?>

	</table>
</div>

<input type="hidden" name="option" value="com_motorsport" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="boxchecked" value="0" />
<input type="hidden" name="controller" value="motorsport" />
</form>
