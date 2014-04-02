<?php require "constantes.php"; ?>
<p>
Tamaño máximo de una plancha: 305cm x 156cm

<form action="#pvc" method="post">
Ancho: <input type="number" name="ancho" /> cms. <br />
Alto: <input type="number" name="alto"  /> cms. <br /><br />
Tipo: <input type="radio" name="tipo" value="3"> PVC 3mm
<input type="radio" name="tipo" value="5" checked> PVC 5mm<br />
<br /><input type="checkbox" name="mostcoste" value="mostrar" />Coste <br /><br />
<input type="submit" name="calcpvc" value="Calcular" />
</form>

<?php
if($_POST['calcpvc'] && isset($_COOKIE["usuario"])){
$ancho = $_POST['ancho'];
$alto = $_POST['alto'];
$tipo = $_POST['tipo'];
$mostcoste = $_POST['mostcoste'];
$precio = 0;


$metros = ($ancho * $alto)/10000;
//Calculo del precio
if($tipo == 3){
$precio = $metros * 85;
$coste = $metros * COSTM2PVC3;
}
if($tipo == 5){
$precio = $metros * 90;
$coste = $metros * COSTM2PVC5;
}
if($precio<8)
$precio=8;

echo "<br />Metros cuadrados de impresión: "; echo $metros; echo " m<sup>2</sup>. <br />";
if($mostcoste == "mostrar"){
	echo "<br />Coste: "; echo round($coste, 2); echo "€. <br />";
}
echo "<br />PVP: "; echo round($precio, 2); echo "€.";

}
?>
</p>