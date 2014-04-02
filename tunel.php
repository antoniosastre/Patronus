<?php
if($_POST['contrasena'] == "genial"){
$expire=time()+60*60*12;
setcookie("usuario", $_POST['nombre'], $expire);
	}
	
	
	$imagen = "gif/" . "0001" . ".gif";	

	
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Tunel</title>
<?php
if($_POST['contrasena'] != "genial"){
	echo "<meta HTTP-EQUIV=\"REFRESH\" content=\"1; url=index.php\">";
}
?>
</head>

<body>
<?php
if($_POST['contrasena'] == "genial"){
echo "<img src=\"";
echo $imagen;
echo "\" />";
?>

<br />
<a href="calculo.php"><button>Continuar</button></a>

<?php
}else{
	echo "Contraseña incorrecta. Volviendo...";
}
?>
</body>
</html>