<?php 
require 'libs/students.php'
$students = get_all_students();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Danh sách sinh viên</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<h1>DANH SÁCH SINH VIÊN</h1>
	<a href="student-add.php">Thêm sinh viên</a><br>

	<table width="100%" border="1" cellspacing="0" cellpadding="10">
		<tr>
			<td>ID</td>
			<td>Name</td>
			<td>Gender</td>
			<td>Birthday</td>
			<td>Options</td>
		</tr>
		<?php 
			foreach ($students as $student) {
		?>
		<tr>
			<td><?php echo $student['sv_id']; ?></td>
			<td><?php echo $student['sv_name']; ?></td>
			<td><?php echo $student['sv_sex']; ?></td>
			<td><?php echo $student['sv_birthday']; ?></td>
			<td>
				<form action="student-delete.php" method="post" accept-charset="utf-8">
					<input onclick="window.location = 'student-edit.php?id=<?php echo $student['sv_id']; ?>'" type="button" name="edit" value="Sửa">
					<input onclick="return confirm('Bạn có chắc chắn muốn xóa không?');" type="submit" name="delete" value="Xóa">
				</form>
			</td>
		<?php } ?>
		</tr>
	</table>
</body>
</html>