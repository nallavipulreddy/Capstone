<?php include 'dbh.php'?>
<?php
// redirect user to login page if they're not logged in
if (empty($_SESSION['id'])) {
    header('location: login.php');
}
$display=$_SESSION['username'];
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
        background-image: url("images/7.jpg");
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
        width: 450px;
        margin: 30px auto;
        padding: 30px 0;
    }
    .signup-form:hover{
        background-color: orange;
        color:black;
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

<div>
    <div class="topnav" style="text-decoration: none;">
        <table width="100%">
            <tr style="text-decoration: none;">
                <td>
                <a href="kc.php"style="text-decoration: none;">Knowledge-Center</a>
                </td><td>
                <a href="soilmoisture.php"style="text-decoration: none;">Soil moisture</a>
                </td><td>
                <a href="temperature.php"style="text-decoration: none;">Temperature</a>
                </td>
                <td class="dropdown">
                <a class="dropbtn">Account</a>
                    <div class="dropdown-content">
                        <a href="main.php"style="text-decoration: none;"><?php echo $display;?></a>
                        <a href="#"style="text-decoration: none;">Help</a>
                        <a href="logout.php"style="text-decoration: none;">Logout</a>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</div>
<!.......................................HERE.......................................>
    <?php
        $api_key="b880f57f49e9e443f77daa9e46907cc2";
        $ch=curl_init();
        $url="http://api.openweathermap.org/data/2.5/weather?q=Jalandhar,IN&lang=en&units=metric&appid=".$api_key."";
        $currentTime= time();
        curl_setopt($ch, CURLOPT_HEADER , 0);
        curl_setopt($ch, CURLOPT_URL , $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_VERBOSE , 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response=curl_exec($ch);
        $data=json_decode($response);


    ?>
    
<div class="signup-form">
        <div class="form-group">
                <h2>Weather Status</h2>
                <p><b>Location:</b> <?php echo $data->name;?></p>
                <p><b><?php echo date("l g:i a",$currentTime)?></b></p>
                <p><b><?php echo date("jS F, Y",$currentTime)?></b></p>
                <p><b>Cloudiness:</b><?php echo ucwords($data->weather[0]->description)?></p>
                <p><b>Minimum Temperature:</b> <?php echo $data->main->temp_min;?>&deg;C</p>
                <p><b>Maximum Temperature:</b> <?php echo $data->main->temp_min;?>&deg;C</p>
                <p><b>Humidity:</b> <?php echo $data->main->humidity;?>%</p>
                <p><b>Pressure:</b> <?php echo $data->main->pressure;?></p>
                <p><b>Wind Speed:</b> <?php echo $data->wind->speed;?>%</p>
        </div>    
</div>




</body>
</html>