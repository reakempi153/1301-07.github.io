<?php
require('header.inc');
?>
<html>
<head>
 <title>Автозапчасти</title>

</head>
<body>
<h1>Лаб 3 </h1>
<h2>Автозапчасти</h2>
<h3>Форма заказа</h3>

<form action="processorder_3.php"  method=post>
<table border=0>
<tr bgcolor=#6A5ACD>
  <td width=150>Toвap</td>
<td width=15>Kоличество</td>
</tr>
<tr>
<td>А</td>
<td align=" left"><input type="text" name="tireqty" size= "З" maxlength="3"></td>
</tr>
<tr>
<td>Б</td>
<td align= "left"><input type="text" name="oilqty" 512е="3" maxlength="3"></td>
</tr>
<tr>
<td>В</td>
<td align="left"><input type="text" name="sparkqty" size= "З" maxlength="3"></td>
</tr>
<tr>
<td>ФИО клиента</td>
<td align="left"><input type="text" name="fio" size= "40" maxlength="40"></td>
</tr>
<tr>
<td>адрес доставки</td>
<td align="left"><input type="text" name="adress" size= "40" maxlength="40"></td>
</tr>
<tr>
<td colspan="2" align="center"><input type="submit" value= "Отправить заказ"></td>
</tr>
</table>
</form>
</body>
</html>
<?php
require('footer.inc');
?>
