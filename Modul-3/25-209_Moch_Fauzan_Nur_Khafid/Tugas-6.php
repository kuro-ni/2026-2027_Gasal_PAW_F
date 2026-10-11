<?php
echo "6.1 <br>";

// array_push
$a = ["A"];
echo 'Array awal: ("A")<br>';
array_push($a, "B");
echo "Hasil array_push: ";
foreach ($a as $v) {
    echo $v . " ";
}
echo "<br><br>";

// array_merge
$b = ["A", "B"];
$c = ["C"];
echo 'Array awal: ("A", "B") digabung dengan ("C")<br>';
$gabung = array_merge($b, $c);
echo "Hasil array_merge: ";
foreach ($gabung as $v) {
    echo $v . " ";
}
echo "<br><br>";

// array_values
$d = ["x" => 1, "y" => 2];
echo 'Array awal: ("x" => 1, "y" => 2)<br>';
$nilai = array_values($d);
echo "Hasil array_values: ";
foreach ($nilai as $v) {
    echo $v . " ";
}
echo "<br><br>";

// array_search
$e = ["A", "B", "C"];
echo 'Mencari "B" pada array: ("A", "B", "C")<br>';
echo "Hasil array_search: " . array_search("B", $e) . "<br><br>";

// array_filter
$f = [0, 1, false, 2, "", 3, "array"];
echo 'Array awal: (0, 1, false, 2, "", 3, "array")<br>';
$filter = array_filter($f);
echo "Hasil array_filter: ";
foreach ($filter as $v) {
    echo $v . " ";
}
echo "<br><br>";

// sort dan rsort
$g = [3, 1, 2];
echo "Array awal: (3, 1, 2)<br>";
sort($g);
echo "Hasil sort: ";
foreach ($g as $v) {
    echo $v . " ";
}
echo "<br>";
rsort($g);
echo "Hasil rsort: ";
foreach ($g as $v) {
    echo $v . " ";
}
echo "<br><br>";

// ksort, asort, arsort, krsort
$h = ["Peter" => 35, "Ben" => 37, "Joe" => 43];
echo 'Array awal: ("Peter"=>35, "Ben"=>37, "Joe"=>43)<br>';

asort($h);
echo "Hasil asort: ";
foreach ($h as $key => $value) {
    echo "$key=> $value, ";
}
echo "<br>";

ksort($h);
echo "Hasil ksort: ";
foreach ($h as $key => $value) {
    echo "$key=> $value, ";
}
echo "<br>";

arsort($h);
echo "Hasil arsort: ";
foreach ($h as $key => $value) {
    echo "$key=> $value, ";
}
echo "<br>";

krsort($h);
echo "Hasil krsort: ";
foreach ($h as $key => $value) {
    echo "$key=> $value, ";
}
?>