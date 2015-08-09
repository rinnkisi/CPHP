
<?php if(isset($have)):foreach($have as $values):?>
	<table>
<tr><td rowspan="6">
<img src="<?php echo $values['image_url']; ?>">
</td><td><?php echo $values['brand_name']; ?></td></tr>
<tr><td><?php echo $values['product_name']; ?></td></tr>
<tr><td><?php echo $values['recommend_avg']; ?></td></tr>
<tr><td><?php foreach($values['item_categories'] as $cat)$cat['third_category_name']; ?></td></tr>
<tr><td><?php echo $values['volume_price_long_label']; ?></td></tr>
<tr><td><?php echo $values['sales_date']; ?></td></tr>
	</table>
<?php endforeach;endif; ?>
