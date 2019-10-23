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
    <link rel="stylesheet" href="css/styles.css">
    <meta http-equiv="refresh" content="900;url=logout.php" />
<style>
    .tabcontent {
  color: black;
  display: none;
  background-color: beige;
  padding: 100px 20px;
  height: 409px;
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



        echo'<div style="background-color:black;width: 100%;position: absolute;top: 55px;bottom:0;overflow:hidden">
        <div style="text-align:center;color:white">
            <p>Channel id:'.$data->channel->id.'</p>
            <p>Created At:'.date($data->channel->created_at).'</p>
            <p>Updated At:'.date($data->channel->updated_at).'</p>
            <p>Last entry Id:'.($data->channel->last_entry_id).'</p>
        </div>
        <iframe width="450" height="260" style="border: 1px solid #cccccc;margin:50px 120px;" src="https://thingspeak.com/channels/'.$ses.'/charts/1?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&type=line&update=15"></iframe>

        <iframe width="450" height="260" style="border: 1px solid #cccccc;margin:50px 100px;" src="https://thingspeak.com/channels/'.$ses.'/widgets/111517"></iframe>

    </div>';   
    }
    else
    {
        echo'<div style="background-color:gray;width: 100%;position: absolute;top: 55px;bottom:0;overflow:hidden;text-align:center;color:white">


            <div class="caption">
            <span class="border">"You Don\'t Have Any Device Set"</span>
            </div>

        


    </div>';

    }

    ?>



</body>
</html>