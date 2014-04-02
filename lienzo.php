<?php require "constantes.php"; ?>
<p>
<form action="#lienzo" method="post">
Tamaño de lienzo: <select name="tamano">
<option value="3040">30x40</option>
<option value="3080">30x80</option>
<option value="4040">40x40</option>
<option value="4050">40x50</option>
<option value="4080">40x80</option>
<option value="5070">50x70</option>
<option value="50100">50x100</option>
<option value="50150">50x150</option>
<option value="6060">60x60</option>
<option value="6080">60x80</option>
<option value="70100">70x100</option>
<option value="8080">80x80</option>
</select>
<br /><br />
<input type="radio" name="tipo" value="venta" />Venta
<input type="radio" name="tipo" value="impresion" checked="checked" />Impresión
<br /><br />
<input type="checkbox" name="mostcoste" value="mostrar" />Coste
<br /><br />
<input type="submit" name="calclienzo" value="Calcular" />
</form>

<?php
if($_POST['calclienzo']){
$tamano = $_POST['tamano'];
$mostcoste = $_POST['mostcoste'];
$tipo = $_POST['tipo'];
$precioimp = 0;
$precioventa = 0;
$metrosimp = 0;
$coste = 0;

switch ($tamano) {
    case 3040:
		$precioventa = "9,90";
        $precioimp = "31,00";
		$metrosimp = "0,12";
		$coste = "4,92";
        break;
    case 3080:
		$precioventa = "15,80";
        $precioimp = "43,00";
		$metrosimp = "0,24";
		$coste = "7,90";
        break;
    case 4040:
		$precioventa = "9,90";
        $precioimp = "33,00";
		$metrosimp = "0,16";
		$coste = "4,95";
        break;
	case 4050:
		$precioventa = "11,50";
        $precioimp = "37,00";
		$metrosimp = "0,20";
		$coste = "5,75";
        break;
	case 4080:
		$precioventa = "7,60";
        $precioimp = "49,00";
		$metrosimp = "0,32";
		$coste = "8,80";
        break;
	case 5070:
		$precioventa = "19,40";
        $precioimp = "52,00";
		$metrosimp = "0,35";
		$coste = "9,66";
        break;
	case 50100:
		$precioventa = "24,20";
        $precioimp = "64,00";
		$metrosimp = "0,50";
		$coste = "12,10";
        break;
	case 50150:
		$precioventa = "33,80";
        $precioimp = "86,00";
		$metrosimp = "0,75";
		$coste = "16,90";
        break;
	case 6060:
		$precioventa = "19,40";
        $precioimp = "53,00";
		$metrosimp = "0,36";
		$coste = "9,70";
        break;
	case 6080:
		$precioventa = "23,80";
        $precioimp = "63,00";
		$metrosimp = "0,48";
		$coste = "11,9";
        break;
	case 70100:
		$precioventa = "27,00";
        $precioimp = "77,00";
		$metrosimp = "0,70";
		$coste = "13,50";
        break;
	case 8080:
		$precioventa = "24,40";
        $precioimp = "72,00";
		$metrosimp = "0,64";
		$coste = "12,20";
        break;
}

if($tipo == "impresion"){
	echo "<br />Metros cuadrados de impresión: "; echo $metrosimp; echo " m<sup>2</sup>. <br />";
}

if($mostcoste == "mostrar"){
	echo "<br />Coste: "; echo $coste; echo "€. <br />";
}

if($tipo == "venta"){
	echo "<br />PVP: "; echo $precioventa; echo "€.";
}else if($tipo == "impresion"){
	echo "<br />PVP: "; echo $precioimp; echo "€.";
}

}
?>

</p>