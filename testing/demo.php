<?php

echo "badal<br>";
$code =[];
$i;
for($i=0;$i<4;$i++)
{
    $code[] = rand(0,9);
}
$activation_code = implode($code);
echo $activation_code;
?>