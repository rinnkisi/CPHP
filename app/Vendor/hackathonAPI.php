<?php

class iStyleAPI{
	public $client_id='21624159027110b37d9248dd075851ffa9504cdd97c9c6a7daec6b662dc0b2b3';
	public $dry_run;
	public $url="https://pf-api.cosme.net/cosme/v1/";
	public $parameta=array();
	public $resource;

	function __construct($resource,$parameta=array(),$dry_run=0) {
		$this->resource = $resource;
		$this->dry_run=$dry_run;
		$this->parameta=$parameta;
	}
	

	public function getUserID($id)
	{	
		$URL='https://pf-api.cosme.net/cosme/v1/members/'.$id.'?client_id='.$this->client_id;
		$res = $this->getContents($URL);
		return $res['istyle_id'];
	}
	public function getHave($id)
	{
		$URL='https://pf-api.cosme.net/cosme/v1/members/'.$this->getUserID($id).'/have_products?client_id='.$this->client_id;
		$res = $this->getContents($URL);
		return $res;
	}
	private function getContents($URL)
	{
		$response = file_get_contents($URL);
		$pos = strpos($http_response_header[0],'200');
		if($pos === false)
		{
			switch($http_respnse_header[0])
			{
				case '500': break;
				default:break;
			}
		}
		else
		{
			return json_decode($response,true);
		}
	}
	private function getUrl($resource)
	{
		$this->url .= $this->resource;
		$this->url .= '?client_id='.$this->client_id.'&';
		$tmp = $this->parameta;
		if(count($this->parameta)>0)
		foreach($this->parameta as $key=>$value)
		{
			$this->url .= $key.'='.$value;
			$this->url .= next($tmp)?'&':'';
		}
		return $this->url."\n";
	}

}






 ?>