<?php
class Productimg extends AppModel {
	var $name = 'Productimg';
	var $actsAs = array('File'=>array('portada'=>'product_id','fields'=>array('src'=>array('strict'=>'Galería, ancho mínimo: 820; Portada: 220 x 220','maxsize'=>256000))));
	var $belongsTo = array(
		'Product' => array(
			'className'=>'Product',
			'counterCache' => true
		)
	);
}
?>