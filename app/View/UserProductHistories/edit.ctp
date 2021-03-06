<h4>購入間隔と配送開始日を設定してください</h4>
<?php echo $this->Form->create('UserProductHistories',array('action'=>'complete')); ?>
<?php if(isset($have)):foreach($have as $values):?>
<?php if($backet['UserProductHistories'][$values['product_id']]): ?>
<table>
	<tr><td>
		<h4>配送開始日<?php echo $this->Form->input('start.'.$values['product_id'],array('label'=>false,'div'=>'false','type' => 'date',
        'dateFormat' => 'YMD',
        'monthNames' => false,
        'timeFormat' => '24',
        'separator' => '/',)); ?></h4></td></tr>
	<tr>
		<td>
			<h4>購入間隔：
				<input style="width:3em" type="number" value="0" class="<?php echo $values['product_id']; ?>" readonly></input>日</h4></td>
		<td colspan="2"><div class="slider" id="<?php echo $values['product_id']; ?>"></div>
		<?php echo $this->Form->input('frequency.'.$values['product_id'],array(
			'type'=>'hidden',
			'value'=>0,
			'class'=>$values['product_id']
		)); ?>
	</td></tr>
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
<?php endif; ?>
<?php endforeach;endif; ?>
<?php echo $this->Form->end('完了'); ?>