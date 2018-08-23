<?php 
//biến kết nối toàn cục
global $conn;

//hàm kết nối database
public function connect_db()
{
	//gọi tới biến toàn cục $conn
	global $conn;

	if (!$conn) {
		$conn = mysqli_connect('localhost', 'root', 'vertrigo', 'qlsv') or die('Can\'t connect to database');
		//thiết lập font kết nối
		mysqli_set_charset($conn, 'utf8');
	}
}

//hàm ngắt kết nối database
public function disconnect_db()
{
	global $conn;

	if ($conn){
		mysql_close($conn);
	}
}

//hàm lấy tất cả sinh viên
public function get_all_students()
{
	global $conn;
	connect_db();

	$sql = "Select * from tb_sinhvien";
	$query = mysqli_query($conn, $sql);
	$result = array();

	//lặp qua từng record và đưa vào $result
	if ($query) {
		while ($row = mysqli_fetch_assoc($query)) {
		    $result[] = $row;
		}
	}
	disconnect_db();
	return $result;
}

public function  get_student($sv_id)
{
	global $conn;
	connect_db();

	$sql = "Select * from tb_sinhvien where sv_id = {$sv_id}";
	$query = mysqli_query($conn, $query);
	$result = array();
	if (mysqli_num_rows($query)>0) {
		$row = mysqli_fetch_assoc($query);
		$result = $row;
	}

	disconnect_db();
	return $result;
}

public function add_student($student_name, $student_sex, $studen_birthday)
{
	global $conn;
	connect_db();

	$sql = "Insert into tb_sinhvien (sv_name, sv_sex, sv_birthday) values ('{$student_name}', '{$student_sex}', '{$studen_birthday}')";
	$query = mysqli_query($conn, $sql);

	disconnect_db();
	return $query;
}

public function edit_student($student_id, $student_name, $student_sex, $studen_birthday)
{
	global $conn;
	connect_db();

	$sql = "Update tb_sinhvien set
		sv_name = '{$student_name}',
		sv_sex = '{$student_sex}',
		sv_birthday = '{$student_birthday}'
		where sv_id = '{$student_id}'
		";
	$query = mysqli_query($conn, $sql);

	disconnect_db();
	return $query;
}

public function delete_student($student_id)
{
	global $conn;
	connect_db();

	$sql = "Delete from tb_sinhvien where sv_id='{$student_id}'";
	$query = mysqli_query($conn, $query);

	disconnect_db();
	return $query;
}

?>