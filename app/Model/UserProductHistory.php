<?php 
class UserProductHistory extends AppModel
{
	public $uses = array('UserProductHistory');
	public function getHave($userId)
	{
		return "have";
	}
	public function getProductInfo($productId)
	{
		return "ProductInfomation";
	}

}



 ?>