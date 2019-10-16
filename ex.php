<?php
//Database Configuration File
include('dbconnection.php');
error_reporting(0);
if(isset($_POST['signup']))
{
//Getting Post Values
$uname=$_POST['username'];
$uemail=$_POST['email'];
$upassword=md5($_POST['password']);
// Query for validation of username and email-id
$ret="SELECT * FROM users where (UserName=:username ||  UserEmail=:email)";
$queryt = $dbh -> prepare($ret);
$queryt->bindParam(':email',$email,PDO::PARAM_STR);
$queryt->bindParam(':username',$uname,PDO::PARAM_STR);
$queryt -> execute();
$results = $queryt -> fetchAll(PDO::FETCH_OBJ);
if($queryt -> rowCount() == 0)
{
// Query for Insertion
$sql="INSERT INTO users(UserName,UserEmail,UserPassword) VALUES(:uname,:uemail,:upassword)";
$query = $dbh->prepare($sql);
// Binding Post Values
$query->bindParam(':username',$uname,PDO::PARAM_STR);
$query->bindParam(':email',$uemail,PDO::PARAM_STR);
$query->bindParam(':password',$upassword,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="You have signup  Scuccessfully";
}
else
{
$error="Something went wrong.Please try again";
}
}
else
{
$error="Username or Email-id already exist. Please try again";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>PDO | Registration Form</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
  <style>
.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
        </style>
<!--Javascript for check username availability-->
<script>
function checkUsernameAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'username='+$("#username").val(),
type: "POST",
success:function(data){
$("#username-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){
}
});
}
</script>
<!--Javascript for check email availability-->
<script>
function checkEmailAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'email='+$("#email").val(),
type: "POST",
success:function(data){
$("#email-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){
event.preventDefault();
}
});
}
</script>
</head>
<body>
<form class="form-horizontal" action='' method="post">
  <fieldset>
<!--Error Message-->
  <?php if($error){ ?><div class="errorWrap">
                <strong>Error </strong> : <?php echo htmlentities($error);?></div>
                <?php } ?>
<!--Success Message-->
<?php if($msg){ ?><div class="succWrap">
                <strong>Well Done </strong> : <?php echo htmlentities($msg);?></div>
                <?php } ?>
<div class="control-group">
      <!-- user name -->
      <label class="control-label"  for="username">UserName</label>
      <div class="controls">
        <input type="text" id="username" name="username"  pattern="[a-zA-Z\s]+" title="Full name must contain letters only" class="input-xlarge" required>
      </div>
    </div>
    <div class="control-group">
      <!-- E-mail -->
      <label class="control-label" for="email">E-mail</label>
      <div class="controls">
        <input type="email" id="email" name="email" placeholder="" onBlur="checkEmailAvailability()" class="input-xlarge" required>
            <span id="email-availability-status" style="font-size:12px;"></span>
      </div>
    </div>
    <div class="control-group">
      <!-- Password-->
      <label class="control-label" for="password">Password</label>
      <div class="controls">
        <input type="password" id="password" name="password" pattern="^\S{4,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Must have at least 4 characters' : ''); if(this.checkValidity()) form.password_two.pattern = this.value;"  required class="input-xlarge">
      </div>
    </div>
    <div class="control-group">
      <!-- Confirm Password -->
      <label class="control-label"  for="password_confirm">Password (Confirm)</label>
      <div class="controls">
        <input type="password" id="password_confirm" name="password_confirm" pattern="^\S{4,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Please enter the same Password as above' : '')""  class="input-xlarge">
        <p class="help-block">Please confirm password</p>
      </div>
    </div>
    <div class="control-group">
      <!-- Button -->
      <div class="controls">
        <button class="btn btn-success" type="submit" name="signup">Signup </button>
      </div>
    </div>
  </fieldset>
</form>
<script type="text/javascript">
</script>
</body>
</html>

