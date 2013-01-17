({
	upwards: true,
	bars: $$('#canvas .bar'),
	init:function(){
		this.bars.each(function(bar,idx){
			var bar_height = bar.getElement('.center').getDimensions().y + 60;
			bar.setStyle('height',bar_height);
			var fx_options = { duration:300, link:'cancel', transition:'circ:in:out' };
			bar.store('bar_height',bar_height);

			bar.setStyles({
				left:idx*60,
				top:((390 -bar_height)/2)+60
			}).set('morph',Object.merge(fx_options, { duration:480 }));

			bar.getElements('span').set('morph',Object.merge(fx_options,{ link:'chain' })).set('reveal',Object.merge(fx_options,{duration:800}));
			bar.getElement('.caption').setStyle('display','none');

			bar.addEvents({
				'click':function(e){
					var ev = new Event(e);
					ev.stop();

					var anchor = ev.target;
					
					if(ev.target.tag != 'a') anchor = anchor.getParent('a');
					if(anchor.href != 'javascript:;'){
						$$('.caption').setStyle('display','none');
						this.outro();
						(function(){ window.location = anchor.href }).delay(((this.bars.length-1)*150)+(480*2));
					}

				}.bind(this),
				'mouseenter':function(){
					this.getElements('.top,.bottom,.center').morph('.bar'+(idx ? idx+1:'')+'_hover');
					bar.getElement('.caption').reveal();
				},
				'mouseleave':function(){
					this.getElements('.top,.bottom,.center').morph('.bar_base');
					bar.getElement('.caption').dissolve();
				}
			});
		}.bind(this));
	},
	outro:function(){
		this.bars.each(function(bar,idx){
			var bar_height = bar.retrieve('bar_height'), new_top;

			(function(){
				new_top = this.upwards ? 255-bar_height : 255;
				bar.store('target_mask',this.upwards ? 'mask1':'mask2');

				this.upwards = !this.upwards;
				
				bar.morph({'top':new_top}).get('morph').chain(function(){
					var bar_height = this.retrieve('bar_height'), new_top, target_mask = this.retrieve('target_mask');

					if(target_mask == 'mask2') this.setStyle('top',0);
					this.inject(target_mask);

					new_top = target_mask == 'mask1' ? 255 : -bar_height;
					this.morph({'top':new_top});

				}.bind(bar));
			}).delay(150*idx,this);

		}.bind(this));
	}
}).init();