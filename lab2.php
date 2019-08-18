
<!DOCTYPE html>
<html>
  <head>
    <title>Lab 2</title>
  </head>
    <p>Page 1 is the login/registration page.</p>
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
      $pgNum = 0;
      if(isset($_GET["page"])){
        $pageNum = $_GET["page"];
          settype($pageNum, "integer");
      }
      else{
        $pageNum = 1;
      }
      if($pageNum > 5 || $pageNum < 1){
        echo("<strong>Error...this page does not exist!</strong></body></html>");
        die();
      }

      echo ("<strong>This is page# $pageNum</strong>");
        if($pageNum == 1){
    ?>
      <form method="get"
action="<?php echo $_SERVER['localhost']; ?>">

          <input type="hidden" name="page" value="2">
          <p><label>Username
            <input type="text" name="username">
          </label></p>
          <p><label>Password
            <input type="text" name="password">
          </label></p>
          <p><input type="submit" value="SUBMIT"></p>
        </form>
      <?php
        } else if {//$pgNum == 2
            $username = $password = "";
            if (isset($_GET["username"]
              && $_GET["username"] != ""
              && isset($_GET["password"]
              && $_GET["password"] != ""){
              $username = $_GET["username"];
              $password = $_GET["password"];
            }
            else{

              echo("<p><strong>Error...your info was not received properly...!</strong></p></body></html>");
              die();
            }
}
        ?>
      <p> This is your username: <?php echo $username; ?>.</p>
      <p> This is your password: <?php echo $password; ?>.</p>
        <form method="get"
          action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <input type="hidden" name="page" value="1">
        <p><input type="submit" value="Back to Page 1"></p>
                        </form>

                <?php
                        }
                ?>
  </body>
</html>
