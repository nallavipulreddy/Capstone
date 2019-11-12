<?php
error_reporting(0);
session_start();
include('dbh.php');
if(isset($_POST['reset']))
  {
  	if (empty($_POST['password'])) {
        $errors['password'] = 'Password required';
    }
    if (isset($_POST['password']) && $_POST['password'] !== $_POST['passwordConf']) {
        $errors['passwordConf'] = 'The two passwords do not match';
    }
    $email=$_SESSION['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $query=mysqli_query($conn,"update users set password='$password'  where  email='$email'");
   if($query)
   {
echo "<script>alert('Password successfully changed');</script>";
session_destroy();
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
<title>Reset-password</title>
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
	.reset-form{
		width: 400px;
		margin: 0 auto;
		padding: 30px 0;
	}
	.reset-form h2{
		color: #636363;
        margin: 0 0 15px;
		position: relative;
		text-align: center;
    }
	.reset-form h2:before, .reset-form h2:after{
		content: "";
		height: 2px;
		width: 10%;
		background: #d4d4d4;
		position: absolute;
		top: 50%;
		z-index: 2;
	}	
	.reset-form h2:before{
		left: 0;
	}
	.reset-form h2:after{
		right: 0;
	}
    .reset-form .hint-text{
		color: #999;
		margin-bottom: 30px;
		text-align: center;
	}
    .reset-form form{
		color: #999;
		border-radius: 3px;
    	margin-bottom: 15px;
        background: beige;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
	.reset-form .form-group{
		margin-bottom: 20px;
	}
	.reset-form input[type="checkbox"]{
		margin-top: 3px;
	}
	.reset-form .btn{        
        font-size: 16px;
        font-weight: bold;		
		min-width: 140px;
        outline: none !important;
    }
	.reset-form .row div:first-child{
		padding-right: 10px;
	}
	.reset-form .row div:last-child{
		padding-left: 10px;
	}    	
    .reset-form a{
		color: #fff;
		text-decoration: underline;
	}
    .reset-form a:hover{
		text-decoration: none;
	}
	.reset-form form a{
		color: #5cb85c;
		text-decoration: none;
	}	
	.reset-form form a:hover{
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
<div class="reset-form">
    <form action="" method="post">
		<h2>Reset-Password</h2>
		<p class="hint-text">Reset Your Password. It takes only  a minute.</p>
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
            <input type="password" class="form-control" name="password" placeholder="Password" required="required"pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="passwordConf" placeholder="Confirm Password" required="required">
        </div>        
		<div class="form-group">
            <button type="submit" name="reset" class="btn btn-success btn-lg btn-block">Submit</button>
        </div>
	</form>
</div>

</body>
</html>                          