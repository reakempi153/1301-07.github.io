<?php
    require('header.inc');
?>
<html>
<head>

<title>������������ </title>
</head>
<body>
<h1><center>��� 4 </h1>
<h2><center>������������ </h2>
<h3><center>����� ������</h3>

<form action="processorder_4.php" method=post>
<table border=0>
<tr bgcolor=#FFF68F>
    <td width=150><left>�����</td>
    <td width=15><left>����������</td>
</tr>
<tr>
    <td><left>�</td>
    <td align="left"><input type="text" name="tireqty" size="3" maxlength="3"></td>
</tr>
<tr>
    <td><left>�</td>
    <td align="left"><input type="text" name="oilqty" size="3" maxlength="3"></td>
</tr>
<tr>
    <td><left>�</td>
    <td align="left"><input type="text" name="sparkqty" size="3" maxlength="3"></td>
</tr>
<tr>
    <td><left>��� �������</td>
    <td align="left"><input type="text" name="fio" size="40" maxlength="40"></td>
</tr>
<tr>
    <td><left>����� ��������</td>
    <td align="left"><input type="text" name="adress" size="40" maxlength="40"></td>
</tr>
<tr>
    <td colspan="2" align="center"><input type="submit" value="��������� �����"></td>
</tr>
</table>
</form>
</body>
</html>
<?php
require('footer.inc');    
?>
