<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Inicio</title>
<?php
if (isset($_COOKIE["usuario"]))
echo "<meta HTTP-EQUIV=\"REFRESH\" content=\"1; url=calculo.php\">";
?>
</head>

<body>

<?php
if (isset($_COOKIE["usuario"])){
echo "Usuario reconocido. Redirigiendo...";
}else{
	
echo "<form action=\"tunel.php\" method=\"post\">
Nombre: <input type=\"text\" name=\"nombre\" />
Contraseña: <input type=\"password\" name=\"contrasena\" />
<input type=\"submit\" name=\"mandar\" value=\"Mandar\" />

</form>";
	
}

?>
</body>
</html>