<?php require "constantes.php"; ?>
<p>
Anchos de lona: 1,05m, 2,20m.
<form action="#lona" method="post">
Ancho: <input type="number" name="ancho" /> cms. <br />
Alto: <input type="number" name="alto"  /> cms. <br /><br />
<input type="checkbox" name="mostcoste" value="mostrar" />Coste <br /><br />
<input type="submit" name="calclona" value="Calcular" />
</form>

<?php
if($_POST['calclona'] && isset($_COOKIE["usuario"])){
$ancho = $_POST['ancho'];
$alto = $_POST['alto'];
$mostcoste = $_POST['mostcoste'];

$metros = ($ancho * $alto)/10000;
//Calculo del precio
$precio = $metros * 50; //Precio del metro cuadrado de foam
if($precio<6)
$precio=6;

$coste = $metros * COSTM2LONA;

echo "<br />Metros cuadrados de impresión: "; echo $metros; echo " m<sup>2</sup>. <br />";
if($mostcoste == "mostrar"){
	echo "<br />Coste: "; echo round($coste, 2); echo "€. <br />";
}
echo "<br />PVP: "; echo round($precio, 2); echo "€.";

}
?>

</p>