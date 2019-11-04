<?php
class ATNconnector{
	public $host='localhost';
	public $dbname='cunshop';
	public $un= 'root';
	public $pw='';
	public function runQuery($sql)

	{
		$conn = new mysqli($this->host, $this->un, $this->pw, $this->dbname);
		//chay cau truy van
		$result = $conn->query($sql);
		//doc ket qua chay cau truy van, tra ve mot mang
		$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
		//dong ket noi
		$conn->close();
		return $rows;

	}
	public function execStatement($sql)
	{
		$conn = new mysqli($this->host, $this->un, $this->pw, $this->dbname);
		//chay cau truy van
		$result = $conn->query($sql);
		//dong ket noi
		$conn->close();
	}
	public function runQueryadmin($sql)

	{
		$conn = new mysqli($this->host, $this->un, $this->pw, $this->dbname);
		//chay cau truy van
		$result = $conn->query($sql);
		//doc ket qua chay cau truy van, tra ve mot mang
		$rows = mysqli_fetch_all($result);
		//dong ket noi
		$conn->close();
		return $rows;

	}
} 
 ?>