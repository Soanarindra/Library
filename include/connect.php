<?php 
	function db_connect()
	{
		static $connect = null;
		if ($connect === null)
		{
			$connect = mysqli_connect('localhost', 'root', 'root', 'myLibrary');
		}
		return $connect;
	}
?>