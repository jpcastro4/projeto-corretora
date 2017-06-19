<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once('Instagram/Instagram.php');

use InstagramAPI\Instagram; 

Class Insta {

	private $ig;

	public function __construct()
    {
    	//$this->ig = new Instagram();
    }

	public function get(){
		$this->ig = new Instagram(false);
		$this->ig->setUser('jpcastro4', 'somosfoda');
		$this->ig->login();

		//$a = $this->ig->getUsernameId('jpcastro4');
		//echo $a;
	}

}

