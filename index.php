<html>
<head></head>
<body>
<center><h1>:)</h1></center>
 <img src="giphy.gif" alt="You didn't" height=auto width=100%> 

<?php

function logIP()
{
     $ipLog="logfile.htm"; // Your logfiles name here (.txt or .html extensions ok)
     $agent = $_SERVER['HTTP_USER_AGENT'];
     $reffered = $_SERVER['HTTP_REFERER'];

     // IP logging

     $register_globals = (bool) ini_get('register_gobals');
     if ($register_globals) $ip = getenv(REMOTE_ADDR);
     else $ip = $_SERVER['REMOTE_ADDR'];

     $date=date ("l dS of F Y h:i:s A");
     $log=fopen("$ipLog", "a+");

     if (preg_match("/\\bhtm\\b/i", $ipLog) || preg_match("/\\bhtml\\b/i", $ipLog))
     {
          fputs($log, "<span style={color;red;}>Logged IP address: $ip </span> <br> User-Agent: $agent <br> Reffered by: $reffered <br> Date logged: $date<br><br>");
     }
     else fputs($log, "<span style={color;red;}>Logged IP address: $ip </span> <br> User-Agent: $agent <br> Reffered by: $reffered <br> Date logged: $date\
");

     fclose($log);
}
// Place the below function call wherever you want the script to fire.
logIp();


?>

</body>
</html>