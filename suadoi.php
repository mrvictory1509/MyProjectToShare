<!DOCTYPE html>
<html>
<head>
	<title>Sửa đổi thông tin sản phẩm</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class="header">
		<div class="nava">
			<ul>
				<li><a href="https://designweb.herokuapp.com/ATN.php">Trở về giao diện khách hàng</a></li>
			</ul>
		</div>
		<div class="banner">
		 		<div class="Home">
		 			<p>Giao diện dành riêng cho admin</p>
					<a href="https://designweb.herokuapp.com/ATN.php">ATN Shop</a>
				</div>
				<div class="Search">
					<div class="Search1">
						<form class="example" action="/action_page.php">
		  				<input type="text" placeholder="Search.." name="search">
		  				<button type="submit"><i class="fa fa-search"></i></button>
						</form>
					</div>
				</div>
		 </div>
	</div>
	<div class="main">
		<div >
			<div   style="width:60%; margin: auto;" >
				<h1>Sửa đổi thông tin sản phẩm</h1>
			</div>
			<div  class="dangky2">
				<?php 
					require_once('./ATNconnector.php');
					$conn = new ATNconnector();
					$sql = "Select * From product where Productid =".$_GET['id'];
					$rows = $conn->runQuery($sql);
				 ?>
				 <?php foreach ($rows as $key) { ?>
				 	<form action="admin.php" method="get">
	 				<table  cellspacing="40" cellpadding="0" >
	 					<tr>
	 						<td>ID sản phẩm <SPAN style="color: red">*</SPAN></td>
	 						<th><input type="text" name="Productid" value="<?php echo $key['Productid'] ?>" readonly></th>
	 						<th></th>
	 						<td>Tên sản phẩm <SPAN style="color: red">*</SPAN></td>
	 						<th><input type="text" name="Productname" value="<?php echo $key['Productname'] ?>"></th>
	 					</tr>
	 					<tr>
	 						<td>Nhà sản xuất <SPAN style="color: red">*</SPAN></td>
	 						<th><input type="text" name="Manufacturer" value="<?php echo $key['Manufacturer'] ?>"></th>
	 						<th></th>
	 						<td>Giá sản phẩm <SPAN style="color: red">*</SPAN></td>
	 						<th><input type="text" name="Unitprice" value="<?php echo $key['Unitprice'] ?>"></th>
	 					</tr>
	 					<tr>
	 						<td>Hình ảnh minh họa <SPAN style="color: red">*</SPAN></td>
	 						<th><input type="text" name="Images" value="<?php echo $key['Images'] ?>"></th>
	 						<th></th>
	 						<td>Số lượng sản phẩm còn lại trong kho <SPAN style="color: red">*</SPAN></td>
	 						<th><input type="text" name="Stock" value="<?php echo $key['Stock'] ?>"></th>
	 					</tr>
	 					<tr>
	 						<td>ID Loại sản phẩm <SPAN style="color: red">*</SPAN></td>
	 						<th><input type="text" name="Categoryid" value="<?php echo $key['Categoryid'] ?>"></th>
	 					</tr>
	 					<tr><td colspan="5" > Vui lòng điền tất cả các thông tin sản phẩm chứa dấu (<SPAN style="color: red">*</SPAN>)</td></tr>
	 					<tr>
	 						<th colspan="3" > <input type="submit" value="Sửa đổi" style=" background-color: #FF7302; text-decoration-color: #FFFFFF; width:25%; height: 30px"></th>
	 						<th colspan="2" > <a href="https://designweb.herokuapp.com/admin.php"><input type="button" value="Trở lại" style=" background-color: #FF7302; text-decoration-color: #FFFFFF; width:25%; height: 30px"></a></th>
	 					</tr>
	 				</table>
	 			</form>
				 <?php } ?>
				
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
 													Địa chỉ đăng ký kinh doanh: Tầng 71, Tòa Nhà Keangnam, E6, Phạm Hùng, Phường Mễ Trì, Quận Nam Từ Liêm, Hà Nội, Việt Nam <br>  <br><br>     @ATN 2019
 			</th>
			</tr>
			<tr >
				<td ><div align="center" style="padding-top:0%, width= 20px" >
					
				</style>Mua hàng trực tuyến (mua hàng online) mang lại sự tiện lợi, lựa chọn đa dạng hơn và các dịch vụ tốt hơn cho người tiêu dùng, thế nhưng người tiêu dùng Việt Nam vẫn chưa tận hưởng được những tiện ích đó. Chính vì vậy ATN Việt Nam được triển khai với mong muốn trở thành trung tâm mua sắm trực tuyến số 1 tại Việt Nam, nơi bạn có thể chọn lựa mọi thứ để chăm sóc thứ đồ chơi bạn yêu thích.... Chúng tôi có tất cả!</div></td>
				
			</tr>
		</table>
	</div>
</body>
</html>