<?php 
require 'libs/students.php';

$id = isset($_POST['sv_id']) ? $_POST['sv_id'] : '';
if($id){
	delete_student($id);
}

header("location: student-list.php");
?>