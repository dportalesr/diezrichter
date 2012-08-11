<?php
echo
	$this->element('top'),
	$html->div('clear'),
		$html->div('info column'),
			$html->div('title title4','Oficinas'),
			$html->para(null,'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.'),
			$html->div('title title4','Correo Electrónico'),
			$html->para(null,$util->ofuscar(Configure::read('Site.email'))),
			/*
			$html->div('title title3','Cómo llegar'),
			$html->link($html->image('mapa.jpg'),'/img/mapa.jpg',array('class'=>'pulsembox mapa')),
			*/
		'</div>',
		$html->div('form column omega'),
			$html->para('note','Escríbenos'),
	
			$form->create('Contact',array('id'=>'ContactForm','url'=>'/contacto/enviar')),
			$form->input('mail',array('div'=>'hide')),
			$html->div('subform'),
				$form->input('nombre',array('label'=>'Nombre:')),
				$form->input('email',array('label'=>'E-mail:')),
				$form->input('mensaje',array('label'=>'Mensaje:','rows'=>9,'cols'=>35)),
				$this->Captcha->input(),
				$form->submit('Enviar'),
				$html->para('leydatos','Sus datos serán usados de acuerdo a los términos de la '.$html->link('Ley Federal de Protección de Datos Personales','http://dof.gob.mx/nota_detalle.php?codigo=5150631&fecha=05/07/2010',array('target'=>'_blank','rel'=>'nofollow'))),
			'</div>',
			$form->end(),
		'</div>',
	'</div>',

	$moo->ajaxform('ContactForm');
?>
</div>
</div>
<?php echo $this->element('sidebar'); ?>