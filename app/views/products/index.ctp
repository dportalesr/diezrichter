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
			
		echo $this->element('pages',array('floated'=>true));
		$moo->buffer('
			var thumbs = $$(".thumb");
			thumbs.each(function(el){
				var meta = el.getElement(".meta").fade("hide");meta.getElement(".title").setStyle("margin-top",25);
				var opacityFx = new Fx.Tween(meta,{ "property":"opacity", "transition":"circ:out","duration":800, "link":"cancel" });
				var marginFx = new Fx.Tween(meta.getElement(".title"),{ "property":"margin-top", "transition":"pow:out","duration":500, "link":"cancel" });

				var fx = function(enter){
					if(enter){
						opacityFx.start(1);
						marginFx.start(0);
					}else{
						opacityFx.start(0);
						marginFx.start(25);
					}
				}.bind(el);

				el.store("fx",fx);
				el.addEvents({
					"mouseenter":function(){ (this.retrieve("fx"))(true); }.bind(el),
					"mouseleave":function(){ (this.retrieve("fx"))(false); }.bind(el)
				})
			});
		');

	} else 
		echo $html->para('noresults','No hay elementos que mostrar');
?>
</div>
</div><!-- .content -->