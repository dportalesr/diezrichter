<?php
class Product extends AppModel {
	var $name = 'Product';
	var $actsAs = array('ExtendAssociations');
	var $hasAndBelongsToMany = array('Tag');

	var $labels = array(
		'creditos'=>'créditos',
		'category_id'=>'categoría',
		'productimg_count'=>'Imágenes'
	);

	var $hasOne = array(
		'Productportada'=>array(
			'className'=>'Productimg',
			'foreignKey'=>'product_id',
			'conditions'=>'Productportada.portada = 1'
		)
	);
	var $hasMany = array(
		'Productimg'=>array(
			'className'=>'Productimg',
			'dependent'=>true
		)
	);    

	var $validate = array();

	function beforeValidate(){
		$this->clean($this->data,false,array('descripcion','creditos'));
		return true;
	}
}
?>