<?php
App::uses('AppController', 'Controller');

class ApiController extends AppController
{
	const SEARCH_URL = 'https://itunes.apple.com/search?';
	
	public function test() {
		$this->autoLayout = false;
		$this->autoRender = false;
		
		$proxy = array(
				"http" => array(
						"proxy" => "tcp://proxy.digicom.dnp.co.jp:8080",
						'request_fulluri' => true,
				),
		);
		$proxy_context = stream_context_create($proxy);
		
		$data = $this->request->data;
		
		$query = array();
		foreach ($data as $key => $value){
			if($value != 'none'){
				$query[$key] = $value;
			}
		}
		$queryStr = http_build_query($query);
		$url = self::SEARCH_URL.$queryStr;
		$json = file_get_contents($url,false,$proxy_context);
		
		echo ($url.'<br>');
		echo ($json);
	}
}
