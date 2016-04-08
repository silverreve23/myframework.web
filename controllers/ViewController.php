<?php

class ViewController{

	public function getViews(){

		Session::init();
		Session::dest();
	}
}