<?php
    require('header.inc');
?>
<html>
<head>

<title>Автозапчасти </title>
</head>
<body>
<h1><center>Лаб 4 </h1>
<h2><center>Автозапчасти </h2>
<h3><center>Форма заказа</h3>

<form action="processorder_4.php" method=post>
<table border=0>
<tr bgcolor=#FFF68F>
    <td width=150><left>Товар</td>
    <td width=15><left>Количество</td>
</tr>
<tr>
    <td><left>А</td>
    <td align="left"><input type="text" name="tireqty" size="3" maxlength="3"></td>
</tr>
<tr>
    <td><left>Б</td>
    <td align="left"><input type="text" name="oilqty" size="3" maxlength="3"></td>
</tr>
<tr>
    <td><left>В</td>
    <td align="left"><input type="text" name="sparkqty" size="3" maxlength="3"></td>
</tr>
<tr>
    <td><left>ФИО клиента</td>
    <td align="left"><input type="text" name="fio" size="40" maxlength="40"></td>
</tr>
<tr>
    <td><left>Адрес доставки</td>
    <td align="left"><input type="text" name="adress" size="40" maxlength="40"></td>
</tr>
<tr>
    <td colspan="2" align="center"><input type="submit" value="Отправить заказ"></td>
</tr>
</table>
</form>
</body>
</html>
<?php
require('footer.inc');    
?>
