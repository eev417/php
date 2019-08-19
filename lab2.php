<!DOCTYPE html>
<html>
	<head>
    <title>Lab 2</title>
    </head>
	<body>
		<p>Page 1 is the registration/login page.</p>
	<br>
	<p>Page 2 is the user creation successful page.</p>
	<br>
	<p>Page 3 is the light control page</p>
	<br>
	<p>Page 4 is the admin page.</p>
	<br>
	<p>Page 5 is the failure to login/account creation page.</p>
	<br>
	
		
		<?php
			$pageNum = 0;
			if( isset($_GET["page"]) )
			{
				$pageNum = $_GET["page"];
				settype($pageNum, "integer");
			}
			else
			{
				$pageNum = 1;
			}

			if($pageNum > 2 || $pageNum < 1)
			{
				echo("<strong>Error...this page does not exist!</strong></body></html>");
				die();
			}

			echo ("<strong>This is page# $pageNum</strong>");
			if($pageNum == 1)
			{
		?>
			<form method="get" action="">

          <input type="hidden" name="page" value="2">
		  <input type="hidden" name="signup" value="1">
          <p><label>Username
            <input type="text" name="username">
          </label></p>
          <p><label>Password
            <input type="text" name="password">
          </label></p>
		  <p><label>Retype Password
		    <input type="text" name="repassword">
		  </label></p>
          <p><input type="submit" name ="submit" value="REGISTER"></p>
        </form>
		<?php
			} else { // $pageNum == 2
			$dbusername = $dbpassword = "";
				if (isset($_GET["username"]) && isset($_GET["password"])){
					$dbusername = $_GET["username"];
					$dbpassword = $_GET["password"];
					$dbsalt = $_GET["repassword"];
					$con = mysqli_connect("localhost","root","maria484","users");
					if (mysqli_connect_errno()){
					echo "Failed to connect to db." . mysqli_connect_errno();	
					}
					//$query = "INSERT INTO user ('userid', 'username', 'password', 'salt') VALUES (NULL, 
					mysqli_query($con, "INSERT INTO user (username,password,salt)
					VALUES ('$dbusername', '$dbpassword', '$dbsalt')");
					/* mysqli_real_query($con, "INSERT INTO user ('userid','username','pass','salt')
					VALUES (0, '$dbusername', '$dbpassword', '$dbsalt')"); */
					mysqli_close($con);
						
				}
				else
				{
					echo("<p><strong>Error...your info was not received properly...!</strong></p></body></html>");
					die();
				}
		?>
			<p> This is your username: <?php echo $dbusername; ?>.</p>
			<p> This is your password: <?php echo $dbpassword; ?>.</p>

			<form method="get" action="">				
				<input type="hidden" name="page" value="1">
				<p><input type="submit" value="Back to Page 1"></p>
			</form>
			
		<?php
			}
		?>

		<hl><br><br><br>
	</body>
</html>
