<!DOCTYPE html>
<html>
<head>
	<title>Home page</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class="header">
			<div class="nava">
			<ul>
				<li><a href="https://designweb.herokuapp.com/ATN.php">Trang chủ</a></li>
				<li><a href="">Kiểm tra đơn hàng</a></li>
				<li><a href="">Đăng nhập</a></li>
				<li><a href="https://designweb.herokuapp.com/Dangkykh.php">đăng ký</a></li>
				<li><a href="https://designweb.herokuapp.com/admin.php">Admin</a></li>
			</ul>
			</div>
		 	<div class="banner">
		 		<div class="Home">
					<a href="https://designweb.herokuapp.com/ATN.php">ATN Shop</a>
				</div>
				<div class="Search">
					<div class="Search1">
						<form class="example" action="Search.php" method="get">
		  				<input type="text" placeholder="Search.." name="search">
		  				<button type="submit"><i class="fa fa-search"></i></button>
						</form>
					</div>
				</div>
		 	</div>
	</div>
	<div class="main">
		<div >
			<div >
				<table align="center" cellspacing="0" cellpadding="0" width="50%">
					<tr>
						<td><h1>Tạo tài khoản ATN Shop</h1></td>
						<td style="padding-left: 200px">Bạn đã là thành viên?<a href="https://designweb.herokuapp.com/Dangnhap.php">Đăng Nhập</a> tại đây</td>
					</tr>
				</table>
			</div>
			<?php 
					//Lấy dữ liệu gửi lên
					$custid = $_POST['custid'];
					// insert dữ liệu
					$fullname = $_POST['fullname'];	
					$address = $_POST['address'];
					$postalcode = $_POST['postalcode'];
					$city = $_POST['city'];
					$country = $_POST['country'];
					$phone = $_POST['phone'];
					$fax = $_POST['fax'];
					$tendangnhap = $_POST['tendangnhap'];
					$password = $_POST['password'];
					$sql = "INSERT INTO customers(custid, fullname,  address, postalcode, city, country, phone, fax, tendangnhap, password)  VALUES ('$custid','$fullname','$address', '$postalcode',   '$city', '$country', '$phone', '$fax', '$tendangnhap','$password')";
					$sql1 ="SELECT * FROM customers WHERE custid =".$_POST['custid'];
					include 'ConnectorSQL.php';
					$row = pg_query($connection, $sql);
					if ($row) {
						$message = "Đã Thêm thông tin khách hàng";
					echo "<script type='text/javascript'>alert('$message');</script>";
					}
					
					
			 ?>
			<div  class="dangky2" >
				<form action="" method="POST">
					
	 				<table  cellspacing="40" cellpadding="0" >
	 					<tr>
	 						<td>ID khách hàng <SPAN style="color: red">*</SPAN></td>
	 						<th colspan=""><input type="text" name="custid"required></th>
	 						<th></th>
	 						<td>Tên đăng nhập <SPAN style="color: red">*</SPAN></td> 
	 						<th><input type="text" name="tendangnhap"required></th>

	 					</tr>
	 					<tr>
	 						<td>Họ Tên <SPAN style="color: red">*</SPAN></td>
	 						<th><input type="text" name="fullname"required></th>
	 						<th></th>
	 						<td>Mật khẩu <SPAN style="color: red">*</SPAN></td>
	 						<th><input type="text" name="password"required></th>
	 					</tr>

	 					<tr>
	 						<td>Địa Chỉ <SPAN style="color: red">*</SPAN></td>
	 						<th><input type="text" name="address"required></th>
	 						<th></th>
	 						<td>Quốc gia <SPAN style="color: red">*</SPAN></td>
	 						<th><input type="text" name="country"required></th>
	 					</tr>
	 					<tr>
	 						<td>Thành Phố <SPAN style="color: red">*</SPAN></td>
	 						<th><input type="text" name="city"required></th>
	 						<th></th>
	 						<td>Fax</td>
	 						<th><input type="text" name="fax"></th>
	 					</tr>
	 					<tr>
	 						<td>Số điện thoại <SPAN style="color: red">*</SPAN></td>
	 						<th><input type="text" name="phone"required></th>
	 						<th></th>
	 						<td>Mã Bưu Điện </td>
	 						<th><input type="text" name="postalcode"></th>
	 					</tr>
	 					<tr><td colspan="5" > Vui lòng điền tất cả các thông tin sản phẩm chứa dấu (<SPAN style="color: red">*</SPAN>)</td></tr>
	 					<tr>
	 						<th colspan="5" > <input type="submit" value="Đăng Ký" style=" background-color: #FF7302; text-decoration-color: #FFFFFF; width:25%; height: 30px" ></th>
	 					</tr>
	 				</table>
	 				</form>
			</div>
		</div>
	</div>	
	<div class="footer">
		<table  cellspacing="0" cellpadding="10" width= 100% align="center" >
			<tr >
			<th style="font-size: 17px" >ATN_KÊNH MUA SẮM & DỊCH VỤ TRỰC TUYẾN HÀNG ĐẦU VIỆT NAM!</th>
			<th  rowspan="2" > CÔNG TY TNHH ATN <br>
 													Giấy CNĐKDN: 289037490 – Ngày cấp: 06/5/2005, được sửa đổi lần thứ 17 ngày 24/7/2017. <br>
 													Cơ quan cấp: Phòng Đăng ký kinh doanh – Sở kế hoạch và Đầu tư hà Nội. <br>
 													Địa chỉ đăng ký kinh doanh: Tầng 71, Tòa Nhà Keangnam, E6, Phạm Hùng, Phường Mễ Trì, Quận Nam Từ Liêm, Hà Nội, Việt Nam <br>  <br><br>    @ATN 2019
 			</th>
			</tr>
			<tr >
				<td ><div align="center" style="padding-top:0%, width= 20px" >
					
				</style>Mua hàng trực tuyến (mua hàng online) mang lại sự tiện lợi, lựa chọn đa dạng hơn và các dịch vụ tốt hơn cho người tiêu dùng, thế nhưng người tiêu dùng Việt Nam vẫn chưa tận hưởng được những tiện ích đó. Chính vì vậy ATN Việt Nam được triển khai với mong muốn trở thành trung tâm mua sắm trực tuyến số 1 tại Việt Nam, nơi bạn có thể chọn lựa mọi thứ để chăm sóc thứ đồ chơi bạn yêu thích.... Chúng tôi có tất cả!</div></td>
				
			</tr>
		</table>
	</div>
</form>
</body>
</html>

