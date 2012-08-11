<?php
$tags = '';
if(isset($item['Tag']) && $item['Tag']){
	foreach ($item['Tag'] as $tag) {
		$tags.= $html->link($tag['tag'],array('controller'=>'products','action'=>'index','tag'=>$tag['slug']));
	}
}

echo
	$this->element('top'),
	$html->div('detail'),
		$html->div('clear'),
			$html->div('column'),
				$html->tag('h1',$item[$_m[0]]['nombre'],array('class'=>'sidetitle')),
				$html->tag('h3',$tags,'lema'),
			'</div>',
			
			$html->div('column'),
				$item[$_m[0]]['descripcion'],
				'',
			'</div>',

			$html->div('column desc tmce'),
				$item[$_m[0]]['creditos'],
				'',
			'</div>',
		'</div>',
	
		$this->element('slider',array('model'=>$_m[0].'img','data'=>$item[$_m[0].'img'],'skip'=>true)),
	'</div>';
?>
</div>
</div><!-- content -->
<?php echo $this->element('sidebar'); ?>