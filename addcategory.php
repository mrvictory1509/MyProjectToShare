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
				<li><a href="https://designweb.herokuapp.com/ATN.php">Back to the customer interface</a></li>
			</ul>
		</div>
		<div class="banner">
		 		<div class="Home">
		 			<p>Admin interface</p>
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
				<h1>Add New Product</h1>
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
	 					<tr><td colspan="5" >Please enter all product information(<SPAN style="color: red">*</SPAN>)</td></tr>
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
			<th style="font-size: 17px" >ANT_ TOP CHANNELS TO SHOP ONLINE!!!</th>
			<th  rowspan="2" > ATN CO., LTD<br>
 													 Business registration certificate: 245638792 - Date of issue: Oct 10, 2015, amended for the 9th time on Mar 15, 2019. <br>
 													Issuing agency: Business Registration Office - Hanoi Department of Planning and Investment. <br>
 													Registered business address: 2nd Floor, 152 Nguyen Dinh Hoan, Cau Giay, Hanoi, Vietnam <br>  <br><br>     @ATN 2019
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