(function($) {

	function initPurchaseOrderProducts() {
		$('.purchase-order-product').unbind();
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

	window.onload = function() {
		$('#preloader').delay(1000).fadeOut('fast', function () {
			$(this).remove();
		});

		$('select').material_select();


		var rowCount = 1;
		var firstRow = $('.product-row:first');
		var lastRow = $('.product-row:last');
		$('#add-product').click(function() {
			var newRow = firstRow.clone();
			newRow.find('.error-message').remove();
			newRow.find('.form-error').removeClass('form-error');
			newRow.addClass('product-row-' + rowCount);
			newRow.find('select').prop('id', newRow.find('.purchase-order-product').prop('id').replace(/0/, rowCount)).prop('name', newRow.find('.purchase-order-product').prop('name').replace(/0/, rowCount)).val('');
			newRow.find('.purchase-order-product-qty').prop('id', newRow.find('.purchase-order-product-qty').prop('id').replace(/0/, rowCount)).prop('name', newRow.find('.purchase-order-product-qty').prop('name').replace(/0/, rowCount)).val(0);
			newRow.find('.purchase-order-product-price').prop('id', newRow.find('.purchase-order-product-price').prop('id').replace(/0/, rowCount)).prop('name', newRow.find('.purchase-order-product-price').prop('name').replace(/0/, rowCount)).val('');
			lastRow.after(newRow);
			rowCount++;
			initPurchaseOrderProducts();
			return false;
		});

		initPurchaseOrderProducts();

		$('#StaffChangePassword').change(function() {
			if ($(this).is(':checked')) {
				$('#StaffPasswordHash').prop('disabled', false);
			}
			else {
				$('#StaffPasswordHash').prop('disabled', true);
			}
		});
	};

})(jQuery);