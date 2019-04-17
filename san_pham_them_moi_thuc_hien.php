<?php 
	
	// Lấy các dữ liệu bên trang Thêm mới bài viết
	$tensanpham = $_POST['txtTensanpham'];
	$giaban = $_POST['txtGiaban'];
	$mota = $_POST['txtMota'];

	// Upload hình ảnh
	$hinhanh = "images/" . basename($_FILES["txtAnhminhhoa"]["name"]);
	$fileanhtam = $_FILES["txtAnhminhhoa"]["tmp_name"];
	$result = move_uploaded_file($fileanhtam, $hinhanh);
	if(!$result) {
		$hinhanh=NULL;
	}

	// Chàn dữ liệu vào bảng tbl_tin_tuc
	// Bước 1: Kết nối đến CSDL 
	include("../config/dbconfig.php");
    $ketnoi = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
	// Bước 2: Chàn dữ liệu vào bảng Liên hệ
	$sql = "
	INSERT INTO `tbl_sanpham` (
		`san_pham_id`, 
		`ten_san_pham`,
		`gia_ban`, 
		`mo_ta`, 
		`hinh_anh`) 
	VALUES (
		NULL, 
		'".$tensanpham."',
		'".$giaban."',
		'".$mota."', 
		'".$hinhanh."')";
	
	// Xem câu lệnh SQL viết có đúng hay không?
	// echo $sql;

	// Cho thực thi câu lệnh SQL trên
	mysqli_query($ketnoi, $sql);
	echo '
		<script type="text/javascript">
			alert("Thêm mới sản phẩm thành công!!!");
			window.location.href="san_pham_quan_tri.php";
		</script>';
;?>