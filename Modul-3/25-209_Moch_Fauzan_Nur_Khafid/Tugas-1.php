<?php

// 1.1
echo "1.1 <br>";
$fruits = ["Avocado", "Bluebery", "Cherry"];
array_push($fruits, "Black sapote", "Blueberry", "Pineaple","Ope ope no mi", "Grape");
$indekter = count($fruits) - 1;
echo "fruits = (";

for($i = 0 ;$i < count($fruits) ; $i++){
    echo '"';
    
    if($i === $indekter ){
        echo "$fruits[$i]" .'"';
    }else{
        echo "$fruits[$i]" .'"' . ', ';
    }
}

echo ")";

echo " <br> Nilai dengan indeks tertinggi : $fruits[$indekter] <br><br>";

// 1.2
echo "1.2 <br>";
$hapus_buah = "Avocado";
$inhapus = array_search($hapus_buah,$fruits);

if ($inhapus !== false){
    unset($fruits[$inhapus]);
    $fruits = array_values($fruits);
}

$indekter = count($fruits) -1;

echo "Data $hapus_buah dihapus";
echo '<br>fruits = (';

for ($i = 0; $i < count($fruits); $i++) {
    if ($i > 0) {
        echo ', ';
    }

    echo '"' . $fruits[$i] . '"';
}

echo ')';
echo "<br>Nilai dengan indeks tertinggi: " . $fruits[$indekter];


?>