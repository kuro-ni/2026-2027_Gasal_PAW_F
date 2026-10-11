<?php
echo "2.1<br>";
$fruits = array("Avocado", "Blueberry", "Cherry");
$arrlength = count($fruits);

$buahbaru = ["Black sapote", "Blueberry", "Pineaple","Ope ope no mi", "Grape"];
for($i= 0 ; $i < 5; $i++){
    array_push($fruits,$buahbaru[$i] );
}

$arrlength = count($fruits);
echo "Panjang array saat ini : $arrlength <br><br>";

for ($x = 0; $x < $arrlength; $x++) {
    echo $fruits[$x] . "<br>";
}


echo "<br><br> 2.2<br>";
$veggies = ["Carrot", "Brocoli", "Spinach"];
for ($x = 0; $x < count($veggies); $x++) {
    echo $veggies[$x] . "<br>";
}

?>