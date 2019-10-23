
<?php
include 'dbh.php';
if(!empty($_GET['code']) && isset($_GET['code']))
{
$code=$_GET['code'];
$sql=mysqli_query($conn,"SELECT * FROM users WHERE token='$code'");
$num=mysqli_fetch_array($sql);
		if($num>0)
		{
		  
			$st=0;
			$result =mysqli_query($conn,"SELECT id FROM users WHERE token='$code' and verified='$st'");
			$result4=mysqli_fetch_array($result);   

			if($result4>0) 
			  {
				$st=1;
				$result1=mysqli_query($conn,"UPDATE users SET verified='$st' WHERE token='$code'");
				$msg="Your account is activated"; 
			}
			else
			{
			$msg ="Your account is already active, no need to activate again";
			}
		}
		else
			{
			$msg ="Wrong activation code.";
			}
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<link rel="stylesheet" href="css/styles.css">
<title>Email Verification</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<style>

p
{
	font-size: 15px;
	text-align: center;
}

</style>
	</head>
	<body style="background-color: gray"class="bgimg-1">
<div class="topnav">
        <table width="100%">
            <tr>
                <td>
                <a href="index.php"style="text-decoration: none">Home</a>
                </td>
            </tr>
        </table>
    </div>

<div style="background-color: beige;width: 50%;height:43%;margin-left: 25%;margin-top: 10%;overflow: hidden;">
		
		
        		<h3 style="text-align: center;color: black">Email Verification </h3>
<br>
				<p><?php echo htmlentities($msg);?></p>
				<br>
   				<p> Now you can login</p>
   				<br>
   				<p style="font-size: 17px">For login <a href="login.php">Click Here</a></p>
  
	
	</body>
</html>