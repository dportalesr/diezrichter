<?php
echo
	$html->div('footer'),
	$html->div('center'),
		$html->para('social',$html->link('','http://twitter.com/DiezRichter',array('target'=>'_blank','rel'=>'nofollow')).$html->link('','http://facebook.com/DiezRichter',array('target'=>'_blank','rel'=>'nofollow'))),
		$html->para(null,date('Y'),array('id'=>'copyright'));
?>
</div><!-- .center -->
</div><!-- .footer -->