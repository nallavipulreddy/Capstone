<html>
<title>Smart-Irrigation</title>
<head>
<!.......................................................................................................>
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="signup.css">
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
<div class="bgimg-1">
    <div class="topnav">
        <a" href="# class ="navbar-brand" > SMART-IRRIGATION </a>
    </div>
    <div class="topnav">
        <table width="100%">
            <tr>
                <td>
                <a href="About.html">About</a>
                </td>
                <td>
                <a href="Team.html">TEAM</a>
                </td>
                <td>
                <a onclick="document.getElementById('id02').style.display='block'" style="width:auto;">SIGN IN</a>
                </td>
                <td>
                <a onclick="document.getElementById('id01').style.display='block'" style="width:auto;">SIGN UP</a>
                </td>
            </tr>
        </table>
    </div>
</div>
  
  <div style="position:relative;">
    <div style="color:#ddd;background-color:#282E34;text-align:center;padding:10px 10px;text-align: justify;">
      <p style="text-align:center">Scroll up and down to really get the experience of Farming</p>
    </div>
  </div>    
  
  
  
  <div class="bgimg-3">
    <div class="caption">
      <span class="border">"Farming is not a job it's a way of Living"</span>
    </div>
<!...................................signup............................................................................>>
<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content" action="/action_page.php">
    <div class="container">
      <h1>Sign Up</h1>
      <p>Please fill in this form to create an account.</p>
      <hr>
      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>

      <label for="psw-repeat"><b>Repeat Password</b></label>
      <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
      
      <label>
        <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
      </label>

      <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
        <button type="submit" class="signupbtn">Sign Up</button>
      </div>
    </div>
  </form>
</div>
<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

<!.............................................................Signin......................................................>

<div id="id02" class="modal">
  
  <form class="modal-content animate" action="/action_page.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id02').style.display='none'" class="close1" title="Close Modal">&times;</span>
      <img src="https://www.shareicon.net/data/512x512/2016/07/26/802026_man_512x512.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
        
      <button type="submit">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn1">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>
<script>
// Get the modal
var modal = document.getElementById('id02');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

<!............................>
  </div>
  </body>
  </html>