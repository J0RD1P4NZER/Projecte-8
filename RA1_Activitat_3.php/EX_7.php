<?php
function calcularIVA($preu, $percentatgeIVA) {
    return $preu + ($preu * $percentatgeIVA / 100);
}

echo "Preu amb IVA: " . calcularIVA(100, 21) . "€";
?>

