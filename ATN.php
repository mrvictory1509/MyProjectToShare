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
		<div class="navb">
			<ul>
				<?php
		          include 'ConnectorSQL.php';
		            $querycategory = "SELECT categoryid, categoryname FROM category";
		            $total = pg_query($connection,$querycategory);
		            if (pg_num_rows($total) > 0) {
		            // output data of each row
		            while($rowcategory = pg_fetch_assoc($total)) {
		              $id_categorydb = $rowcategory['categoryid'];
		              $name_category = $rowcategory['categoryname'];
		          ?>
		         <li><a href="ATNdetail.php?categoryid=<?= $categoryid; ?>"><?= $name_category; ?></a></li>
		       <?php }} ?>
			</ul>
		</div>
		
		<div >
			<div class="Mathang">Mặt Hàng Nổi Bật: </div>
			<br>



		<?php

		     include 'ConnectorSQL.php';

		    $queryfirst = "SELECT * from product order by product desc fetch first 9 rows only";
		    $resultfirst = pg_query($connection,$queryfirst);
		    if (pg_num_rows($resultfirst) > 0) {
		      // output data of each row
		      while($rowfirst = pg_fetch_assoc($resultfirst)) {

		            $productid = $rowfirst['productid'];
		            $productname = $rowfirst['productname'];
		            $unitprice = $rowfirst['unitprice'];
		            $images = $rowfirst['images'];
		            $manufacturer = $rowfirst['manufacturer'];
		            $stock = $rowfirst['stock'];
		            ?>

				<div class="item">
					<a href="Thongtinsanpham.php?productid=<?= $productid;  ?>"><div class="iimage"><img src="<?= $images; ?>" alt="">
					</div></a>
					<div class="Thongtin">	Tên Sản Phẩm: <?= $productname; ?> <br> <br>
											Nhà sản Xuất: <?= $manufacturer; ?>  <br> <br>
											Giá Sản Phẩm: <?=$unitprice; ?> vnđ <br> <br>
											Số lượng sản phẩm:<?= $stock; ?>
					</div>
				</div>
				<?php
			}}
			?>
		</div>
	</div>		
	<div class="footer">
		<table  cellspacing="0" cellpadding="10" width= 100% align="center" >
			<tr >
			<th style="font-size: 17px; color:#FFFFFF"  >ATN_KÊNH MUA SẮM & DỊCH VỤ TRỰC TUYẾN HÀNG ĐẦU VIỆT NAM!</th>
			<th  rowspan="2" style=" color:#FFFFFF" > CÔNG TY TNHH ATN <br>
 													Giấy CNĐKDN: 289037490 – Ngày cấp: 06/5/2005, được sửa đổi lần thứ 17 ngày 24/7/2017. <br>
 													Cơ quan cấp: Phòng Đăng ký kinh doanh – Sở kế hoạch và Đầu tư hà Nội. <br>
 													Địa chỉ đăng ký kinh doanh: Tầng 71, Tòa Nhà Keangnam, E6, Phạm Hùng, Phường Mễ Trì, Quận Nam Từ Liêm, Hà Nội, Việt Nam <br>  <br><br>  @ATN 2019
 			</th>
			</tr>
			<tr >
				<td ><div align="center" style="padding-top:0%, width= 20px; color:#FFFFFF" >	
				</style>Mua hàng trực tuyến (mua hàng online) mang lại sự tiện lợi, lựa chọn đa dạng hơn và các dịch vụ tốt hơn cho người tiêu dùng, thế nhưng người tiêu dùng Việt Nam vẫn chưa tận hưởng được những tiện ích đó. Chính vì vậy ATN Việt Nam được triển khai với mong muốn trở thành trung tâm mua sắm trực tuyến số 1 tại Việt Nam, nơi bạn có thể chọn lựa mọi thứ để chăm sóc thứ đồ chơi bạn yêu thích.... Chúng tôi có tất cả!</div></td>	
			</tr>
		</table>
	</div>
</body>
</html>

