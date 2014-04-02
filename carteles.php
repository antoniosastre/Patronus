<?php require "constantes.php"; ?>
<p>
<form name="carteles" method="post" action="">
Cantidad: <input type="text" name="cantidad" />
<br /><br />
<input type="radio" name="color" value="<?php echo COSTEBN; ?>">Blanco y Negro
<input type="radio" name="color" value="<?php echo COSTECOLOR; ?>" checked="checked">Color
<br />
<input type="radio" name="papel" value="<?php echo SRA3CM150; ?>" checked="checked">Cuché Mate 150gr
<input type="radio" name="papel" value="<?php echo SRA3CM170; ?>">Cuché Mate 170gr
<input type="radio" name="papel" value="<?php echo SRA3OF100; ?>">Offset 100gr
<br />
<input type="checkbox" name="laminado" value="1" />Laminado
<br />
<input type="checkbox" name="diseno" value="disenar" checked="checked" />Diseño del cartel
<br /><br />
<input type="checkbox" name="mostcoste" value="mostrar" />Coste
<br /><br />
<input type="submit" name="calccarteles" value="Calcular" />

</form>
<br />
<?php 
$cantidad = $_POST['cantidad'];
$color = $_POST['color'];
$mostcoste = $_POST['mostcoste'];
$laminado = $_POST['laminado'];
$diseno = $_POST['diseno'];
$costhoja = $_POST['papel'];


if ($_POST['calccarteles'] && isset($_COOKIE["usuario"])){
$pliegos = $cantidad;

$cpliego = $color;
$costeimp = $pliegos * $cpliego;
$costpapel = $pliegos * $costhoja;
$claminado = (METLINLAMDIGBRI/2.18)*$laminado;
$costlaminado = $pliegos * $claminado;
$coste = $costeimp + $costpapel + $costlaminado;

echo "Pliegos: "; echo $pliegos; echo "<br />";
if($mostcoste == "mostrar"){
echo "Coste de Cada pliego: "; echo round(($cpliego + $costhoja + $claminado), 2); echo "€<br />";
echo "Coste de Impresiones: "; echo round($costeimp, 2); echo "€<br />";
echo "Coste de Papel: "; echo round($costpapel, 2); echo "€<br />";
echo "Coste total: "; echo round($coste, 2); echo "€<br />";
}
$precio = 0;
if($diseno == "disenar"){
$precio += 	DISCARTEL;
}
echo "<br />PVP: "; echo round($precio ,2); echo "€<br />";
}
?>
</p>