$( document ).ready(function() {
		document.addEventListener("scroll", function(){
			if (document.body.scrollTop > 5 || document.documentElement.scrollTop > 5){
				$('nav').css('position','fixed');
				$('.banner').css('margin-top','90px');
				$('nav').css('box-shadow','5px 10px 18px rgb(93, 92, 92,0.3)');
			}else{
				$('nav').css('position','static');
				$('.banner').css('margin-top','0px');
				$('nav').css('box-shadow','none');
			}
		});
	});