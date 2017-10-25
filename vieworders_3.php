<?php
require('header.inc'); 
?>

<?php

$DOCUMENT_ROOT = $HTTP_SERVER_VARS [' DOCUMENT_ROOT'];
?>
<Html>
<head>
<title>Автозапчасти - Заказы клиентов</title>

</head>
<body>
<h1>лаб 3</h1>
<h2>Автозапчасти </h2>
<h3>3аказы клиентов</h3>
<?php

$hostname="localhost";
$user="root";
$password="";
$db="lablab3";
if(!$link = mysql_connect($hostname, $user, $password))
{
//echo "<br> He могу соединиться с сервером базы данных <br>";
exit();
}
//echo "<br> соедининение с сервером базы данных прошло успешно <br>";


if (!mysql_select_db($db, $link))
{
//echo "<br> He могу выбрать базу данных<br>";
exit();
}
else
{
//echo "<br> Выбор базы данных прошел успешно <br>";
}





$query_1="select zakaz.id, zakaz.fio, zakaz.adress, zakaz.data, tovar.id, tovar.tireqty, tovar.oilqty, tovar.sparkqty FROM zakaz, tovar WHERE zakaz.id = tovar.id ORDER BY zakaz.data";
$result_1=mysql_query ($query_1);

?>
<table border=1 color=black width=100% height=10%>

<tr>


<td><b>№</b></td>
<td><b>ФИО</b></td>
<td><b>Aдpec</b></td>
<td><b>Дата заказа</b></td>
<td><b>шт. товара А</b></td>
<td><b>шт. товара Б</b></td>
<td><b>шт. товара В</b></td>
</tr>

<?

while ($row=mysql_fetch_array ($result_1)) {

$id=$row["id"];

$fio=$row["fio"];

$adress=$row["adress"];

$data=$row["data"];

$tireqty=$row["tireqty"];

$oilqty=$row["oilqty"];

$sparkqty=$row["sparkqty"];
?>

<tr>

    <td> <? echo $id ?> </td><td> <? echo $fio ?> </td><td> <? echo $adress ?> </td><td> <? echo $data ?> </td><td> <? echo $tireqty ?> </td> <td> <? echo $oilqty ?> </td><td> <? echo $sparkqty ?> </td>
</tr>

<?php



}

?> </table> <?
?>

</body>

</html>

<?php

require('footer.inc');

?>

