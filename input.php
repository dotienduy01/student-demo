<?php
require_once ('dbhelp.php');

$s_MA_SINHVIEN = $s_MA_KHOA = $s_HOTEN = $s_GIOITINH = $s_NAMSINH = $s_MALOP = '';

if (!empty($_POST)) {
	$s_id = '';

	if (isset($_POST['MA_SINHVIEN'])){
		$s_MA_SINHVIEN = $_POST['MA_SINHVIEN'];
	}

	if (isset($_POST['MA_KHOA'])){
		$s_MA_KHOA = $_POST['MA_KHOA'];
	}

	if (isset($_POST['HOTEN'])){
		$s_HOTEN = $_POST['HOTEN'];
	}
		
	if (isset($_POST['GIOITINH'])){
		$s_GIOITINH = $_POST['GIOITINH'];
	}

	if (isset($_POST['NAMSINH'])){
		$s_NAMSINH = $_POST['NAMSINH'];
	}

	if (isset($_POST['MALOP'])){
		$s_MALOP = $_POST['MALOP'];
	}

	if (isset($_POST['id'])) {
		$s_id = $_POST['id'];
	}




	$s_MA_SINHVIEN = str_replace('\'', '\\\'', $s_MA_SINHVIEN);
	$s_MA_KHOA = str_replace('\'', '\\\'', $s_MA_KHOA);
	$s_HOTEN = str_replace('\'', '\\\'', $s_HOTEN);
	$s_GIOITINH = str_replace('\'', '\\\'', $s_GIOITINH);
	$s_NAMSINH = str_replace('\'', '\\\'', $s_NAMSINH);
	$s_MALOP = str_replace('\'', '\\\'', $s_MALOP);
	$s_id       = str_replace('\'', '\\\'', $s_id);


	if ($s_id != '') {
		//update
		$sql = "update sinhvien set MA_SINHVIEN = '$s_MA_SINHVIEN', MA_KHOA = '$s_MA_KHOA', HOTEN = '$s_HOTEN', GIOITINH = '$s_GIOITINH', NAMSINH = '$s_NAMSINH', MALOP = '$s_MALOP' where id = " .$s_id;
	} else {
		//insert
		$sql = "insert into sinhvien (MA_SINHVIEN, MA_KHOA, HOTEN, GIOITINH, NAMSINH, MALOP) value ('$s_MA_SINHVIEN', '$s_MA_KHOA', '$s_HOTEN', '$s_GIOITINH', '$s_NAMSINH', '$s_MALOP')";
	}

	//echo $sql;

	execute($sql);

	header('Location: index02.php');
	die();
}

$id = '';
if (isset($_GET['id'])) {
	$id          = $_GET['id'];
	$sql         = 'select * from sinhvien where id = '.$id;
	$sinhvienList = executeResult($sql);
	if ($sinhvienList != null && count($sinhvienList) > 0) {
		$std        = $sinhvienList[0];
		$s_MA_SINHVIEN = $std['MA_SINHVIEN'];
		$s_MA_KHOA      = $std['MA_KHOA'];
		$s_HOTEN  = $std['HOTEN'];
		$s_GIOITINH = $std['GIOITINH'];
		$s_NAMSINH = $std['NAMSINH'];
		$s_MALOP   = $std['MALOP'];

	} else {
		$id = '';
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Nhập Thông Tin</h2>
			</div>
			<div class="panel-body">
				<form method="post">
					<div class="form-group">
					  <label for="idsv">Mã Sinh Viên:</label>
					  <input type="number" name="id" value="<?=$id?>" style="display: none;">
					  <input required="true" type="text" class="form-control" id="idsv" name="MA_SINHVIEN" value="<?=$s_MA_SINHVIEN?>">
					</div>

					<div class="form-group">
					  <label for="makhoa">Mã Khoa:</label>
					  <input type="text" class="form-control" id="makhoa" name="MA_KHOA" value="<?=$s_MA_KHOA?>">
					</div>
					
					<div class="form-group">
					  <label for="usr">Họ Tên:</label>
					  <input required="true" type="text" class="form-control" id="usr" name="HOTEN" value="<?=$s_HOTEN?>">
					</div>

					<div class="form-group">
					  <label for="gt">Giới Tính:</label>
					  <input type="text" class="form-control" id="gt" name="GIOITINH" value="<?=$s_GIOITINH?>">
					</div>

					<div class="form-group">
					  <label for="birthday">Năm Sinh:</label>
					  <input type="number" class="form-control" id="date" name="NAMSINH" value="<?=$s_NAMSINH?>">
					</div>

					<div class="form-group">
					  <label for="">Mã Lớp:</label>
					  <input type="text" class="form-control" id="" name="MALOP" value="<?=$s_MALOP?>">
					</div>


					<button class="btn btn-success">Save</button>
					<button class="btn btn-success">
					<a style="text-decoration: none; color:#fff" href="index.php" >Home</a>
					</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>