<?php
/*
Sabe-se que por trás de cada cometa há um OVNI. Esses OVNIs frequentemente buscam bons desenvolvedores aqui na Terra. Infelizmente só têm espaço para levar um grupo de devs por vez. Para a seleção, há um engenhoso esquema, da associação do nome do cometa ao nome do grupo, que possibilita a cada grupo saber se será levado ou não.
Os dois nomes, do grupo e do cometa, são convertidos em um número que representa o produto das letras do nome, onde "A" é 1 e "Z" é 26. Assim, o grupo "LARANJA" seria 12 * 1* 18 * 1 * 14 * 10 * 1 = 30240. Se o resto da divisão do número do grupo por 45 for igual ao resto da divisão do número do cometa por 45, então o grupo será levado.
Para os cometas e grupos abaixo, qual grupo NÃO será levado?

COMETA		GRUPO
------------------------
HALLEY		AMARELO
ENCKE		VERMELHO
WOLF		PRETO
KUSHIDA		AZUL
*/

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
