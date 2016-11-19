// Bookmark
function bookmark_site(title,url) { 
	if(navigator.userAgent.toLowerCase().indexOf("msie") != -1) {
		window.external.AddFavorite(url, title); 
	} else {
		alert("Ctrl+D키를 누르시면 즐겨찾기에 추가하실 수 있습니다.");
	}
}

jQuery(document).ready(function($) {
	// Top Navigation
	$(function(){
		$('#sf-menu-top').supersubs({
			minWidth: 11,
			maxWidth: 40,
			extraWidth: 0
		}).superfish({
			delay: 0,
			animation: {opacity:'show'},
			animationOut: {opacity:'hide'},
			speed: 50,
			speedOut: 5
		});
	});

	// Main Navigation
	$(function(){
		$('#sf-menu').supersubs({
			minWidth: 10,
			maxWidth: 40,
			extraWidth: 0
		}).superfish({
			delay: 0,
			animation: {opacity:'show'},
			animationOut: {opacity:'hide'},
			speed: 50,
			speedOut: 5
		});
	});

	// Main Navigation
	$(function(){
		$('#sf-menu').find('.nav1st.sf-with-ul').on('mouseenter focusin',function(){
			var $this = $(this),
				$this_ul = $this.next('ul');
			ul_left_val($this,$this_ul);
		});
		ul_left_val = function($this,$this_ul){
			var a_width = $this.outerWidth()/2,
				ul_width = $this_ul.outerWidth()/2,
				ul_left = ul_width - a_width + 1;
			$this_ul.css('left',-ul_left);
		}
	});

	// Jump to Content
	$(function() {
		$('#skip').on('click', function() {
			var $idf = $("#"+$(this).attr("href").split("#")[1]);
			$idf.attr("tabindex", -1).focus();
		});
	});
	
	// Placeholder
	$(function(){
		$("[placeholder]").textPlaceholder();
	});

	// Scroll Top
	$(function() {
		var dBottom = $(document).height();
		$('#sTop').on('click', function(e){
			e.preventDefault();
			$('html, body').stop(true).animate({scrollTop:0},500,'swing');
		});
		$('#sBottom').on('click', function(e){
			e.preventDefault();
			$('html, body').stop(true).animate({scrollTop:dBottom},500,'swing');
		});
	});
});