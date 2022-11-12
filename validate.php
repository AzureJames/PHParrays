<?php 
$formGood = true;
if(isset($student) && isset($grade)){
    $student = htmlspecialchars($student);
    $grade = htmlspecialchars($grade);
    if( is_numeric($student) === true || is_numeric($grade) === false ){
        echo "Grade must be number and student must be a word";
        $formGood = false;
    }
    if($grade > 100 || $grade < 0){ echo "Grade must be between 0 and 100"; $formGood = false; }
    if(strlen($student) < 3 || strlen($student) > 40){ echo "Student name incorrect length";  $formGood = false;}
}
?>