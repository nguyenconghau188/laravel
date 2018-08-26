<?php 
	require 'libs/students.php';

	$sv_id = isset($_GET['id']) ? (int)$_GET['id'] : '';
	//$data = array();
	if (isset($_GET['id'])){
		$data = get_student($sv_id);
	}
	if (!$data) {
		header("location: student-list.php");
	}
	$errors = array();
	if (!empty($_POST['student-edit'])) {
		$data['sv_name'] = isset($_POST['sv_name']) ? $_POST['sv_name'] : '';
		$data['sv_sex'] = isset($_POST['sv_sex']) ? $_POST['sv_sex'] : '';
		$data['sv_birthday'] = isset($_POST['sv_birthday']) ? $_POST['sv_birthday'] : '';
		$data['sv_id'] = $sv_id;
		echo 'ten'.$data['sv_name'];
		echo 'sex'.$data['sv_sex'];
		echo 'birthday'.$data['sv_birthday'];

		if (empty($data['sv_name'])) {
			$errors['sv_name'] = 'Bạn chưa nhập tên'; 	
		} 
		if (empty($data['sv_sex'])) {
			$errors['sv_sex'] = 'Bạn chưa nhập giới tính'; 	
		} 
		if (empty($data['sv_birthday'])) {
			$errors['sv_birthday'] = 'Bạn chưa nhập ngày sinh'; 	
		} 

		
		if (!$errors) {
			edit_student($data['sv_id'], $data['sv_name'], $data['sv_sex'], $data['sv_birthday']);
			disconnect_db();
			header("location: student-list.php");
		}
	}
	

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Sửa thông tin sinh viên</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<h1>SỬA THÔNG TIN SINH VIÊN</h1>
	<a href="student-list.php">Trở về</a>
	<form action="student-edit.php?id=<?php echo $sv_id?>" method="post" accept-charset="utf-8">
		<table width="50%" border="1" cellpadding="10" cellspacing="0">
			<tr>
				<td>Name</td>
				<td>
					<input type="text" name="sv_name" value="<?php echo $data['sv_name']; ?>">
					<?php 
						if (!empty($errors['sv_name'])) {
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
						<option value="Nữ" <?php if($data['sv_sex'] == 'Nữ') echo 'selected';  ?>>Nữ</option>}
					</select>
					<?php 
						if(!empty($errors['sv_sex'])) echo $errors['sv_sex'];
					 ?>
				</td>
			</tr>
			<tr>
				<td>Birthday</td>
				<td>
					<input type="text" name="sv_birthday" value="<?php echo $data['sv_birthday'];?>">
					<?php
						if(!empty($errors['sv_birthday'])) echo $errors['sv_birthday'];
					?>
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
						<input type="submit" name="student-edit" value="Lưu">	
				</td>
			</tr>
		</table>
	</form>
</body>
</html>