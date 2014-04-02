<?php require "constantes.php"; ?>
<p>
Tamaño máximo de una plancha: 305cm x 156cm
<form action="#dibon" method="post">
Ancho: <input type="number" name="ancho" /> cms. <br />
Alto: <input type="number" name="alto"  /> cms. <br /><br />
<input type="checkbox" name="mostcoste" value="mostrar" />Coste <br /><br />
<input type="submit" name="calcdibon" value="Calcular" />
</form>

<?php
if($_POST['calcdibon'] && isset($_COOKIE["usuario"])){
$ancho = $_POST['ancho'];
$alto = $_POST['alto'];
$mostcoste = $_POST['mostcoste'];

$metros = ($ancho * $alto)/10000;
//Calculo del precio
$precio = $metros * 100;
if($precio<10)
$precio=10;

$coste = $metros * COSTM2DIBON;

echo "<br />Metros cuadrados de impresión: "; echo $metros; echo " m<sup>2</sup>. <br />";
if($mostcoste == "mostrar"){
	echo "<br />Coste: "; echo round($coste, 2); echo "€. <br />";
}
echo "<br />PVP: "; echo round($precio, 2); echo "€.";

}
?>

</p>