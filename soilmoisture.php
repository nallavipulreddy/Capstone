<?php include 'dbh.php'?>
<?php
date_default_timezone_set("Asia/Kolkata");
// redirect user to login page if they're not logged in
if (empty($_SESSION['id'])) {
    header('location: login.php');
}
$display=$_SESSION['username'];
$channel=$_SESSION['channel_id'];
$auth=$_SESSION['auth_key'];
?>

<html>
<title><?php echo $display;?></title>
<head>
<!.......................................................................................................>
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<link rel="stylesheet" href="css/styles.css">
<title>Weather Status</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<meta http-equiv="refresh" content="900;url=logout.php" />
<style>
body{
        color: #fff;
        background-image: url("https://www.icrisat.org/wp-content/uploads/2019/07/CGIAR-20190627-Article-Hero-Image-001-1180x550.jpg");
        position: relative;
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        min-height: 100%;
        font-size: 15px;
        text-align: center;
        font-family: 'Roboto', sans-serif;
    }
    .signup-form{
        width: 400px;
        margin: 30px auto;
        padding: 30px 0;
    }
    .signup-form:hover{
        background-color: orange;
        color:black;
    }
    .signup-form h2{
        color: white;
        margin: 0 0 15px;
        position: relative;
        text-align: center;
    }
       
    .signup-form .hint-text{
        color: white;
        margin-bottom: 30px;
        text-align: center;
    }
    .signup-form{
        color: white;
        border-radius: 30px;
        margin-bottom: 15px;
        background: black;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .signup-form .form-group{
        margin-bottom: 20px;
    }
            
    
</style>

<script>
/* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>


</head>
<body>

<div style="background-color: black">
    <div class="topnav">
        <table width="100%">
            <tr>
                <td>
                <a href="kc.php">Knowledge-Center</a>
                </td><td>
                <a href="soilmoisture.php">Soil moisture</a>
                </td><td>
                <a href="temperature.php">Temperature</a>
                </td><td>
                <a href="pump.php">Water Pump</a>
                </td>
                <td class="dropdown">
                <a class="dropbtn">Account</a>
                    <div class="dropdown-content">
                        <a href="main.php"><?php echo $display;?></a>
                        <a href="#">Help</a>
                        <a href="logout.php">Logout</a>
                    </div>
                </td>
                
            </tr>
        </table>
    </div>
</div>
    <?php
    if($_SESSION['channel_id']!=0)
    {
        $ses=$_SESSION['channel_id'];
        $auth=$_SESSION['auth_key'];
        $ch=curl_init();
        $url="https://api.thingspeak.com/channels/".$ses."/fields/1.json?api_key=".$auth."&results=2";
        curl_setopt($ch, CURLOPT_URL , $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response=curl_exec($ch);
        $data=json_decode($response);



        echo'<div class="signup-form"">
                <div class="form-group">
                    <p><b>Channel id:</b>'.$data->channel->id.'</p>
                    <p><b>Created At:</b>'.date($data->channel->created_at).'</p>
                    <p><b>Updated At:</b>'.date($data->channel->updated_at).'</p>
                    <p><b>Last entry Id:</b>'.($data->channel->last_entry_id).'</p>
                </div>
            </div>
                    <iframe width="450" height="260" src="https://thingspeak.com/channels/'.$ses.'/charts/1?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&type=line&update=15"></iframe>

                    <iframe width="450" height="260" src="https://thingspeak.com/channels/'.$ses.'/widgets/111517"></iframe>
            ';   
    }
    else
    {
        echo'<div class="signup-form">


            <div class="caption">
            <span class="border">"You Don\'t Have Any Device Set"</span>
            </div>

        


    </div>';

    }

    ?>



</body>
</html>