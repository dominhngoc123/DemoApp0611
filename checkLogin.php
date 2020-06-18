<?php	
	if (($_POST["txtUsername"] == '') && ($_POST["txtPassword"] == ''))
	{
		?>
			<script>
				alert("Username or password cannot be blank");
				location.assign("index.php");
			</script>
		<?php
	}
	else
	{

		$connection = pg_connect("localhost","root","","trainingfptcompany");
		$username = $_POST["txtUsername"];
		$password = $_POST["txtPassword"];
		$sql = "SELECT * FROM tblAdmin WHERE _user = '".$username."' AND _password = '".$password."'";
		$result = pg_query($connection, $sql) or die(mysqli_errno($connection));
		$row = pg_num_rows($result);
		if ($row == 1)
		{
			?>
				<script>
					alert("Login success");
					location.assign("success.php");
				</script>
			<?php
		} 
		else
		{
			?>
				<script>
					alert("Login failed");
					location.assign("index.php");
				</script>
			<?php
		}
	}
?>
