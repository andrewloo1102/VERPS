<?php
//function that decides whether date is before or after deadline. This information is sent to veritasRPS.php
$now = date("y:m:d:H:i");
$deadline = "13:09:07:17:00";
if ($now <= $deadline)
{
echo $now;


}
else
{
}
?>
