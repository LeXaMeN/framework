$(function() {
	// DESIGN
	$('input').each(function(index) {
		if ($(this).is('[data-length]')) {
			$(this).characterCounter();
		}
	});
	// FORM
	$('#form_login').on('submit', function()
	{
		$.ajax({
			type: 'POST',
			url: '/user.login',
			data: $('#form_login').serialize(),
			success: function(data)
			{
				if (data.length == 0)
				{
					alert('Hello ' + $('#login').val() + '!');
					window.location.href = '/';
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
	});
});