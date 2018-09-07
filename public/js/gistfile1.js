(function($){
	$.fn.replace_html = function(html){
		return this.each(function(){
			var el = $(this);
			el.stop(true, true, false);
			var finish = {width: this.style.width, height: this.style.height};
			var cur = {width: el.width() + "px", height: el.height() + "px"};
			el.html(html);
			var next = {width: el.width() + "px", height: el.height() + "px"};
			el.css(cur).animate(next, 300, function(){el.css(finish);});
		});
	};
})(jQuery);