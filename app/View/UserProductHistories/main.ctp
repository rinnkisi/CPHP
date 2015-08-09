<?php echo $this->Form->create('UserProductHistories',array('action'=>'edit')); ?>
<?php if(isset($have)):foreach($have as $values):?>
	<table>
<tr><td><?php echo $this->Form->input($values['product_id'],array(
'type'=>'checkbox',
'checked'=>false,
'label'=>false,
'div'=>false
)); ?></td></tr>
<tr>
<td rowspan="6">
<img src="<?php echo $values['image_url']; ?>">
</td><td><?php echo $values['brand_name']; ?></td></tr>
<tr><td><?php echo $values['product_name']; ?></td></tr>
<tr><td><?php echo $values['recommend_avg']; ?></td></tr>
<tr><td><?php foreach($values['item_categories'] as $cat)$cat['third_category_name']; ?></td></tr>
<tr><td><?php echo $values['volume_price_long_label']; ?></td></tr>
<tr><td><?php echo $values['sales_date']; ?></td></tr>
	</table>
<?php endforeach;endif; ?>
<?php echo $this->Form->end('選択したものを買い物かごに追加'); ?>