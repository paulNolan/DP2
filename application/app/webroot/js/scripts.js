(function($) {
	window.onload = function() {
		$('#preloader').delay(1000).fadeOut('fast', function () {
			$(this).remove();
		});
		$('select').material_select();
	};
})(jQuery);