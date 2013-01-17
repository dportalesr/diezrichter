<?php
echo $this->element('top');

if($item){
	echo
		$html->div('clear'),
			$html->div('column desc tmce',$item[$_m[0]]['descripcion'].''),
			$html->div('column desc tmce omega'),
				$html->para(null,'<b>Colaboraciones:</b>'),
				$html->div('desc tmce bordered_text',$item[$_m[0]]['descripcion2'].''),
			'</div>',
		'</div>';
}
?>
</div>
</div>
<?php echo $this->element('sidebar'); ?>