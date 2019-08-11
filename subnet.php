<?php 

function ToByte($dec){ // Retorna um octeto
	$bits = decbin($dec);
	$byte = substr("00000000",0,8 - strlen($bits)) . $bits;
	return $byte;
}
function checkSubNet($addr,$net){

	$addr = explode(".", $addr);
	$net = explode(".", $net);

	$a = explode("/",$net[3]);
	$net[3] =  $a[0];
	$prefix =  $a[1];

	$addr = ToByte($addr[0]).ToByte($addr[1]).ToByte($addr[2]).ToByte($addr[3]);
	$net = ToByte($net[0]).ToByte($net[1]).ToByte($net[2]).ToByte($net[3]);

	$calc = $net & $addr;

	return (substr($net,0,$prefix) == substr($addr,0,$prefix)) ? true : false;
}

$ip = "192.168.0.1";
$subrede = "192.168.0.0/31";

if( checkSubNet($ip,$subrede) ){
	echo "[OK] O ip $ip pertence a subrede $subrede";
}else{
	echo "Não pertence a sub rede.";
}
?>

