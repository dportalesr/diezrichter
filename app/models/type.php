<?php
class Type extends AppModel {
	var $name = 'Type';
	var $labels = array();
	var $skipValidation = array();
	var $validate = array(
	);
	var $virtualFields = array(
		'precio_enable' => 'precio IS NOT NULL AND precio <>""',
		'stock_enable' => 'stock IS NOT NULL AND stock <>""'
	);
	var $belongsTo = array(
	    	'Product'=>array(
	    		'className'=>'Product',
	    		'counterCache'=>true
	    	)
	    );    
}
?>