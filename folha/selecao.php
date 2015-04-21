<?php
$cometaCores = [
	"halley" => "amarelo",
	"encke" => "vermelho",
	"wolf" => "preto",
	"kushida" => "azul"
];

function assocNames($cometaCores) {
	$wordNums = range('a', 'z');

	foreach($cometaCores as $cometas => $cores) {
		$prodCometas = 1;
		$prodCores = 1;
		for($i = 0; $i < strlen($cometas); $i++) {
			$prodCometas *= array_search($cometas[$i], $wordNums) + 1;
		}
		for($i = 0; $i < strlen($cores); $i++) {
			$prodCores *= array_search($cores[$i], $wordNums) + 1;
		}
		echo $cometas . " => " . $cores . ": " . ($prodCometas % 45 == $prodCores % 45 ? "Será levado\n" : "Não será levado\n");
	}
}

assocNames($cometaCores);
?>