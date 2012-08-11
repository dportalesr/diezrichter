<?php
class About extends AppModel {
	var $name = 'About';
	var $useTable = 'about';
	var $labels = array(
		'descripcion'=>'Texto columna 1',
		'descripcion2'=>'Texto columna 2'
	);

	function beforeValidate(){ $this->clean($this->data,false,array('descripcion','descripcion2')); return true; }
}
?>