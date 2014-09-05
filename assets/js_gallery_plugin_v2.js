		  var preview_class = '.idh_fullscreen_slider';
		  var preview = $(preview_class);		  
		  var slide_delay = 4000; // 2 seconds wait till next fade
		  var slide_out = 2000; // delay outfading
		  var slide_in = 2000; // delay infading
		  var active_class = 'slide_active';
		  var start_check = preview.hasClass(active_class);
		  console.log(start_check);
		  
		  // get first element
		  $('.first').on('click', function(){
				$(preview_class+' ul li').fadeOut().removeClass(active_class);
				$(preview_class+' ul li').first().fadeIn().addClass(active_class);
		  });
		  
		  // next button
		  $('.slider_navigation_right').on('click', function(){
				var active = $('.idh_fullscreen_slider ul .'+active_class); /// li.hasClass('active');
				var next_li = active.next();
				if (next_li.children().html()==undefined) { var next_li = $('.idh_fullscreen_slider ul li').first(); }				
				active.stop().fadeOut(slide_out).removeClass(active_class);
				next_li.fadeIn(slide_in).addClass(active_class);
		  })
		  
		  // prev button
		  $('.slider_navigation_left').on('click', function(){
				var active = $('.idh_fullscreen_slider ul .slide_active'); /// li.hasClass('active');
				var next_li = active.prev();
				if (next_li.children().html()==undefined) { var next_li = $('.idh_fullscreen_slider ul li').last(); }				
				active.fadeOut(slide_out).removeClass(active_class);
				next_li.fadeIn(slide_in).addClass(active_class);
		  })		  
		  
		  if (start_check===false){ $('.first').trigger('click'); }
		  
		  // play func
		  $('.play').on('click',function(){ dia = setInterval(function(){ $('.slider_navigation_right').trigger('click'); }, slide_delay); })
		  // stop func
		  $('.stop').on('click', function(){ clearInterval(dia); });
		  
		  // start playing auto
		  $('.play').trigger('click');