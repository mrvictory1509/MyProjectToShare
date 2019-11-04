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
			<br> <br>
			<div   style="width:60%; margin: auto;" >
				<h1>Thêm sản phẩm mới</h1>
			</div>
			<br> <br> <br>
				<?php 
					require_once('./ATNconnector.php');
					if(isset($_POST['Categoryid']))
					{
						$Categoryid = $_POST['Categoryid'];
						$Categoryname = $_POST['Categoryname'];
						$Description = $_POST['Description'];
						$sql = "INSERT INTO category(Categoryid, Categoryname, Description) VALUES (". (int)$Categoryid .",'". $Categoryname ."','". $Description ."')";
						$sql1 ="SELECT * FROM category WHERE Categoryid =".$_POST['Categoryid'];
						$conn = new ATNconnector();
						$row = $conn -> runQuery($sql1);
						if (count($row)>0) {
							$mess = "Error, ID existed";
							echo "<script type='text/javascript'>alert('$mess'); window.history.back();</script>";
							
						} else {
							$conn -> execStatement($sql);
							$message = "Category add";
							echo "<script type='text/javascript'>alert('$message');</script>";
						}
					}
					 ?>
			
			<div  style="width: 30%;margin: auto;background-color: #FFFFFF; overflow: hidden; ">
				<form action="admin.php" method="POST">
	 				<table  cellspacing="20" cellpadding="0" style="width: 100%; "  >
	 					<tr>
	 						<td>Categoryid <SPAN style="color: red">*</SPAN></td>
	 						<th><input type="text" name="Productid" required></th>
	 					</tr>
	 					<tr>
	 						<td>Categoryname <SPAN style="color: red">*</SPAN></td>
	 						<th><input type="text" name="Manufacturer" required></th>
	 					</tr>
	 					<tr>
	 						<td>Description <SPAN style="color: red">*</SPAN></td>
	 						<th><input type="text" name="Images" required></th>
	 					</tr>
	 					<tr></tr>
	 					<tr><td colspan="5" > Vui lòng điền tất cả các thông tin sản phẩm chứa dấu (<SPAN style="color: red">*</SPAN>)</td></tr>
	 					<tr></tr>
	 					<tr>
	 						<td > <input type="submit" value="Add" style=" background-color: #FF7302; text-decoration-color: #FFFFFF; width:50%; height: 30px" ></td>
	 						<th > <a href="https://designweb.herokuapp.com/admin.php"><input type="button" value="Trở lại" style=" background-color: #FF7302; text-decoration-color: #FFFFFF; width:30%; height: 30px"></a></th>
	 					</tr>

	 				</table>
	 				</form>
			</div>
		
		</div>
		<br> <br> <br> <br> <br> <br> <br> <br><br> 
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