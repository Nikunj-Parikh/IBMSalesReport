<html>
<h1>New Report will be generated shortly..</h1>
<p id="demo"></p>
<button id="btn">View Report</button>

<script>
<?php
require_once("DBConfig.php");
$res = mysqli_query($conn,"SELECT value from treportingservicekeyvalueactions");
$val = mysqli_fetch_array($res)[0];

?>
// Set the date we're counting down to
var countDownDate = new Date(<?php echo "'".date("M j, Y $val")."'"; ?>).getTime();

// Update the count down every 1 second
var x = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();
    
    // Find the distance between now an the count down date
    var distance = countDownDate - now;
    
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    6
    // Output the result in an element with id="demo"
    document.getElementById("demo").innerHTML = hours + "h "
    + minutes + "m " + seconds + "s ";
    document.getElementById('btn').disabled = "true";
    
    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "00:00:00";
        
    }
    if(<?php echo date("H")+3 ?> > 20)
    {document.getElementById('btn').removeAttribute("disabled");}
}, 1000);
</script>
<script type="text/javascript">

    function refreshAt(hours, minutes, seconds) {
    var now = new Date();
    var then = new Date();

    if(now.getHours() > hours ||
       (now.getHours() == hours && now.getMinutes() > minutes) ||
        now.getHours() == hours && now.getMinutes() == minutes && now.getSeconds() >= seconds) {
        then.setDate(now.getDate() + 1);
    }
    then.setHours(hours);
    then.setMinutes(minutes);
    then.setSeconds(seconds);

    var timeout = (then.getTime() - now.getTime());
    setTimeout(function() { window.alert("hllll");}, timeout);
}
refreshAt(18,4,0);    
    
</script>
</html>