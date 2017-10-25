<?php
require('class.php');

$Page = new Page();
$Page -> header();
$Page -> connect();
$Page -> processorder($tireqty,$oilqty,$spartkqty,$fio,$adress);
$Page ->footer();
?>