<?php
echo "3.1 <br>";
$height = array("Andy"=>"176","Barry"=>"165",
            "Charlie"=>"170");

$height['Harry']    = "165";
$height['Ron']      = "160";
$height['Draco']    = "169";
$height['Harmonie'] = "160";
$height['Malfoy']   = "170";


echo "Height = (";
$i = 0;
foreach($height as $key => $value){
    echo '"'. $key .'"' . '=>' .'"' .$value.'"'; 
    if($i < count($height)-1){
        echo ", ";
    }
    $i++;
}
echo ") <br>";

$values = array_values($height);
$last = $values[count($height)-1];
echo "Nilai dengan indeks terkahir : $last <br><br>";

unset($height['Draco']);

echo "height = (";
$i = 0;
foreach ($height as $key => $value) {
    echo '"' . $key . '"=>"' . $value . '"';
    if ($i < count($height) - 1) {
        echo ", ";
    }
    $i++;
}
echo ")<br>";

$values = array_values($height);
$last = $values[count($height) -1 ];
echo "Nilai dengan indeks terkahir setelah dihapus : $last <br><br>";


echo "3.2 <br>";
$weight = ["Andy" => "70",
            "Barry" => "65",
            "Charlie" => "75",
            ];

$i = 0;
echo "Weight = (";
foreach ($weight as $key => $value) {
    echo '"' . $key . '"=>"' . $value . '"';
    if ($i < count($weight) - 1) {
        echo ", ";
    }
    $i++;
}
echo ")<br>";

$valuesWeight = array_values($weight);
echo "Data kedua: " . $valuesWeight[1];
?>