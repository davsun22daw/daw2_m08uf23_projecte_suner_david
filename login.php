<!DOCTYPE html>
<html>
<head>
	<title>AUTENTICACIÓ</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<form action="http://zend-dasumo.fjeclot.net/projecte/auth.php" method="POST">
			<div class="form-group">
				<label for="username">Usuari:</label>
				<input type="text" class="form-control" id="username" name="adm" required>
			</div>
			<div class="form-group">
				<label for="password">Contrasenya:</label>
				<input type="password" class="form-control" id="password" name="cts" required>
			</div>
			<button type="submit" class="btn btn-primary">Envia</button>
			<button type="reset" class="btn btn-secondary">Neteja</button>
		</form>
	</div>
</body>
</html>
