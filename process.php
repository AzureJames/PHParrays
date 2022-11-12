<?php

if(isset($input) && $input !== "#"){

    $input = explode(",", $input);
    //print_r($input);

    for($i = 0; $i < sizeof($input) / 2 -1; $i++){
        $tempArr = array($input[$i*2] => $input[$i*2+1]); 
        $studentAndGrade = array_merge($studentAndGrade, $tempArr);
    }
}

if(isset($student) && isset($grade)){ 
    $tempArr = array($student => $grade); 
    $studentAndGrade = array_merge($studentAndGrade, $tempArr);
}  //push student&grade


function radix_sort($elements) {
    // Array for 10 queues.
    $queues = array(
      array(), array(), array(), array(), array(), array(), array(), array(),
      array(), array()
    );
    // Queues are allocated dynamically. In first iteration longest digits
    // element also determined.
    $longest = 0;
    foreach ($elements as $key => $el) {
      if ($el > $longest) {
        $longest = $el;
      }
      array_push($queues[$el % 10], $el); //put value in corresponding final digit queue
    }
    // Queues are dequeued back into original elements.
    $i = 0;
    foreach ($queues as $key => $q) {
      while (!empty($queues[$key])) {
        $elements[$i++] = array_shift($queues[$key]);
      }
    }
    // Remaining iterations are determined based on longest digits element.
    $it = strlen($longest) - 1;
    $d = 10;
    while ($it--) {
      foreach ($elements as  $key => $el) {
        array_push($queues[floor($el/$d) % 10], $el);
      }
      $i = 0;
      foreach ($queues as $key => $q) {
        while (!empty($queues[$key])) {
          $elements[$i++] = array_shift($queues[$key]);
        }
      }
      $d *= 10;
    }
    return $elements;
  }


function displayArray($array) {
    foreach($array as $key => $value){
        echo "<p>name: $key grade: $value</p>";
    }
}

function displayArrayVal($array) {
    foreach($array as $key => $value){
        echo "<p>grade: $value</p>";
    }
}

function displayArrayAscii($array) {
    echo "<table>";
    foreach($array as $key => $value){
        // echo $value;
        $rpt = "";
        for($w = 0; $w < ($value/2); $w++){ $rpt .= "#";} 
        echo "<tr>";
        echo "<td>$key</td>";
        echo "<td>$rpt</td>";
        echo "</tr>";
    }
    echo "</table>";
}

echo "<h1>PHP Arrays</h1>";
echo "<h2>Original data:</h2>";
displayArray($studentAndGrade);

echo "<h2>ASCII DISPLAY OF GRADES</h2>";
// echo "<p>####################################################</p>";
echo "<p>STUDENT___________F______________D_____C_____B_____A_______</p>";
displayArrayAscii($studentAndGrade);


//Make basic array from assoc array
$z = 0;
foreach($studentAndGrade as $key => $value){
    $tempArray[$z] = $value;
    $z++;
}

$elements = radix_sort($tempArray);
echo "<h2>before sorting ascending with radix sort:</h2>";
displayArrayVal($tempArray);



echo "<h2>Sorted ascending with radix sort:</h2>";
displayArrayVal($elements);

echo "<p>STUDENT___________F______________D_____C_____B_____A_______</p>";
displayArrayAscii($elements);

//by grade high to low
echo "<h2>Sorted descending:</h2>";
//elements backwards


for ( $o = (sizeof($elements)-1); $o >= 0; $o-- ){
    echo $elements[$o] . " "; 
}

ksort($studentAndGrade, 2);
echo "<h2>Sorted by name ascending: </h2>";
echo displayArray($studentAndGrade);


krsort($studentAndGrade, 2);
echo "<h2>Sorted by name descending: </h2>";
echo displayArray($studentAndGrade);


echo "<h2>Minimum grade: </h2>" . min($studentAndGrade);
echo "<h2>Maximum grade: </h2>" . max($studentAndGrade);

//MEAN, MEDIAN, AND MODE GRADES

$sum = $temp = $cnt = $mode = $largest = 0;
foreach($studentAndGrade as $key => $value){
    $sum += $value;
    $temp = array_count_values($studentAndGrade);
    //print_r($temp);
    $cnt = $temp[$value];
    if ($cnt > $largest){ $mode =  "#$cnt " . $value; $largest = $cnt;}
}




$mean = $sum / sizeof($studentAndGrade);
$mean = round($mean,2);
$median = $elements[sizeof($elements)/2];


echo "<h2>Mean, Median, and Mode of data: </h2>";
echo "<p>Mean: $mean Median: $median Mode: $mode</p>";
?>

