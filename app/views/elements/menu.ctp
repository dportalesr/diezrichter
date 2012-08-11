<ul id="menu">
<?php
//echo $html->tag('li',$html->link($html->tag('span', 'inicio'),'/'),array('class'=>$this->params['controller']=='inicio' ? 'mSelected' : ''));
foreach(Configure::read('Modules') as $cntllr => $mod){
	if(isset($mod['menu']) && $mod['menu']){
		echo
			$html->tag('li',
				$html->link(
					$html->tag('span',substr($mod['menu'], 0,1),'firstletter').$html->tag('span',substr($mod['menu'], 1).'.'),
					array('controller'=>$cntllr,'action'=>'index')
				),
				array('class'=>$this->params['controller'] == $cntllr ? 'mSelected' : '')
			);
	}
}
?>
</ul>