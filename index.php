<!DOCTYPE html>
<html>
<head>
	<title>Home page</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="stylee.css">

</head>
<body>
	<div class="header">
			<div class="nava">
			<ul>
				<li><a href="https://thangnd.herokuapp.com/ATN.php">Home</a></li>
				<li><a href="">Log in</a></li>
				<li><a href="https://thangnd.herokuapp.com/admin.php">Admin</a></li>
			</ul>
			</div>
		 	<div class="banner">
		 		<div class="Home">
					<a href="https://thangnd.herokuapp.com/ATN.php">ATN Shop</a>
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
		            while($rowcategory = pg_fetch_assoc($total)) {
		              $categoryid = $rowcategory['categoryid'];
		              $categoryname = $rowcategory['categoryname'];
		          ?>   
		       <?php }} ?>
			</ul>
		</div>
		<div >
		<?php
		     include 'ConnectorSQL.php';
		    $queryfirst = "SELECT * from product order by product desc fetch first 9 rows only";
		    $resultfirst = pg_query($connection,$queryfirst);
		    if (pg_num_rows($resultfirst) > 0) {
		      while($rowfirst = pg_fetch_assoc($resultfirst)) {

		            $productid = $rowfirst['productid'];
		            $productname = $rowfirst['productname'];
		            $unitprice = $rowfirst['unitprice'];
		            $images = $rowfirst['images'];	
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

