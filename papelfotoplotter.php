<?php require "constantes.php"; ?>
<p>
Anchos de papel:
<form action="#papelfotoplotter" method="post">
Ancho: <input type="number" name="ancho" /> cms. <br />
Alto: <input type="number" name="alto"  /> cms. <br /><br />
<input type="checkbox" name="mostcoste" value="mostrar" />Coste <br /><br />
<input type="submit" name="calcpapelfotoplot" value="Calcular" />
</form>

<?php
if($_POST['calcpapelfotoplot'] && isset($_COOKIE["usuario"])){
$ancho = $_POST['ancho'];
$alto = $_POST['alto'];
$mostcoste = $_POST['mostcoste'];

$metros = ($ancho * $alto)/10000;
//Calculo del precio
$precio = $metros * 25; //Precio del metro cuadrado de foam
if($precio<5)
$precio=5;

$coste = $metros * COSTM2PAPELFOTO;

echo "<br />Metros cuadrados de impresión: "; echo $metros; echo " m<sup>2</sup>. <br />";
if($mostcoste == "mostrar"){
	echo "<br />Coste: "; echo round($coste, 2); echo "€. <br />";
}
echo "<br />PVP: "; echo round($precio, 2); echo "€.";

}
?>

</p>