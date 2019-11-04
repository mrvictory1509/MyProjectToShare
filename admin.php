<!DOCTYPE html>
<html>
<head>
	<title>admin</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script>
		function Deleteqry(id)
		{ 
		  if(confirm("Are you sure you want to delete this product?")==true)
		           window.location="admin.php?del="+id;
		    return false;
		}
	</script>
</head>
<body>

<?php 
	if (isset($_GET['Productname'])) {
		require_once('./ATNconnector.php');
		$conn = new ATNconnector();
		$sql = "UPDATE `product` SET `Productname`='".$_GET['Productname']."',`Manufacturer`='".$_GET['Manufacturer']."',`Unitprice`='".(int)$_GET['Unitprice']."',`Images`='".$_GET['Images']."',`Stock`='".(int)$_GET['Stock']."',`Categoryid`='".(int)$_GET['Categoryid']."' WHERE Productid = ".$_GET['Productid'];
		$conn -> execStatement($sql);
	}
	
 ?>
 <?php 
		
		if(isset($_GET['del']))
	   {
	   	require_once('./ATNconnector.php');
	   	$conn = new ATNconnector();
	   	$id = $_GET['del'];
	    $sql ="DELETE FROM product WHERE Productid ='". (int)$id ."'";
	    $conn->execStatement($sql);
	    $message = "Product Deleted!";
		echo "<script type='text/javascript'>alert('$message');</script>";
	   }
	 ?>
	 <?php 
		require_once('./ATNconnector.php');
		if(isset($_POST['Productid']))
		{
		$ID = $_POST['Productid'];
		$Images = $_POST['Images'];
		$Productname = $_POST['Productname'];
		$Unitprice = $_POST['Unitprice'];
		$Categoryid = $_POST['Categoryid'];
		$sql = "INSERT INTO product(Productid, Productname, Unitprice, Images,Categoryid) VALUES (". $ID .",'". $Productname ."',". $Unitprice .", '". $Images."',". $Categoryid ." )";
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
						<form class="example" action="Search.php" method="get">
		  				<input type="text" placeholder="Search.." name="search">
		  				<button type="submit"><i class="fa fa-search"></i></button>
						</form>
					</div>
				</div>
		 	</div>
	</div>
	<div class="main">
		<div style="margin:50px; padding-left:20%">
			<b><span style="font-size:20px">List Products:</span></b>
			<br><br><br>
			<form action="">
			<table border="1" cellpadding="1" cellspacing="0"  >
				<tr>
					<th>ProductId</th>
					<th>ProductName</th>
					<th>Images</th>
					<th>Categoryid</th>
					<th >Repair</th>
					<th>Delete</th>
				</tr>
				<?php 
					require_once('./ATNconnector.php');
					$conn = new ATNconnector();
					$sql = "Select * From product";
					$rows = $conn->runQueryadmin($sql);
				 	for ($i=0; $i < count($rows) ; $i++) { 
				?>
					<tr>
						<?php for ($j=0; $j<count($rows[$i]); $j++) { ?>
							<th>
								<?php echo $rows[$i][$j]?>
							</th>
							
						<?php } ?>

							<th ><a href="https://designweb.herokuapp.com/Suadoi.php?id=<?php echo $rows[$i][0] ?>"><input type="button" value="Update" style=" background-color: #FF7302; text-decoration-color: #FFFFFF;" ></a> 
							</th>
							<th ><a href="admin.php?del=<?php echo $rows[$i][0] ?>"> <input type="button" value="Delete" style=" background-color: #FF7302; text-decoration-color: #FFFFFF;" onclick="return Deleteqry(<?php echo $rows[$i][0] ?>);"> </a>
							</th>
					</tr>
				<?php } ?>
			</table> <br> <br>
			<div>
				<b><span style="font-size:20px">Add New Product:</span></b>   <a href="https://designweb.herokuapp.com/add.php"><input type="button" value="Add New Product" style=" background-color: #FF7302; text-decoration-color: #FFFFFF; width:25%; height: 30px" ></a> 
			</div>
			
		</div>



		<div style="margin:50px; padding-left:20%">
			<b><span style="font-size:20px">List of Customer:</span></b>
			<br><br><br>
			<table border="1" cellpadding="1" cellspacing="0"  >
				<tr>
					<th>Custid</th>
					<th>Fullname</th>
					<th>Address</th>
					<th>City</th>
					<th>Country</th>
					<th>Phone</th>
					<th>Fax</th>
					<th >Postalcode</th>
					<th>Tendangnhap</th>
					<th>Password</th>
				</tr>
				<?php 
					include 'ConnectorSQL.php';
					$sql = "SELECT * From customers";
					$row = pg_query($connection, $sql);
				 	for ($i=0; $i < count($row) ; $i++) { 
				?>
					<tr>
						<?php for ($j=0; $j<count($row[$i]); $j++) { ?>
							<th>
								<?php echo $row[$i][$j]?>
							</th>
						<?php } ?>
					</tr>
				<?php } ?>
			</table>
		</div>

		<div style="margin:50px; padding-left:20%">
			<b><span style="font-size:20px">Danh sách loại sản phẩm:</span></b>
			<br><br><br>

			<table border="1" cellpadding="1" cellspacing="0"  >
				<tr>
					<th>Categoryid</th>
					<th>Categoryname</th>
					<th>Description</th>
					<th >Repair</th>
					<th>Delete</th>
				</tr>
				<?php 
					require_once('./ATNconnector.php');
					$conn = new ATNconnector();
					$sql = "Select * From category";
					$rows = $conn->runQueryadmin($sql);
				 	for ($i=0; $i < count($rows) ; $i++) { 
				?>
					<tr>
						<?php for ($j=0; $j<count($rows[$i]); $j++) { ?>
							<th>
								<?php echo $rows[$i][$j]?>
							</th>
						<?php } ?>
							<th ><a href="https://designweb.herokuapp.com/Suadoi.php?id=<?php echo $rows[$i][0] ?>"><input type="button" value="Update" style=" background-color: #FF7302; text-decoration-color: #FFFFFF;" ></a> 
							</th>
							<th ><a href="admin.php?del=<?php echo $rows[$i][0] ?>"> <input type="button" value="Delete" style=" background-color: #FF7302; text-decoration-color: #FFFFFF;" onclick="return Deleteqry(<?php echo $rows[$i][0] ?>);"> </a>
							</th>
					</tr>
				<?php } ?>
			</table>
			<div> <br> <br>
				<b><span style="font-size:20px">Add New Product:</span></b>   <a href="https://designweb.herokuapp.com/addcategory.php"><input type="button" value="Thêm Catedory" style=" background-color: #FF7302; text-decoration-color: #FFFFFF; width:25%; height: 30px" ></a> 
			</div>
			</form>
		</div>



	</div>
	<div class="footer">
		<table  cellspacing="0" cellpadding="10" width= 100% align="center" >
			<tr >
			<th style="font-size: 17px; color:#FFFFFF"  >ANT_ TOP CHANNELS TO SHOP ONLINE!!!</th>
			<th  rowspan="2" style=" color:#FFFFFF" > ATN CO., LTD <br>
 													Business registration certificate: 245638792 - Date of issue: Oct 10, 2015, amended for the 9th time on Mar 15, 2019.<br>
 													Issuing agency: Business Registration Office - Hanoi Department of Planning and Investment.  <br>
 													Registered business address: 2nd Floor, 152 Nguyen Dinh Hoan, Cau Giay, Hanoi, Vietnam  <br>  <br><br>    @ATN 2019
 			</th>
			</tr>
			<tr >
				<td ><div align="center" style="padding-top:0%, width= 20px; color:#FFFFFF" >	
				</style>Buying goods online brings convenience, more diverse options and better services to consumers. That's why ATN Vietnam was launched with the desire to become the number 1 online shopping center in Vietnam, where you can choose everything to take care of your favorite toys .... All there in us!</div></td>	
			</tr>
		</table>
	</div>


</body>
</html>