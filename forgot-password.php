<?php 
session_start();
error_reporting(0);
include('dbh.php');
if(isset($_POST['change']))
  {
    $email=$_POST['email'];
    $username=$_POST['username'];

        $query=mysqli_query($conn,"select ID from users where  email='$email'&& username='$username'");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['email']=$email;
     header('location:reset-password.php');
    }
    else{
      $errors['invalid']="Invalid Details. Please try again.";
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
<title>Forgot-password</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 


<style type="text/css">
	body{
		color: #fff;
		background-image: url("images/3.jpg");
		position: relative;
    	background-attachment: fixed;
    	background-position: center;
    	background-repeat: no-repeat;
		background-size: cover;
		min-height: 100%;
		
		font-family: 'Roboto', sans-serif;
	}
    .form-control{
		height: 40px;
		box-shadow: none;
		color: #969fa4;
	}
	.form-control:focus{
		border-color: #5cb85c;
	}
    .form-control, .btn{        
        border-radius: 3px;
    }
	.forgot-form{
		width: 400px;
		margin: 0 auto;
		padding: 30px 0;
	}
	.forgot-form h2{
		color: #636363;
        margin: 0 0 15px;
		position: relative;
		text-align: center;
    }
	.forgot-form h2:before, .forgot-form h2:after{
		content: "";
		height: 2px;
		width: 10%;
		background: #d4d4d4;
		position: absolute;
		top: 50%;
		z-index: 2;
	}	
	.forgot-form h2:before{
		left: 0;
	}
	.forgot-form h2:after{
		right: 0;
	}
    .forgot-form .hint-text{
		color: #999;
		margin-bottom: 30px;
		text-align: center;
	}
    .forgot-form form{
		color: #999;
		border-radius: 3px;
    	margin-bottom: 15px;
        background: beige;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
	.forgot-form .form-group{
		margin-bottom: 20px;
	}
	.forgot-form input[type="checkbox"]{
		margin-top: 3px;
	}
	.forgot-form .btn{        
        font-size: 16px;
        font-weight: bold;		
		min-width: 140px;
        outline: none !important;
    }
	.forgot-form .row div:first-child{
		padding-right: 10px;
	}
	.forgot-form .row div:last-child{
		padding-left: 10px;
	}    	
    .forgot-form a{
		color: #fff;
		text-decoration: underline;
	}
    .forgot-form a:hover{
		text-decoration: none;
	}
	.forgot-form form a{
		color: #5cb85c;
		text-decoration: none;
	}	
	.forgot-form form a:hover{
		text-decoration: underline;
	}  
</style>
</head>
<body>

<div class="topnav">
        <table width="100%">
            <tr>
                <td>
                <a href="index.php"style="text-decoration: none">Home</a>
                </td>
                
            </tr>
        </table>
    </div>
<div class="forgot-form">
    <form action="" method="post">
		<h2>Forgot-password</h2>
		<p class="hint-text">Change Your Password Today. It takes only  a minute.</p>
<?php if (count($errors) > 0): ?>
  <div class="alert alert-danger">
    <?php foreach ($errors as $error): ?>
    <li>
      <?php echo $error; ?>
    </li>
    <?php endforeach;?>
  </div>
<?php endif;?>
        <div class="form-group">
			<input type="text" class="form-control" name="username" placeholder="UserName" required="required" onBlur="checkUsernameAvailability()"  pattern="[a-zA-Z\s]+">
			<span id="username-availability-status" style="font-size:12px;"></span>        	
        </div>
        <div class="form-group">
        	<input type="email" class="form-control" name="email" placeholder="Email" required="required" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
        </div>
		<div class="form-group">
            <button type="submit" name="change" class="btn btn-success btn-lg btn-block">Submit</button>
        </div>
	</form>
</div>

</body>
</html>                          