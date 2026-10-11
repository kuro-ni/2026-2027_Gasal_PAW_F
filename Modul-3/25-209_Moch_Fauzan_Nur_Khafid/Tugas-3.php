<?php
$height = array("Andy"=>"176","Barry"=>"165",
            "Charlie"=>"170", "Harry" => "165",
            "Ron" => "160", "Draco" => "169",
            "Harmonie" => "160", "Malfoy" => "170");

echo "Andy is " . $height['Andy'] ." cm tall.";

echo "Height = (";
foreach($height as $key => $value){
    echo '"'. $key .'"' . '=>' .'"' .$value.'"'.', '; 
}
echo ")";

$values = array_values($height);
?>