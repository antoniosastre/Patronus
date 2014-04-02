<?php require "constantes.php"; ?>
<p>
<form name="flyer" method="post" action="">
Cantidad: <input type="text" name="cantidad" />
<br /><br />
<input type="radio" name="color" value="<?php echo COSTEBN; ?>" checked="checked">Blanco y Negro
<input type="radio" name="color" value="<?php echo COSTECOLOR; ?>">Color
<br />
<input type="radio" name="tamano" value="2">DIN A4
<input type="radio" name="tamano" value="4" checked="checked">DIN A5
<input type="radio" name="tamano" value="8">DIN A6
<input type="radio" name="tamano" value="3">3 Por pliego
<input type="radio" name="tamano" value="5">5 Por pliego
<input type="radio" name="tamano" value="6">6 Por pliego
<input type="radio" name="tamano" value="7">7 Por pliego
<br />
<input type="radio" name="caras" value="1" checked="checked">Una Cara
<input type="radio" name="caras" value="2">Dos Caras
<br />
<input type="radio" name="laminado" value="0" checked="checked">Sin Laminado
<input type="radio" name="laminado" value="1">Laminado 1 cara
<!--<input type="radio" name="laminado" value="2">Laminado 2 caras-->
<br />
<input type="radio" name="papel" value="<?php echo SRA3CM150; ?>">Cuché Mate 150gr
<input type="radio" name="papel" value="<?php echo SRA3CM170; ?>">Cuché Mate 170gr
<input type="radio" name="papel" value="<?php echo SRA3CM200; ?>">Cuché Mate 200gr
<input type="radio" name="papel" value="<?php echo SRA3OF100; ?>" checked="checked">Offset 100gr
<input type="radio" name="papel" value="<?php echo A3OF90; ?>">Offset 90gr
<br />
<input type="checkbox" name="diseno" value="disenar" checked="checked"/>Diseño de Flyer
<br /><br />
<input type="checkbox" name="mostcoste" value="mostrar" />Coste
<br /><br />

<input type="submit" name="calcflyer" value="Calcular" />

</form>
<br />
<?php 
$cantidad = $_POST['cantidad'];
$color = $_POST['color'];
$numcaras = $_POST['caras'];
$tamano = $_POST['tamano'];
$mostcoste = $_POST['mostcoste'];
$diseno = $_POST['diseno'];
$costhoja = $_POST['papel'];
$laminado = $_POST['laminado'];


if ($_POST['calcflyer'] && isset($_COOKIE["usuario"])){
$pliegos = ceil($cantidad / $tamano);

$cpliego = $numcaras * $color;
$costeimp = $pliegos * $cpliego;
$costpapel = $pliegos * $costhoja;

$coste = $costeimp + $costpapel;

echo "Pliegos: "; echo $pliegos; echo "<br />";
if($mostcoste == "mostrar"){
echo "Coste de Cada pliego: "; echo round(($cpliego + $costhoja), 2); echo "€<br />";
echo "Coste de Impresiones: "; echo round($costeimp, 2); echo "€<br />";
echo "Coste de Papel: "; echo round($costpapel, 2); echo "€<br />";
echo "Coste total: "; echo round($coste, 2); echo "€<br />";
}
$precio = 0;

if($diseno == "disenar"){
$precio += 	DISCARAFLYER * $numcaras;
}

if($color == COSTEBN){
$precio += 10;
}else{
$precio += 15;
}

if($color == COSTEBN){ //Coste de BN.

if($pliegos < 125){
	$precio = $pliegos * $numcaras * 0.1;
}else if($pliegos < 250){
	$precio = $pliegos * $numcaras * 0.09;
}else if($pliegos < 500){
	$precio = $pliegos * $numcaras * 0.08;
}else if($pliegos < 1250){
	$precio = $pliegos * $numcaras * 0.06;
}else if($pliegos < 1875){
	$precio = $pliegos * $numcaras * 0.04;
}else if($pliegos < 2500){
	$precio = $pliegos * $numcaras * 0.035;
}else{
	$precio = $pliegos * $numcaras * 0.03;
}

}else{ //O coste de color
	
if($pliegos < 125){
	$precio = $pliegos * $numcaras * 0.6;
}else if($pliegos < 250){
	$precio = $pliegos * $numcaras * 0.5;
}else if($pliegos < 500){
	$precio = $pliegos * $numcaras * 0.4;
}else if($pliegos < 1250){
	$precio = $pliegos * $numcaras * 0.32;
}else if($pliegos < 1875){
	$precio = $pliegos * $numcaras * 0.22;
}else if($pliegos < 2500){
	$precio = $pliegos * $numcaras * 0.2;
}else{
	$precio = $pliegos * $numcaras * 0.18;
}
}

if($pliegos < 125){ //Precios del laminado.
	$precio += $pliegos * $laminado * 1;
}else if($pliegos < 250){
	$precio += $pliegos * $laminado * 0.8;
}else if($pliegos < 500){
	$precio += $pliegos * $laminado * 0.65;
}else if($pliegos < 1250){
	$precio += $pliegos * $laminado * 0.5;
}else if($pliegos < 1875){
	$precio += $pliegos * $laminado * 0.3;
}else if($pliegos < 2500){
	$precio += $pliegos * $laminado * 0.2;
}else{
	$precio += $pliegos * $laminado * 0.1;
}

//Precios del papel.
if($costhoja == SRA3CM150){
	  if($pliegos < 125){
	  $precio += $pliegos * 0.6;
  }else if($pliegos < 250){
	  $precio += $pliegos * 0.5;
  }else if($pliegos < 500){
	  $precio += $pliegos * 0.42;
  }else if($pliegos < 1250){
	  $precio += $pliegos * 0.35;
  }else if($pliegos < 1875){
	  $precio += $pliegos * 0.25;
  }else if($pliegos < 2500){
	  $precio += $pliegos * 0.2;
  }else{
	  $precio += $pliegos * 0.15;
  }
}else if($costhoja == SRA3CM170){
	  if($pliegos < 125){
	  $precio += $pliegos * 0.7;
  }else if($pliegos < 250){
	  $precio += $pliegos * 0.57;
  }else if($pliegos < 500){
	  $precio += $pliegos * 0.48;
  }else if($pliegos < 1250){
	  $precio += $pliegos * 0.4;
  }else if($pliegos < 1875){
	  $precio += $pliegos * 0.29;
  }else if($pliegos < 2500){
	  $precio += $pliegos * 0.23;
  }else{
	  $precio += $pliegos * 0.17;
  }
}else if($costhoja == SRA3CM200){
		  if($pliegos < 125){
	  $precio += $pliegos * 0.8;
  }else if($pliegos < 250){
	  $precio += $pliegos * 0.63;
  }else if($pliegos < 500){
	  $precio += $pliegos * 0.51;
  }else if($pliegos < 1250){
	  $precio += $pliegos * 0.44;
  }else if($pliegos < 1875){
	  $precio += $pliegos * 0.32;
  }else if($pliegos < 2500){
	  $precio += $pliegos * 0.25;
  }else{
	  $precio += $pliegos * 0.2;
  }

}else if($costhoja == SRA3OF100){
		  if($pliegos < 125){
	  $precio += $pliegos * 0.15;
	  echo "Oooh";
  }else if($pliegos < 250){
	  $precio += $pliegos * 0.12;
  }else if($pliegos < 500){
	  $precio += $pliegos * 0.09;
  }else if($pliegos < 1250){
	  $precio += $pliegos * 0.07;
  }else if($pliegos < 1875){
	  $precio += $pliegos * 0.05;
  }else if($pliegos < 2500){
	  $precio += $pliegos * 0.04;
  }else{
	  $precio += $pliegos * 0.032;
  }

}else if($costhoja == A3OF90){
		  if($pliegos < 125){
	  $precio += $pliegos * 0.13;
  }else if($pliegos < 250){
	  $precio += $pliegos * 0.10;
  }else if($pliegos < 500){
	  $precio += $pliegos * 0.08;
  }else if($pliegos < 1250){
	  $precio += $pliegos * 0.06;
  }else if($pliegos < 1875){
	  $precio += $pliegos * 0.04;
  }else if($pliegos < 2500){
	  $precio += $pliegos * 0.032;
  }else{
	  $precio += $pliegos * 0.028;
  }

}else{
$precio = -1;	
}


//if($costhoja == SRA3VERJ){
//	$precio += $pliegos * 1;
//}
echo "<br />PVP: "; echo round($precio ,2); echo "€<br />";
}
?>

</p>