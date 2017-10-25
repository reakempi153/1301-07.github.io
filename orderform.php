<?php
require('header.inc');
?>
<himl>
<head>
<title> Автозапочасти </title>

</head>
<body>

<h1>Лаб 1 </h1>

<h2>Автозапчасти </h2>
<h3>Форма заказа</h3>

<form action="processorder.php" method=post>
<table border=0>
<tr bgcolor=#FF83FA>
<td width=150>Товар</td>
<td width=15>Количество</td>
</tr>
<tr>
  <td>А</td>
<td align="left"><input type="text" name="tireqty" size="3" maxlength="3"></td>
</tr>
<tr>
  <td>Б</td>
<td align="left"><input type="text" name="oilqty" size="3" maxlength="3"></td>
</tr>
<tr>
<td>В</td>
<td align="left"><input type="text" name="sparkqty" size="3" maxlength="3"></td>
</tr>
<tr>
<td>Как вы нашли компанию</td>
<td><select name="find">
 <option value = "Я регулярный клиент">Я регулярный клиент 
 <option value = "В телевизионной рекламе">В телевизионной рекламе
 <option value = "В телефонном справочнике">В телефонном справочнике
 <option value = "Кто-то порекомендовал">Кто-то порекомендовал
</select>
</td>
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
