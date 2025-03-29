if (document.URL == "http://localhost:8080/onlineshop.uz/") {
	$("#category").removeClass('active');
	$("#home").addClass('active');
} else if (document.URL == "http://localhost:8080/onlineshop.uz/shop/index") {
	$("#category").removeClass('active');
	$("#home").addClass('active');
} else if (document.URL == "http://localhost:8080/onlineshop.uz/shop/category") {
	$("#home").removeClass('active');
	$("#category").addClass('active');
} else if (document.URL == "http://localhost:8080/onlineshop.uz/shop/category?p=c") {
	$("#home").removeClass('active');
	$("#category").addClass('active');
}

$('#add-cart').click(function(e){
	e.preventDefault();
	let count = $('#qty').val();
	let product_name = $('#product_name').val();
	$.ajax({
		url: "/onlineshop.uz/cart/add-cart",
		data: "product_name=" + product_name + "&count=" + count,
		type: "GET",
		success: function(res) {
			if (!res) return false;
			window.location.href = "http://localhost/onlineshop.uz/cart/korzinka?k=y";
		}
	});
})