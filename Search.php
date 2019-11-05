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
		              $categoryid = $rowcategory['categoryid'];
		              $categoryname = $rowcategory['categoryname'];
		          ?>
		         <li><a href="ATNdetail.php?categoryid=<?= $categoryid; ?>"><?= $categoryname; ?></a></li>
		       <?php }} ?>
			</ul>
		</div>
		
		<div >

			<?php

       include 'ConnectorSQL.php';

       $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
       $perpage = isset($_GET['per-page']) && $_GET['per-page'] <= 16 ? (int)$_GET['per-page'] : 16;

       $start = ($page > 1) ? ($page * $perpage) - $perpage : 0;

       $queryproduct = "SELECT productid, productname, unitprice, images, stock, manufacturer FROM product WHERE productname LIKE '%{$_GET['search']}%' ORDER BY productid DESC LIMIT 5";
       $result = pg_query($connection,$queryproduct);

       //pages
        $total = pg_fetch_assoc(pg_query($connection,"SELECT COUNT(*) as total"))['total'];
        $pages = ceil($total / $perpage);

         if (pg_num_rows($result) > 0) {
         // output data of each row
         while($rowproduct = pg_fetch_assoc($result)) {
           $productid = $rowproduct['productid'];
           $productname = $rowproduct['productname'];
           $unitprice = $rowproduct['unitprice'];
           $images = $rowproduct['images'];
           $stock = $rowproduct['stock'];
           $manufacturer = $rowproduct['manufacturer'];

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

