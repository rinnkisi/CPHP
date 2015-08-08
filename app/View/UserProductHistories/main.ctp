
<?php if(isset($have)):foreach($have as $values):?>
	<table>
	<?php 	foreach($values as $key=>$value): ?>
		<tr>
		<td><?php echo $key; ?></td>
		<th><?php if($value!=null)echo $value; ?></th>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endforeach;endif; ?>
