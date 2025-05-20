<?php
$alumnes = [
    "Jordi" => 20,
    "Clara" => 17,
    "Pere" => 18,
    "Maria" => 22,
    "Anna" => 16
];

foreach ($alumnes as $nom => $edat) {
    if ($edat >= 18) {
        echo "$nom té $edat anys i és major d’edat.\n";
    }
}
?>

