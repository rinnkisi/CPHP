<?php 
App::import('Vendor', 'hackathonAPI');
class UserProductHistoriesController extends AppController
{

	public function main()
	{
		$api = new iStyleAPI('members/3578098/have_products',array('id'=>'3578098'));
		$this->set('have',$api->getHave('3578098')['result']);
		
		/*
		if($basket = $this->Session->read('basket'))
			$basket[] = $this->request->data;
		else
		{
			$basket = array();
			$basket[] = $this->request->data;
		}
		*/
	}
	public function edit()
	{
		if(isset($this->request->data))
		{
			$api = new iStyleAPI('members/3578098/have_products',array('id'=>'3578098'));
			$this->Session->write('backet',$this->request->data['UserProductHistories']);
			$this->set('backet',$this->request->data);
			$this->set('have',$api->getHave('3578098')['result']);
			
		}
	}
	public function complete()
	{
		if(isset($this->request->data))
			var_dump($this->request->data);
$data = array();
foreach($this->request->data['UserProductHistories'] as $productID=>$value)
$data[] = array(
'userid' =>'3578098',
'productid'=>$productID,
'frequency'=>$value
				);
	var_dump($data)	;
		$this->UserProductHistory->saveAll($data);

	}

}


 ?>