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
				<li><a href="https://thangnd.herokuapp.com/ATN.php">Back to the customer interface</a></li>
			</ul>
		</div>
		<div class="banner">
		 		<div class="Home">
		 			<p>Admin interface</p>
					<a href="https://thangnd.herokuapp.com/ATN.php">ATN Shop</a>
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
		       <?php }} ?>
			</ul>
		</div>

		<div class="sanphamchitiet">

		<?php
		include 'ConnectorSQL.php';
		$productid =$_GET['productid'];
        $queryproduct = "SELECT productid, productname, unitprice, images FROM product WHERE productid = '$productid'";
        $result = pg_query($connection,$queryproduct);

            if (pg_num_rows($result) > 0) {
            while($rowproduct = pg_fetch_assoc($result)) {
              $productid = $rowproduct['productid'];
              $productname = $rowproduct['productname'];
              $images = $rowproduct['images'];
        ?>
				<form action="">
				<div class="Chitietsanpham1">
					<div class="anh"><img src="<?= $images; ?>" alt="">
					</div>
					<div class="chitiet">	<br>ProductName: <?= $productname; ?> <br> <br>
											<hr> <br>
											Price: <?= $unitprice; ?> vnđ <br> <br>
											Number of products you want to buy: <input type="number" style="width: 100px;"> <br> <br> <br>
											<a href=""><input type="button" value="Buy now" style=" background-color: #FF7302; text-decoration-color: #FFFFFF; width:40%; height: 30px; margin: 20px" ></a>
											<a href=""><input type="button" value="Add to cart" style=" background-color: #FF7302; text-decoration-color: #FFFFFF; width:40%; height: 30px; margin: 15px" ></a>
					</div>
				</div>
				</form>
				<?php
			}
			}
			?>	
		</div>
	</div>	
	<div class="footer">
		<table  cellspacing="0" cellpadding="10" width= 100% align="center" >
			<tr >
			<th style="font-size: 17px" >ANT_ TOP CHANNELS TO SHOP ONLINE!!!</th>
			<th  rowspan="2" >ATN CO., LTD<br>
 													 Business registration certificate: 245638792 - Date of issue: Oct 10, 2015, amended for the 9th time on Mar 15, 2019. <br>
 													Issuing agency: Business Registration Office - Hanoi Department of Planning and Investment. <br>
 													Registered business address: 2nd Floor, 152 Nguyen Dinh Hoan, Cau Giay, Hanoi, Vietnam <br>  <br><br>    @ATN 2019
 			</th>
			</tr>
			<tr >
				<td ><div align="center" style="padding-top:0%, width= 20px" >	
				</style>Buying goods online brings convenience, more diverse options and better services to consumers. That's why ATN Vietnam was launched with the desire to become the number 1 online shopping center in Vietnam, where you can choose everything to take care of your favorite toys .... All there in us!</div></td>		
			</tr>
		</table>
	</div>
</body>
</html>

