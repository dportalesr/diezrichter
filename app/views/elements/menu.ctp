<ul id="menu">
<?php
//echo $html->tag('li',$html->link($html->tag('span', 'inicio'),'/'),array('class'=>$this->params['controller']=='inicio' ? 'mSelected' : ''));
foreach(Configure::read('Modules') as $cntllr => $mod){
	if(isset($mod['menu']) && $mod['menu']){
		echo
			$html->tag('li',
				$html->tag('span','','firstletter').
				$html->link(
					$mod['menu'],
					array('controller'=>$cntllr,'action'=>'index')
				),
				array('class'=>'m'.ucfirst($cntllr).($this->params['controller'] == $cntllr ? ' mSelected' : ''))
			);
	}
}
?>
</ul>
<?php echo $html->link('','',array('id'=>'top')); ?>