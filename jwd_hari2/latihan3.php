<?php

$nilai = 85;

if ($nilai > 80){
    echo "Benar";
}

//
echo "<p></p>";

if ($nilai > 90){
    echo "Salah";
} else {
    echo "Benar";
}

echo "<p></p>";

if ($nilai >= 85 and $nilai <= 100){
    echo "A";
} elseif ($nilai >= 75 and $nilai <= 84){
    echo "B";
} elseif ($nilai >= 65 and $nilai <= 74){
    echo "C";
} elseif ($nilai >= 55 and $nilai <= 64){
    echo "D";
} else {
    echo "E";
}