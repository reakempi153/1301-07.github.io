<?php
require('header.inc'); 
?>

<?php

$DOCUMENT_ROOT = $HTTP_SERVER_VARS [' DOCUMENT_ROOT'];
?>
<Html>
<head>
<title>������������ - ������ ��������</title>

</head>
<body>
<h1>��� 3</h1>
<h2>������������ </h2>
<h3>3����� ��������</h3>
<?php

$hostname="localhost";
$user="root";
$password="";
$db="lablab3";
if(!$link = mysql_connect($hostname, $user, $password))
{
//echo "<br> He ���� ����������� � �������� ���� ������ <br>";
exit();
}
//echo "<br> ������������ � �������� ���� ������ ������ ������� <br>";


if (!mysql_select_db($db, $link))
{
//echo "<br> He ���� ������� ���� ������<br>";
exit();
}
else
{
//echo "<br> ����� ���� ������ ������ ������� <br>";
}





$query_1="select zakaz.id, zakaz.fio, zakaz.adress, zakaz.data, tovar.id, tovar.tireqty, tovar.oilqty, tovar.sparkqty FROM zakaz, tovar WHERE zakaz.id = tovar.id ORDER BY zakaz.data";
$result_1=mysql_query ($query_1);

?>
<table border=1 color=black width=100% height=10%>

<tr>


<td><b>�</b></td>
<td><b>���</b></td>
<td><b>A�pec</b></td>
<td><b>���� ������</b></td>
<td><b>��. ������ �</b></td>
<td><b>��. ������ �</b></td>
<td><b>��. ������ �</b></td>
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

