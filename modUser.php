<?php
	require 'vendor/autoload.php';
	use Laminas\Ldap\Attribute;
	use Laminas\Ldap\Ldap;
	
	ini_set('display_errors', 0);

	if($_SERVER['REQUEST_METHOD'] === 'POST') {

		$uid = $_POST['uid'];
		$unorg = $_POST['unorg'];
		$campo = $_POST['campo'];
		$valor = $_POST['valor'];

		# Entrada a modificar
		$dn = 'uid='.$uid.',ou='.$unorg.',dc=fjeclot,dc=net';
		
		# Atribut a modificar
		switch ($campo) {
			case 'num_id':
				$atribut='uidNumber';
				break;
			case 'grup':
				$atribut='gidNumber';
				break;
			case 'dir_pers':
				$atribut='homeDirectory';
				break;
			case 'sh':
				$atribut='loginShell';
				break;
			case 'cn':
				$atribut='cn';
				break;
			case 'sn':
				$atribut='sn';
				break;
			case 'nom':
				$atribut='givenName';
				break;
			case 'mobil':
				$atribut='mobile';
				break;
			case 'adressa':
				$atribut='postalAddress';
				break;
			case 'telefon':
				$atribut='telephoneNumber';
				break;
			case 'titol':
				$atribut='title';
				break;
			case 'descripcio':
				$atribut='description';
				break;
			default:
				echo "No s'ha seleccionat cap camp per modificar.";
				exit();
		}
		
		#Opcions de la connexió al servidor i base de dades LDAP
		$opcions = [
			'host' => 'zend-dasumo.fjeclot.net',
			'username' => 'cn=admin,dc=fjeclot,dc=net',
			'password' => 'fjeclot',
			'bindRequiresDn' => true,
			'accountDomainName' => 'fjeclot.net',
			'baseDn' => 'dc=fjeclot,dc=net',		
		];
		
		# Modificant l'entrada
		$ldap = new Ldap($opcions);
		$ldap->bind();
		$entrada = $ldap->getEntry($dn);
		if ($entrada){
			Attribute::setAttribute($entrada,$atribut,$valor);
			$ldap->update($dn, $entrada);
			echo "Atribut modificat"; 
		} else echo "<b>Aquesta entrada no existeix</b><br><br>";	
	}
?>
