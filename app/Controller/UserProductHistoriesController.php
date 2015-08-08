<?php 
App::import('Vendor', 'hackathonAPI');
class UserProductHistoriesController extends AppController
{

	public function main()
	{
		$api = new iStyleAPI('members/3578098/have_products',array('id'=>'3578098'));
		$this->set('have',$api->getHave('3578098')['result']);
	}

}


 ?>