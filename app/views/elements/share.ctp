<?php
$prefix = 'http'.(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] ? 's':'').'://'.Configure::read('Site.domain');
$url = isset($url) ? (strpos($url, '/')===0 ? $prefix.$url : $url) : $prefix.$_SERVER['REQUEST_URI'];

echo
	$html->div('share'),
		$html->para(null,'<b>Comparte este proyecto.</b>'),
		$html->link('Facebook','http://www.facebook.com/sharer.php?u='.$url,array('target'=>'_blank','rel'=>'nofollow')),
		$html->tag('span',' / '),
		$html->link('Twitter','http://www.twitter.com/share?url='.$url.'&via=diezrichter&text='.urlencode($title_for_layout),array('target'=>'_blank','rel'=>'nofollow')),
	'</div>';
?>