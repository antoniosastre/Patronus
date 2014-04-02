<?php require "constantes.php"; ?>
<p>
Anchos de vinilo:
<form action="#vcorte" method="post">
Ancho: <input type="number" name="ancho" /> cms. <br />
Alto: <input type="number" name="alto"  /> cms. <br /><br />
Tipo: <input type="radio" name="tipo" value="blanco">Blanco
<input type="radio" name="tipo" value="color" checked>Color
<input type="radio" name="tipo" value="esmerilado">Esmerilado<br /><br />
<input type="checkbox" name="mostcoste" value="mostrar" />Coste <br /><br />
<input type="submit" name="calcvcorte" value="Calcular" />
</form>

<?php
if($_POST['calcvcorte'] && isset($_COOKIE["usuario"])){
$ancho = $_POST['ancho'];
$alto = $_POST['alto'];
$tipo = $_POST['tipo'];
$mostcoste = $_POST['mostcoste'];

$metros = ($ancho * $alto)/10000;
//Calculo del precio
if($tipo == "blanco"){
$precio = $metros * 30; //Precio del metro cuadrado de vinilo blanco.
if($precio<5)
$precio=5;
$coste = $metros * COSTM2VINBLAN;
}

if($tipo == "color"){
$precio = $metros * 40; //Precio del metro cuadrado de vinilo de color.
if($precio<6)
$precio=6;
$coste = $metros * COSTM2VINCOL;
}

if($tipo == "esmerilado"){
$precio = $metros * 50; //Precio del metro cuadrado de vinilo esmerilado.
if($precio<8)
$precio=8;
$coste = $metros * COSTM2VINESM;
}

echo "<br />Metros cuadrados de vinilo: "; echo $metros; echo " m<sup>2</sup>. <br />";
if($mostcoste == "mostrar"){
	echo "<br />Coste: "; echo round($coste, 2); echo "€. <br />";
}
echo "<br />PVP: "; echo round($precio, 2); echo "€.";

}
?>

</p>