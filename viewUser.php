<?php
require 'vendor/autoload.php';
use Laminas\Ldap\Ldap;
ini_set('display_errors',0);
if ($_GET['usr'] && $_GET['ou']){
    $domini = 'dc=fjeclot,dc=net';
    $opcions = [
        'host' => 'zend-dasumo.fjeclot.net',
        'username' => "cn=admin,$domini",
        'password' => 'fjeclot',
        'bindRequiresDn' => true,
        'accountDomainName' => 'fjeclot.net',
        'baseDn' => 'dc=fjeclot,dc=net',
    ];
    $ldap = new Ldap($opcions);
    $ldap->bind();
    $entrada='uid='.$_GET['usr'].',ou='.$_GET['ou'].',dc=fjeclot,dc=net';
    $usuari=$ldap->getEntry($entrada);
    echo "<b><u>".$usuari["dn"]."</b></u><br>";
    foreach ($usuari as $atribut => $dada) {
        if ($atribut != "dn") echo $atribut.": ".$dada[0].'<br>';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>MOSTRANT DADES D'USUARIS DE LA BASE DE DADES LDAP</title>
	<!-- Agregar el enlace al archivo de estilo de Bootstrap -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<h2 class="mt-3">Formulari de selecció d'usuari</h2>
		<form action="http://zend-dasumo.fjeclot.net/zendldap" method="GET">
			<div class="form-group">
				<label for="ou">Unitat organitzativa:</label>
				<input type="text" class="form-control" id="ou" name="ou">
			</div>
			<div class="form-group">
				<label for="usr">Usuari:</label>
				<input type="text" class="form-control" id="usr" name="usr">
			</div>
			<button type="submit" class="btn btn-primary">Enviar</button>
			<button type="reset" class="btn btn-secondary">Reiniciar</button>
		</form>
	</div>
</body>
</html>
