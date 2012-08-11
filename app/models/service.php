<?php
class Service extends AppModel {
	var $name = 'Service';
	var $labels = array(
		'descripcion'=>'Texto columna 1',
		'descripcion2'=>'Texto columna 2'
	);
	var $skipValidation = array('descripcion');
	var $validate = array();
	
	function beforeValidate(){ $this->clean($this->data,false,array('descripcion','descripcion2')); return true; }
}
?>