<?php require "constantes.php"; ?>
<p>
Altura máxima de objeto plano: 4cm.

<form action="#apcliente" method="post">
Ancho: <input type="number" name="ancho" /> cms. <br />
Alto: <input type="number" name="alto"  /> cms. <br /><br />
<input type="submit" name="calcapcliente" value="Calcular" />
</form>

<?php
if($_POST['calcapcliente'] && isset($_COOKIE["usuario"])){
$ancho = $_POST['ancho'];
$alto = $_POST['alto'];


$metros = ($ancho * $alto)/10000;
//Calculo del precio
$precio = $metros * 50;
if($precio<8)
$precio=8;

echo "<br />Metros cuadrados de impresión: "; echo $metros; echo " m<sup>2</sup>. <br />";
echo "<br />PVP: "; echo round($precio, 2); echo "€.";

}
?>

</p>