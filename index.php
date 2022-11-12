<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrays</title>
    <script
			  src="https://code.jquery.com/jquery-3.6.1.min.js"
			  integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
			  crossorigin="anonymous"></script>
</head>
<body>
<h1>PHP Arrays</h1>
<form action="#" method="get" id="#arrayForm">
    <label for="student">Student</label>
    <input type="text" name="student" id="student">
    <label for="grade">Grade (number)</label>
    <input type="text" name="grade" id="grade">
    <input type="text" class="hidden" style="visibility: hidden;" name="input" 
    value="<?php echo isset($_GET['student']) && isset($_GET['grade']) && isset($_GET['input']) //IF STUDENT GRD INPUT ADD EM IN
    ? $_GET['input'] . $_GET['student'] . "," . $_GET['grade'] . ",": "";?>"id="input">
     
     <input type="submit" value="Add student">
</form>
<div id="results"></div>


<?php
//STYLE CALENDAR

if(!isset($studentAndGrade)){$studentAndGrade = [];}

if(isset($_GET['student']) && isset($_GET['grade'])){
    extract($_GET);
    include "validate.php"; }
isset($formGood) && $formGood === true ?
include "process.php" : "";
?>
</body>
</html>