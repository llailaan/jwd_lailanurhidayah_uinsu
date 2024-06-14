<?php
 // index = posisi dalam array dimulai dari 0
$nama = array("Putra", "Laila", "Dewi");

$nilai = [90, 80, 85];

echo $nama[1];

echo "<p></p>";

foreach($nilai as $n){
    echo "Angka ".$n.",";
}