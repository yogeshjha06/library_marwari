<?php
include 'db.php';
$reg=$_GET['q'];

$sql="SELECT * FROM `student_details` WHERE `reg_id`='$reg'";
$result=mysqli_query($con,$sql);

$rs1x = mysqli_fetch_array($result);
if($rs1x)
{
    $name_student=$rs1x['name'];//name of student
    $exam_roll=$rs1x['exam_id'];//exam roll of student
    $department=$rs1x['department'];//department of student
    $class_roll=$rs1x['class_roll'];//class roll of student

    echo"     
    
    <div class='col-md-12'>
    <label for='name' class='form-label'>Student Name</label>
    <input name='name' type='text' class='form-control' id='name' value='$name_student' autocomplete='off' readonly required/>
  </div>
  
  <!-- exam roll number -->
  <div class='col-md-12'>
    <label for='exam_id' class='form-label'>Exam Roll No</label>
    <input name='exam_id' type='text' class='form-control' id='exam_id' value='$exam_roll' autocomplete='off' readonly required/>
  </div>

  <!-- class roll number -->
  <div class='col-md-12'>
    <label for='class_roll' class='form-label'>Class Roll</label>
    <input name='class_roll' type='number'  class='form-control' id='class_roll' value='$class_roll' autocomplete='off' readonly required/>
  </div>
  <!-- department -->
  <div class='col-md-12'>
    <label for='department' class='form-label'>department</label>
    <input name='department' type='text' class='form-control' id='department' value='$department' autocomplete='off' readonly required/>
  </div>
  

    ";
}
?>



