<?php
function watcher()
{
     $ipLog="log.txt"; //log file
     $agent = $_SERVER['HTTP_USER_AGENT'];
     if(isset($_SERVER['HTTP_REFERER']))
          $reffered = $_SERVER['HTTP_REFERER'];
     
     if (isset($_GET['s']))
          $param=$_GET['s'];
     else {
     }
     
     // IP logging
     $register_globals = (bool) ini_get('register_gobals');
     if ($register_globals) $ip = getenv(REMOTE_ADDR);
     else $ip = $_SERVER['REMOTE_ADDR'];
     $date=date ("l dS of F Y h:i:s A");
     $log=fopen("$ipLog", "a+");
     $pattern = "/\btxt\b/i"; // only txt files
     if (preg_match($pattern, $ipLog))
     {
          fputs($log, "Logged IP address: $ip User-Agent: $agent  Reffered by: $reffered Parameter: $param Date logged: $date\n ");
     }
     fclose($log);
}

// Place the below function call wherever you want the script to fire.
watcher();
header( "Location: http://" . $_GET['s'], TRUE, 301 );
?>
</body>
</html>
