<?php
echo "5.1<br>";
$students = [
    ["Alex", "220401", "0812345678"],
    ["Bianca", "220402", "0812345687"],
    ["Candice", "220403", "0812345665"]
];

echo "Data awal:<br>";
echo "students = (<br>";

for ($i = 0; $i < count($students); $i++) {
    echo '("' . $students[$i][0] . '", "' . $students[$i][1] . '", "' . $students[$i][2] . '")';
    if ($i < count($students) - 1) {
        echo ",";
    }
    echo "<br>";
}
echo ")<br><br>";

$students[] = ["Daniel", "220404", "0812345611"];
$students[] = ["Elena", "220405", "0812345622"];
$students[] = ["Fiona", "220406", "0812345633"];
$students[] = ["Gabe", "220407", "0812345644"];
$students[] = ["Hannah", "220408", "0812345655"];

echo "Data setelah ditambah 5 data lain:<br>";
echo "students = (<br>";
for ($i = 0; $i < count($students); $i++) {
    echo '("' . $students[$i][0] . '", "' . $students[$i][1] . '", "' . $students[$i][2] . '")';
    if ($i < count($students) - 1) {
        echo ",";
    }
    echo "<br>";
}
echo ")<br><br>";

echo "<table border='1'>";
echo "<tr><th>Name</th><th>NIM</th><th>Mobile</th></tr>";
for ($i = 0; $i < count($students); $i++) {
    echo "<tr>";
    for ($j = 0; $j < 3; $j++) {
        echo "<td>" . $students[$i][$j] . "</td>";
    }
    echo "</tr>";
}
echo "</table>";
?>