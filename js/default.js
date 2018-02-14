// SETTINGS
$(document).ready(function(){
	$('.dropdown-trigger').dropdown();
	$('.sidenav').sidenav();
	$('.tabs').tabs();
	$('#carousel').carousel({
		fullWidth: true,
		indicators: true
	});
	$('.parallax').parallax();
	$('#server').carousel({
		shift: 50,
	}).carousel('set', 2);
	$('.collapsible').collapsible();
	$('select').select();
});
// CAROUSEL
$(function() {
	var mouseOnCarousel = false;
	$("#carousel").on({
		mouseenter: function () {
			mouseOnCarousel = true;
		},
		mouseleave: function () {
			mouseOnCarousel = false;
		}
	});
	setInterval(function() {
		if (!mouseOnCarousel){
			$('#carousel').carousel('next');
		}
	}, 5000);
});
// SERVERS
$(function() {
	$('.btn-price').each(function() {
		var price = $(this).attr('price');
		if (typeof price !== typeof undefined && price !== false) {
			var text = $(this).text();
			$(this).on({
				mouseenter: function () {
					$(this).text(price);
				},
				mouseleave: function () {
					$(this).text(text);
				}
			});
		}
	});
});
// TAB-ORDER
$(function() {
	$('#cpu-range').on('input', function () {
		var value = $(this).val();
		$('#cpu').text(value == 0 ? 500 : value * 1000);
	});
	$('#ram-range').on('input', function () {
		var value = $(this).val();
		$('#ram').text(value == -1 ? 256 : value == 0 ? 512 : value * 1024);
	});
	$('#ssd-range').on('input', function () {
		var value = $(this).val();
		$('#ssd').text(value == -1 ? 1 : value == 0 ? 3 : value * 10);
	});
	$('#net-range').on('input', function () {
		var value = $(this).val();
		$('#net').text(value == 0 ? 5 : value * 10);
	});
});