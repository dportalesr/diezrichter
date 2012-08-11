<div class="sidebar">
<div class="pad">
<?php
$lemas = array(
	'about'=>'estudio de diseño.',
	'services'=>'trabajemos juntos.',
	'contacto'=>'información, presupuestos o simplemente saludos.'
);

$lema = isset($lemas[$this->params['controller']]) ? $lemas[$this->params['controller']] : '';

if(is_c('about',$this)){
	$_ts = str_replace('iez', 'iez<br/>', $_ts);
}

echo
	$html->tag('h2',$_ts,'sidetitle'),
	$html->tag('h3',$lema,'lema');

?>
</div>
</div>