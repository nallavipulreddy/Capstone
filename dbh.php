<?php
session_start();
$username = "";
$email = "";
$errors = [];

$conn = new mysqli('localhost', 'root', '', 'test1');

// Signup User
if (isset($_POST['submit'])) {
    if (empty($_POST['username'])) {
        $errors['username'] = 'Username required';
    }
    if (empty($_POST['email'])) {
        $errors['email'] = 'Email required';
    }
    if (empty($_POST['password'])) {
        $errors['password'] = 'Password required';
    }
    if (isset($_POST['password']) && $_POST['password'] !== $_POST['passwordConf']) {
        $errors['passwordConf'] = 'The two passwords do not match';
    }

    $username = $_POST['username'];
    $email = $_POST['email'];
    $token = bin2hex(random_bytes(50)); // generate unique token
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); //encrypt password
    $channel_id=0;
    $auth_key=0;

    // Check if email already exists
    $sql = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $errors['email'] = "Email already exists";
    }
    if (count($errors) === 0) {
       $query = "INSERT INTO users SET username=?, email=?, token=?, password=?,channel_id=?,
    auth_key=?;";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ssssss', $username, $email, $token, $password,$channel_id,
    $auth_key);
        $result = $stmt->execute();

        if ($result) {
            $user_id = $stmt->insert_id;
            $stmt->close();

            // TO DO: send verification email to user
            // sendVerificationEmail($email, $token);

            $to=$email;
            $msg= "Thanks for new Registration.";   
            $subject="Email verification (smarttyfarm.com)";
            $head .= "MIME-Version: 1.0"."\r\n";
            $head .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
            $head .= 'From:Smarttyfarm | admin <vipulreddy00@gmail.com>'."\r\n";
                
            $ms.="<html></body><div><div>Dear $username,</div></br></br>";
            $ms.="<div style='padding-top:8px;'>Please click The following link For verifying and activation of your account</div>
            <div style='padding-top:10px;'><a href='https://smarttyfarm.000webhostapp.com/email_Verification.php?code=$token'>Click Here</a></div>
            <div style='padding-top:4px;'>Powered by <a href='https://smarttyfarm.000webhostapp.com'>smarttyfarm</a></div></div>
            </body></html>";
            mail($to,$subject,$ms,$head);


            $_SESSION['id'] = $user_id;
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            $_SESSION['verified'] = false;
            header("location: login.php");
        } else {
            $_SESSION['error_msg'] = "Database error: Could not register user";
        }

    }
}
// LOGIN
if (isset($_POST['login'])) {
    if (empty($_POST['username'])) {
        $errors['username'] = 'Username or email required';
    }
    if (empty($_POST['password'])) {
        $errors['password'] = 'Password required';
    }
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (count($errors) === 0) {
        $query = "SELECT * FROM users WHERE username=? OR email=? LIMIT 1";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ss', $username, $password);

        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) { // if password matches
                $stmt->close();
                    if($user['verified']===0)
                    {
                        $errors['login_fail']="Verify  your Email Id by clicking  the link In your mailbox";
                    }
                    else {
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['verified'] = $user['verified'];
                    $_SESSION['channel_id']=$user['channel_id'];
                    $_SESSION['auth_key']=$user['auth_key'];
                    $_SESSION['message'] = 'You are logged in!';
                    $_SESSION['type'] = 'alert-success';
                    header("location: main.php");
                    exit(0);
                    }
                
            } 
            else 
            { // if password does not match
                $errors['login_fail'] = "Wrong username / password";
            }
        } 
        else
            {
            $_SESSION['message'] = "Database error. Login failed!";
            $_SESSION['type'] = "alert-danger";
            }
    }
}
//contact us

