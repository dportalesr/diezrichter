<?php
echo $this->element('top',array('wide'=>true));
	
	if($items){
		foreach($items as $item){
			$url = array('controller'=>'products','action'=>'ver','id'=>$item[$_m[0]]['slug']);
			$tags = '';

			if(isset($item['Tag']) && $item['Tag']){
				$tags = implode(', ',Set::extract('/Tag/tag',$item));
			}

			echo
				$html->tag('a',null,array('href'=>Router::url($url),'class'=>'thumb v')),
					$util->th($item,$_m[0],array('w'=>220,'h'=>220,'fill'=>true)),
					$html->div('meta'),
						$html->tag('h2',$item[$_m[0]]['nombre'],'title'),
						$html->tag('span',$tags,'tag_names'),
					'</div>',
				'</a>';
			
		}
			
		echo $this->element('pages');
		$moo->buffer('
			var thumbs = $$(".thumb");
			thumbs.each(function(el){
				var meta = el.getElement(".meta").setStyles({"top":"-100%","display":"block"});
				el.store("fx",new Fx.Tween(meta,{ "property":"top","unit":"%", "transition":"pow:out","duration":500, "link":"cancel" }));
				el.addEvents({
					"mouseenter":function(){ this.retrieve("fx").start(0); }.bind(el),
					"mouseleave":function(){ this.retrieve("fx").start("-100"); }.bind(el)
				})
			});
		');

	} else 
		echo $html->para('noresults','No hay elementos que mostrar');
?>
</div>
</div><!-- .content -->