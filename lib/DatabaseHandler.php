<?php 
/**
* 
*/
class DatabaseHandler 
{
	
	function __construct()
	{
		$this->servername = "35.194.159.60";
		$this->username = "hexfin";
		$this->password = "hexfin";
		$this->dbname='hexafin';
		require_once 'ApiHandler.php';
		// Create connection
		
		
	}

	public function openDB()
	{
		try {
		    $this->conn = new PDO("mysql:host=$this->servername;dbname=hexafin", $this->username, $this->password);
		    // set the PDO error mode to exception
		    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		     
		    }
		catch(PDOException $e)
		    {
		    print_r($e);
		    }
	}
	public function closeDB()
	{
		$this->conn=null;
	}

	public function SignUp($data)
	{
		$sql="insert into Users values('$data[CustomerName]','$data[DateOfBirth]','$data[MobileNumber]','$data[EmailAddress]','$data[IDNumber]','$data[Password]')";
		try {
			$this->openDB();
			$this->conn->exec($sql);
			$this->closeDB();
			return array("status"=>'success','response'=>'');
		} catch (Exception $e) {
			return array('status'=>'failed','response'=>$e);
		}
	}

	public function LogIn($data)
	{
		$sql="select CustomerName,EmailAddress from Users where EmailAddress='$data[EmailAddress]' and Password='$data[Password]'";
		try {
			$this->openDB();
			$stmt=$this->conn->prepare($sql);
			$stmt->execute();
			$response=$stmt->setFetchMode(PDO::FETCH_ASSOC); 
			$this->closeDB();
			return array("status"=>'success','response'=>$stmt->fetchAll());
		} catch (Exception $e) {
			return array('status'=>'failed','response'=>$e);
		}
	}

	public function MakeWallet($data)
	{
		$sql="select * from Users where EmailAddress='$data[EmailAddress]' ";
		try {
			$this->openDB();
			$stmt=$this->conn->prepare($sql);
			$stmt->execute();
			$response=$stmt->setFetchMode(PDO::FETCH_ASSOC); 
			$result=$stmt->fetchAll()[0];
			
			$sql="insert into Wallet(Type,EmailAddress) values('$data[Type]','$data[EmailAddress]')";
			$this->conn->exec($sql);
			$result['PrimaryID']=$this->conn->lastInsertId();
			$this->closeDB();

			return array("status"=>'success','response'=>);
		} catch (Exception $e) {
			return array('status'=>'failed','response'=>$e);
		}
	}
}

 ?>