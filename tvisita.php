<?php require "constantes.php"; ?>
<p>
<form name="tvisita" method="post" action="">
Cantidad: <input type="text" name="cantidad" />
<br /><br />
<input type="radio" name="color" value="<?php echo COSTEBN; ?>">Blanco y Negro
<input type="radio" name="color" value="<?php echo COSTECOLOR; ?>" checked="checked">Color
<br />
<input type="radio" name="caras" value="1" checked="checked">Una Cara
<input type="radio" name="caras" value="2">Dos Caras
<br />
<input type="radio" name="papel" value="<?php echo SRA3B300; ?>">Estucado Brillo de 300gr
<input type="radio" name="papel" value="<?php echo SRA3B350; ?>" checked="checked">Estucado Brillo de 350gr
<input type="radio" name="papel" value="<?php echo SRA3OF350; ?>">Cartulina Offset de 350gr
<input type="radio" name="papel" value="<?php echo SRA3VERJ; ?>">Cartulina Verjurada
<br />
<input type="radio" name="laminado" value="0" checked="checked">Sin Laminado
<input type="radio" name="laminado" value="1">Laminado 1 cara
<!--<input type="radio" name="laminado" value="2">Laminado 2 caras-->
<br />
<input type="checkbox" name="diseno" value="disenar" />Diseño de la tarjeta
<br /><br />
<input type="checkbox" name="mostcoste" value="mostrar" />Coste
<br /><br />

<input type="submit" name="calctvisita" value="Calcular" />

</form>
<br />
<?php 
$cantidad = $_POST['cantidad'];
$color = $_POST['color'];
$numcaras = $_POST['caras'];
$laminado = $_POST['laminado'];
$mostcoste = $_POST['mostcoste'];
$diseno = $_POST['diseno'];
$costhoja = $_POST['papel'];

if ($_POST['calctvisita'] && isset($_COOKIE["usuario"])){
$pliegos = ceil($cantidad / 25);

$cpliego = $numcaras * $color;
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
$precio += 	DISCARATVISITA * $numcaras;
}
if($color == COSTEBN){
$precio += 10;
$precio += 0.6 * $pliegos * $numcaras;
}else{
$precio += 15;
$precio += 1.25 * $pliegos * $numcaras;
}

$precio += $pliegos * $laminado * 1;

if($costhoja == SRA3VERJ){
	$precio += $pliegos * 1;
}
echo "<br />PVP: "; echo round($precio ,2); echo "€<br />";
}
?>
</p>