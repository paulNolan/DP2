(function($) {
	window.onload = function() {
		$('#preloader').delay(1000).fadeOut('fast', function () {
			$(this).remove();
		});

		$('select').material_select();


		var rowCount = 1;
		var firstRow = $('.product-row');
		$('#add-product').click(function() {
			var newRow = firstRow.clone();
			newRow.addClass('product-row-' + rowCount);
			$('.product-row').children('.col').each(function() {
				var name, id;
				if ($(this).contains('select')) {
					name = $(this).children('select').attr('name');
					id = $(this).children('select').attr('id');
					console.log(id);
					name = name.replace(/0/, rowCount);
					id = id.replace(/0/, rowCount);
					$(this).children('select').attr('name', name);
				}
				else if ($(this).contains('input')) {
					name = $(this).children('input').attr('name');
					id = $(this).children('input').attr('id');
					console.log(id);
					name = name.replace(/0/, rowCount);
					id = id.replace(/0/, rowCount);
					$(this).children('input').attr('name', name);
				}
			});
			firstRow.after(newRow);
			totalRows++;
			return false;
		});

		$('.product-row').each(function() {
			var $this = this;
			$(this).find('.purchase-order-product').change(function() {
				$(this).prop('disabled', true);
				var _id = $(this).val(),
					_select = this;
				$.ajax({
					dataType: 'json',
					url: '/admin/products/get_product/' + _id + '.json'
				}).done(function(data) {
					$($this).find('.purchase-order-product-price').val(data.Product.price);
					$(_select).prop('disabled', false);
					(data.Product.qty == 0) ? $($this).find('.purchase-order-product-qty').prop('disabled', true).val(0) : $($this).find('.purchase-order-product-qty').prop('disabled', false);
				}).fail(function() {

				});
			});
		});


	};
})(jQuery);