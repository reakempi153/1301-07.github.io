<?php
    require('header.inc');
?>

<h2><center>Автозапчасти</center></h2>
<h3><center>Заказы клиентов</center></h3>
<?php
//Считывание всего файла
//Каждый заказ становится элементом массива
$orders=file("orders_4.txt");
//Подсчет количества заказов, хранящихся в массиве
$number_of_orders = count($orders);

echo "$number_of_orders";
if ($number_of_orders == 0)
{
    echo '<p><strong> Нет ожидающих заказов.
          Пожалуйста, попытайтесь позже.</p></strong>';
}
echo '<table border=1>';
echo '<tr><th bgcolor = \"#90EE90\"> Дата заказа </th>' .
          '<th bgcolor = \"#6A5ACD\"> А </th>' .
          '<th bgcolor = \"#6A5ACD\"> Б </th>' .
          '<th bgcolor = \"#6A5ACD\"> В </th>' .
          '<th bgcolor = \"#CC3399\"> Всего </th>' .
          '<th bgcolor = \"#6A5ACD\"> Адрес клиента </th>' .
          '<th bgcolor = \"#90EE90\"> ФИО клиента </th>' .
          '<tr>';

for ($i=0; $i<$number_of_orders; $i++)
{
    //разбиение строк
    $line = explode( "\t", $orders[$i] );
    //Сохранение только количества заказанных товаров
  
    //Вывод заказов
    echo "<tr><td>$line[0]</td>
              <td align='right'>$line[1]</td>
              <td align='right'>$line[2]</td>
              <td align='right'>$line[3]</td>
              <td align='right'>$line[4]</td>
              <td>$line[5]</td>
              <td>$line[6]</td>
              
    </tr>";
}
echo "</table>";

    require('footer.inc');
?>
