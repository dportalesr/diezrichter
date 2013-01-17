<?php
echo
	$html->div('canvas',null,array('id'=>'canvas')),
		$html->div('mask','',array('id'=>'mask1')),
		$html->div('mask','',array('id'=>'mask2'));

	$left_dir = true;
	$modules = Cache::read('sitemodules');
	$captions = array(
		2=>'about',
		4=>'services',
		5=>'products',
		6=>'contacto'
	);

	for($i=0;$i<9;$i++){
		$caption = '';
		$url = 'javascript:;';

		if(isset($captions[$i])){
			$url = array('controller'=>$captions[$i],'action'=>'index');
			$caption = $captions[$i];
		}

		$caption = $html->tag('span','','caption caption_'.$caption);

		echo $html->link($html->tag('span','','top').$html->tag('span','','center').$html->tag('span','','bottom').$caption,$url,array('class'=>'bar'.($left_dir ? ' left':' right').($i ? ' bar'.($i+1):'')));
		$left_dir = !$left_dir;
	}
	
	echo '</div>', $html->script('animation',array('inline'=>false));

?>
