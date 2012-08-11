<?php
$wide = isset($wide) && $wide ? 'wide':'';
echo
	$html->div('content'.$wide),
	$html->div('pad');
?>