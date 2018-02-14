<div class="container row">
	<div class="col s12 offset-m2 m8 offset-l3 l6">
		<div class="card row">
			<form id="form_registration" class="card-content col s12" method="POST" action="javascript:void(null);">
				<span class="card-title">Регистрация</span>
				<div class="input-field">
					<input id="login" type="text" name="login" class="validate" required data-length="50">
					<label for="login">Логин</label>
				</div>
				<div class="input-field">
					<input id="password" type="password" name="password" class="validate" data-length="32">
					<label for="password">Пароль</label>
				</div>
				<div class="input-field">
					<input id="confirm_password" type="password">
					<label for="confirm_password">Подтверждение пароля</label>
				</div>
				<div class="input-field">
					<input id="email" type="email" name="email" class="validate" data-length="100">
					<label for="email">Email</label>
				</div>
				<div class="input-field">
					<input id="name" type="text" name="name" class="validate" data-length="100">
					<label for="name">ФИО</label>
				</div>
				<div class="center">
					<input type="submit" name="btn-registration" value="Отправить" class="btn-large green">
				</div>
			</form>
		</div>
	</div>
</div>