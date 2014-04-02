<?php require "constantes.php"; ?>
<p>
Tamaño máximo de una plancha: 305cm x 156cm
<form action="#foam" method="post">
Ancho: <input type="number" name="ancho" /> cms. <br />
Alto: <input type="number" name="alto"  /> cms. <br /><br />
<input type="checkbox" name="mostcoste" value="mostrar" />Coste <br /><br />
<input type="submit" name="calcfoam" value="Calcular" />
</form>

<?php
if($_POST['calcfoam'] && isset($_COOKIE["usuario"])){
$ancho = $_POST['ancho'];
$alto = $_POST['alto'];
$mostcoste = $_POST['mostcoste'];

$metros = ($ancho * $alto)/10000;
//Calculo del precio
$precio = $metros * 85; //Provisional Precio del metro cuadrado de foam
if($precio<8)
$precio=8;

$coste = $metros * COSTM2FOAM;

echo "<br />Metros cuadrados de impresión: "; echo $metros; echo " m<sup>2</sup>. <br />";
if($mostcoste == "mostrar"){
	echo "<br />Coste: "; echo round($coste, 2); echo "€. <br />";
}
echo "<br />PVP: "; echo round($precio, 2); echo "€.";

}
?>

</p>