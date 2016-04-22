<?php
App::uses('AppController', 'Controller');

class TopController extends AppController
{
	public function index() {
		$this->autoLayout = false;
	}
	
	public function test() {
		$this->autoRender = false;
		$a = $this->request->data;
// 		$url = 'https://itunes.apple.com/search?'.$a;
// 		$json = file_get_contents($url);
		
		var_dump($a) ;
	}
}
