<?php require "constantes.php"; ?>
<p>
Anchos de vinilo:
<form action="#vimpreso" method="post">
Ancho: <input type="number" name="ancho" /> cms. <br />
Alto: <input type="number" name="alto"  /> cms. <br /><br />
Tipo: <input type="radio" name="tipo" value="blanco" checked>Blanco
<input type="radio" name="tipo" value="transp">Transparente
<input type="radio" name="tipo" value="esmerilado">Esmerilado<br />

Acabado: <input type="radio" name="acabado" value="no" checked>No
<input type="radio" name="acabado" value="brillo">Laminado Brillo
<input type="radio" name="acabado" value="mate">Laminado Mate
<input type="radio" name="acabado" value="fondblanc">Fondeado Blanco<br /><br />
<input type="checkbox" name="mostcoste" value="mostrar" />Coste <br /><br />
<input type="submit" name="calcvimpreso" value="Calcular" />
</form>

<?php
if($_POST['calcvimpreso'] && isset($_COOKIE["usuario"])){
$ancho = $_POST['ancho'];
$alto = $_POST['alto'];
$tipo = $_POST['tipo'];
$acabado = $_POST['acabado'];
$mostcoste = $_POST['mostcoste'];

$metros = ($ancho * $alto)/10000;
//Calculo del precio
if($tipo == "blanco"){
$precio = $metros * 20; //Precio del metro cuadrado de vinilo blanco.
if($precio<5)
$precio=5;
$coste = $metros * COSTM2VINBLAN;
}

if($tipo == "transp"){
$precio = $metros * 30; //Precio del metro cuadrado de vinilo transparente.
if($precio<6)
$precio=6;
$coste = $metros * COSTM2VINESM;
}

if($tipo == "esmerilado"){
$precio = $metros * 50; //Precio del metro cuadrado de vinilo esmerilado.
if($precio<8)
$precio=8;
$coste = $metros * COSTM2VINESM;
}

if($acabado != "no"){
	if($metros * 20 < 5){
		$precio += 5;
	}else{
		$precio += $metros * 20;
	}
$coste += $metros * COSTM2LAMVIN;	
}

echo "<br />Metros cuadrados de impresión: "; echo $metros; echo " m<sup>2</sup>. <br />";
if($mostcoste == "mostrar"){
	echo "<br />Coste: "; echo round($coste, 2); echo "€. <br />";
}
echo "<br />PVP: "; echo round($precio, 2); echo "€.";

}
?>

</p>