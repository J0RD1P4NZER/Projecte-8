<?php
$notes = [7, 8, 6, 5, 9];
$mitjana = array_sum($notes) / count($notes);

echo "La nota mitjana és $mitjana.\n";

if ($mitjana >= 5) {
    echo "L’alumne està aprovat.";
} else {
    echo "L’alumne no està aprovat.";
}
?>

