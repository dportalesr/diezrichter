<?php
$tags = array();
if(isset($item['Tag']) && $item['Tag']){
	foreach ($item['Tag'] as $tag) {
		$tags[] = $html->tag('span',$tag['tag']);
		//$tags[] = $html->link($tag['tag'],array('controller'=>'products','action'=>'index','tag'=>$tag['slug']));
	}
}

echo
	$this->element('top',array('wide'=>true)),
	$html->div('detail'),
		$html->div('clear'),
			$html->div('column alpha'),
				$html->tag('h1',$item[$_m[0]]['nombre'],array('class'=>'sidetitle')),
				$html->tag('h3',implode(', ',$tags),'lema'),
			'</div>',
			
			$html->div('column omega'),
				$html->para(null,'<b>Caso:</b><br/><br/>'),
				$item[$_m[0]]['descripcion'],
			'</div>',

			$html->div('column desc tmce omega'),
				$html->para(null,'<b>Créditos:</b>'),
				$html->div('bordered_text'),
					$item[$_m[0]]['creditos'],
					$this->element('share'),
				'</div>',
			'</div>',
		'</div>',
	
		$this->element('showcase',array('model'=>$_m[0].'img','data'=>$item[$_m[0].'img'],'size'=>'820x','skip_portada'=>true)),
			
		/// Next/Prev

		$html->div('paginator floated');

			$directions = array('next'=>'Siguiente','prev'=>'Anterior');
			$related = arraY('prev'=>$related['next'],'next'=>$related['prev']);

			foreach ($directions as $dir => $caption) {
				//$dir_ = $dir == 'next' ? 'prev' : 'next';
				if($related[$dir]){
					echo $html->tag('span',$html->link('',array('controller'=>'products','action'=>'ver','id'=>$related[$dir][$_m[0]]['slug']),array('class'=>$dir)));
				} else {
					echo $html->tag('span','','disabled '.$dir);
				}
			}

			echo $html->link('',array('controller'=>'products','action'=>'index'),array('class'=>'back')),
		
		'</div>',
	'</div>';

?>
</div>
</div><!-- content -->