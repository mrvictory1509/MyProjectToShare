<!DOCTYPE html>
<html>
<head>
	<title>Edit Information Product</title>
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
		<div >
			<div   style="width:60%; margin: auto;" >
				<h1>Add New Product</h1>
			</div>
				<?php 
					require_once('./ATNconnector.php');
					if(isset($_POST['Productid']))
					{
						$ID = $_POST['Productid'];
						$Images = $_POST['Images'];
						$Productname = $_POST['Productname'];
						$Unitprice = $_POST['Unitprice'];
						$Categoryid = $_POST['Categoryid'];
						$sql = "INSERT INTO product(Productid, Productname, Unitprice, Images,Categoryid) VALUES (". $ID .",'". $Productname ."',". $Unitprice .", '". $Images."',  ". $Categoryid ." )";
						$sql1 ="SELECT * FROM product WHERE Productid =".$_POST['Productid'];
						$conn = new ATNconnector();
						$row = $conn -> runQuery($sql1);
						if (count($row)>0) {
							$mess = "Error, ID existed";
							echo "<script type='text/javascript'>alert('$mess'); window.history.back();</script>";						
						} else {
							$conn -> execStatement($sql);
							$message = "Product add";
							echo "<script type='text/javascript'>alert('$message');</script>";
						}	
					}
					 ?>
			<div  class="Register2">
				<form action="admin.php" method="POST">
	 				<table  cellspacing="40" cellpadding="0" >
	 					<tr>
	 						<td>ProductId <SPAN style="color: red">*</SPAN></td>
	 						<th><input type="text" name="Productid" required></th>
	 						<th></th>
	 						<td>Product Name<SPAN style="color: red">*</SPAN></td>
	 						<th><input type="text" name="Productname" required></th>
	 					</tr>
	 					<tr>
	 						<td>Image<SPAN style="color: red">*</SPAN></td>
	 						<th><input type="text" name="Images" required></th>
	 						<th></th>
	 					</tr>
	 					<tr>
	 						<td>CategoryId <SPAN style="color: red">*</SPAN></td>
	 						<th><select name="Categoryid" >
								<?php 
									$conn = new ATNconnector();
									$sql = " select * from category";
									$rows = $conn->runQuery($sql);
									foreach($rows as $r)
									{
										?>
										<option value="<?=$r['Categoryid']?>"><?=$r['Categoryname']?></option>
										<?php  
									}
								?>
								</select>
	 						</th>
	 					</tr>
	 					<tr><td colspan="5" > Please enter all product information(<SPAN style="color: red">*</SPAN>)</td></tr>
	 					<tr>
	 						<th colspan="3" > <input type="submit" value="Add" style=" background-color: #FF7302; text-decoration-color: #FFFFFF; width:30%; height: 30px" ></th>
	 						<th colspan="2" > <a href="https://thangnd.herokuapp.com/admin.php"><input type="button" value="Back" style=" background-color: #FF7302; text-decoration-color: #FFFFFF; width:30%; height: 30px"></a></th>
	 					</tr>
	 				</table>
	 				</form>
			</div>
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