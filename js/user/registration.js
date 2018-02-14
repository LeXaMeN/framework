$(function() {
	// DESIGN
	$('input').each(function(index) {
		if ($(this).is('[data-length]')) {
			$(this).characterCounter();
		}
	});
	// VALIDATOR
	$('#confirm_password').on('input change', function() {
		console.log('lol');
		if ($('#password').val() != $('#confirm_password').val()) {
			$(this).removeClass('valid').addClass('invalid');
		} else {
			$(this).removeClass('invalid').addClass('valid')
		}
	});
	// FORM
	$('#form_registration').on('submit', function()
	{
		if ($('#confirm_password').hasClass('invalid'))
		{
			alert('Пароли не совпадают!');
		}
		else
		{
			$.ajax({
				type: 'POST',
				url: '/user.registration',
				data: $('#form_registration').serialize(),
				success: function(data)
				{
					if (data.length == 0)
					{
						alert('Успех!');
						window.location.href = '/user/login';
					}
					else
					{
						alert(data);
					}
				},
				error: function(xhr, str)
				{
					alert('Возникла ошибка: ' + xhr.responseCode + ' ' + str);
				}
			});
		}
	});
});