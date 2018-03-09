<?php

class Database
{
    private $host;
    private $user;
    private $password;
    private $db;
    private $mysqli;


    function __construct() {

        $this->host     = "localhost";
        $this->user     = "quantox";
        $this->pass     = "@GGyKNNZm8AXQWl33";
        $this->data     = "quantox";

        $this->mysqli   = new mysqli($this->host, $this->user, $this->pass, $this->data);
    }


    public function query($query)
    {
        return $this->mysqli->query($query);
    }

	public function insertUser($email, $name, $pass){
	// prepare and bind
		try {
			$new_pass =md5($pass);

			$sql = "INSERT INTO `users` (user_email, user_name, user_pass, created_at, updated_at )
					VALUES ( '$email', '$name','".$new_pass."', '".date("Y-m-d H:i:s")."','". date("Y-m-d H:i:s")."')";

			$this->query($sql);

			echo $sql;

			return 'User has been created';

		} catch (Exception $e) {
			//
			 echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
	}
}



?>