<?php  
require 'libs/students.php';

if (!empty($_POST['student-add'])) {
	$data['sv_name'] = isset($_POST['sv_name']) ? $_POST['sv_name'] : '';
	$data['sv_sex'] = isset($_POST['sv_sex']) ? $_POST['sv_sex'] : '';
	$data['sv_birthday'] = isset($_POST['sv_birthday']) ? $_POST['sv_birthday'] : '';

	//validate
	$errors = array();
	if (empty($_POST['sv_name'])) {
		$errors['sv_name'] = 'Chưa nhập tên.';
	}
	if (empty($_POST['sv_sex'])) {
		$errors['sv_sex'] = 'Chưa nhập giới tính';
	}
	if (empty($_POST['sv_birthday'])) {
		$errors['sv_birthday'] = 'Chưa nhập ngày sinh';
	}

	if (!$errors) {
		add_student($data['sv_name'], $data['sv_sex'], $data['sv_birthday']);

		//trờ về trang danh sách
		header("location: student-list.php");
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Thêm sinh viên</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<h1>THÊM SINH VIÊN</h1>
	<a href="student-list.php" >Trở về</a>

	<form action="student-add.php" method="post" accept-charset="utf-8">
		<table width="50%" border="1" cellpadding="10" cellspacing="0">
			<tr>
				<td>Name</td>
				<td>
					<input type="text" name="sv_name" value="">
					<?php 
						if(!empty($errors['sv_name'])){
							echo '<br>';
							echo $errors['sv_name'];
						}
					?>
				</td>
			</tr>
			<tr>
				<td>Sex</td>
				<td>
					<select name="sv_sex">
						<option value="Nam">Nam</option>
						<option value="Nữ">Nữ</option>
					</select>
					<?php 
						if(!empty($errors['sv_sex'])){
							echo '<br>';
							echo $errors['sv_sex'];
						}
					?>
				</td>
			</tr>
			<tr>
				<td>Birthday</td>
				<td>
					<input type="text" name="sv_birthday" value="">
					<?php 
						if(!empty($errors['sv_birthday'])){
							echo '<br>';
							echo $errors['sv_birthday'];
						}
					?>
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="submit" name="student-add" value="Lưu">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>