<?php
			// Production
			/**
			$servername ='localhost';
			$username = 'miraging_admin';
			$password = 'Sfi3OnjT8ytb';
			$dbname = 'miraging_database';
			**/
			
			
			// Local
			
			$servername ='localhost';
			$username = 'root';
			$password = '';
			$dbname = 'fda';

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			
			// Check connection
			if ($conn->connect_errno) {
			printf("Connect failed: %s\n", $mysqli->connect_error);
			exit();
			}
			
?>