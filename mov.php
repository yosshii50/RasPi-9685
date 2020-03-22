<?php

$actno = filter_input(INPUT_POST,"actno");
$portno = filter_input(INPUT_POST,"portno");

file_put_contents( 'mov1.log' , $actno . '/' . $portno );

$p1 = $portno;
$p3 = $portno + 1;

if ($actno >= 256) {
        $p4 = 1;
        $p2 = $actno - 256;
      }
      else{
        $p4 = 0;
        $p2 = $actno;
      }





//$cmd = 'ls -la > ls.txt';
$cmd = 'sudo ./mov.sh ' . $p1 . ' ' . $p2 . ' ' . $p3 . ' ' . $p4;
exec($cmd);

file_put_contents( 'mov2.log' , $cmd );

echo "[" . $actno . "]"; 

?>
