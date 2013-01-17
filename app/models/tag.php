<?php
class Tag extends AppModel {
	var $name = 'Tag';
	var $actsAs = array('ExtendAssociations');
	var $hasAndBelongsToMany = array('Product');
	var $displayField = 'tag';
	
	function savehabtm($data = false, $model_id = false, $model = false){
		//fb(compact('data','model_id','model'),'*** SAVEHABTM ***');
		if(!($data && $model_id)){ return; }
		if(!$model){
			$model = array_keys($this->hasAndBelongsToMany);
			$model = $model[0];
		}
		
		$with = $this->hasAndBelongsToMany[$model]['with'];
		$jointable = $this->hasAndBelongsToMany[$model]['joinTable'];
		
		$all = $this->find('list',array('fields'=>array('id','tag'))); //fb($all,'+ Universe');
		$this->clean($all,true);

		$existing = $data['Tag']; //fb($existing,'+ Existing');
		$new = isset($data['addTag']) && $data['addTag'] ? $data['addTag'] : false;
		$data = array();
		
		/// Tags actuales del elemento
		$current = $this->{$with}->find('list',array('fields'=>array('id','tag_id'),'conditions'=>array(low($model).'_id' => $model_id))); //fb($current,'+ Current');
		
		/// Tags actuales que no se mantuvieron: eliminar
		if($delete = array_diff($current,$existing)){ //fb($delete,'+ To delete');
			$this->{$with}->deleteAll(array('id'=>array_keys($delete)),true,true);
			$conds = array('NOT EXISTS (SELECT * FROM '.$jointable.' WHERE Tag.id = '.$jointable.'.tag_id) AND Tag.id IN ('.implode(',',$delete).')');
			$this->deleteAll($conds,true,true);
		}
		
		//Las nuevas tags
		if($new){ //fb($new,'+ New');
			foreach($new as $tag){
				$tag = trim($tag);
				if($tag && !in_array($tag,$all)){
					$this->create(); // limpiar el id
					$this->save(array(
						'Tag'=>array('tag'=>$tag),
						$model => array('id'=>$model_id)
					));
				}
			}
		}

		/// Tags que se recibieron y existen pero aún no están asociadas al post: solo relacionar.
		if($bind = array_diff($existing,$current)){ //fb($bind,'+ Just bind');
			foreach($bind as $tag){
				$this->{$with}->create(); // limpiar el id
				$this->{$with}->save(array('tag_id'=>$tag,low($model).'_id'=>$model_id));
			}
		}
	}
}
?>