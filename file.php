<!DOCTYPE html>
<html>
<head>
  <title>view report</title>
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<style type="text/css">
  @import url(https://fonts.googleapis.com/css?family=Roboto:400,300,600,400italic);
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  -webkit-font-smoothing: antialiased;
  -moz-font-smoothing: antialiased;
  -o-font-smoothing: antialiased;overflow-x: 
  font-smoothing: antialiased;
  text-rendering: optimizeLegibility;
}

body {
  font-family: "Roboto", Helvetica, Arial, sans-serif;
  font-weight: 100;
  font-size: 12px;
  line-height: 30px;
  color: #777;
  background: grey;
}

.container {
  max-width: 400px;
  width: 100%;
  margin: 0 auto;
  position: relative;
}

#contact button[type="submit"] {
  font: 400 12px/16px "Roboto", Helvetica, Arial, sans-serif;
}

#contact {
  background: #F9F9F9;
  padding: 25px;
  margin: 150px 0;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}

#contact h3 {
  display: block;
  font-size: 30px;
  font-weight: 300;
  margin-bottom: 10px;
}

#contact h4 {
  margin: 5px 0 15px;
  display: block;
  font-size: 13px;
  font-weight: 400;
}

fieldset {
  border: medium none !important;
  margin: 0 0 10px;
  min-width: 100%;
  padding: 0;
  width: 100%;
}



#contact button[type="submit"] {
  cursor: pointer;
  width: 100%;
  border: none;
  background: #4CAF50;
  color: #FFF;
  margin: 0 0 5px;
  padding: 10px;
  font-size: 15px;
}

#contact button[type="submit"]:hover {
  background: #43A047;
  -webkit-transition: background 0.3s ease-in-out;
  -moz-transition: background 0.3s ease-in-out;
  transition: background-color 0.3s ease-in-out;
}

#contact button[type="submit"]:active {
  box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.5);
}

.copyright {
  text-align: center;
}

#contact input:focus,
#contact textarea:focus {
  outline: 0;
  border: 1px solid #aaa;
}

::-webkit-input-placeholder {
  color: #888;
}

:-moz-placeholder {
  color: #888;
}

::-moz-placeholder {
  color: #888;
}

:-ms-input-placeholder {
  color: #888;
}
</style>
<div class="container">  
  <form id="contact" action="" method="post">
  <center>
    <h3>View Report</h3></center>
    <fieldset>
    <center>
    <label>TO&nbsp</label>
      <input type="date" id="from" placeholder="From"  name="FROM" tabindex="1" required autofocus>
      </center>
    </fieldset>
    <fieldset>
    <center>
    <label>From</label>
      <input type="date" id="to" placeholder="To"  name="TO" tabindex="2" required>
      </center>
    </fieldset>
    <fieldset>
    <center>
    <label>SPECIFY&nbsp</label>
 <select id="userteam" name="userteam">
  <option value="User">User</option>
  <option value="Team">Team</option>
  <option value="Product">Product</option>
</select>
</center>
</fieldset>
<fieldset>
  <center>
  <label>NAME</label>

      <input type="text" id="name" placeholder="Name" name="NAME" tabindex="2" required>
      </center>
    </fieldset>
    <fieldset>
      <button name="submit" type="submit" id="submit">Submit</button>
    </fieldset>
  </form>
</div>
<script>
    var redi="";
<?php
  if(isset($_POST['submit']))
  {
    if($_POST['userteam']=="User")
      echo " redi ='front.php?FROM=".$_POST['FROM']."&TO=".$_POST['TO']."&NAME=".$_POST['NAME']."';";
    elseif($_POST['userteam']=="Team")
      echo "redi ='frontTeam.php?FROM=".$_POST['FROM']."&TO=".$_POST['TO']."&NAME=".$_POST['NAME']."';";
    else
      echo "redi ='frontProduct.php?FROM=".$_POST['FROM']."&TO=".$_POST['TO']."&NAME=".$_POST['NAME']."';";
      
      echo " alert(redi);";
      echo " window.location=redi;";
  }
?>
   // alert(redi);
   
</script>
</body>
</html>

