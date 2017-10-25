<?php
require('header.inc');
?>

<?php
$tireqty = $_POST['tireqty'];
$oilqty = $_POST['oilqty'];
$sparkqty = $_POST['sparkqty'];
$fio = $_POST['fio'];
$address = $_POST['address'];

$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
?>
<html>
<head>
    <title>Автозапчасти - Результаты заказа</title>
                                             
</head>
<body>
    <h1>Лаб 2 </h1>
    <h2>Автозапчасти </h2>            
    <h3>Результат заказа</h3>

<?php
    $totalqty = 0;
    $totalqty += $tireqty;
    $totalqty += $oilqty;
    $totalqty += $sparkqty;

    $totalamount = 0.00;

    define('TIREPRICE', 100);
    define('OILPRICE', 10);
    define('SPARKPRICE', 4);

    $date = date('H:i, jS F');

    echo '<p>Заказ обработан в';
    echo $date;
    echo '<br />';
    echo '<p>Список вашего заказа:';
    echo '<br />';

    if( $totalqty == 0)
    {
        echo 'Вы ничего не заказали на предыдущей странице!<br />';
    } 
    else
    {
        if ( $tireqty > 0)
        echo $tireqty. ' шт. А <br />';
        if ($oilqty>0)
        echo $oilqty. ' шт. Б <br />';
        if ($sparkqty>0)
        echo $sparkqty. ' шт. В <br />';
        
    }       
    $total = $tireqty * TIREPRICE + $oilqty * OILPRICE + $sparkqty * SPARKPRICE + $filqty * FILPRICE;
    $total = number_format($total, 2, '.' , ' ');

    echo '<P>Итого по заказу: $'.$total.'</p>';

    echo '<P>ФИО клиента: ' .$fio. '</p>';

    echo '<p>Адрес доставки: ' .$address. '<br/>';


    $outputstring = $date."\t".$tireqty." шт. А \t".$oilqty." шт. Б \t".$sparkqty." шт. В \t\$".$total."\t Адрес доставки товара: \t ".$address."\t ФИО клиента: ".$fio." \n";

    $fp = fopen("orders.txt", 'a');

    flock($fp, LOCK_EX);

    if (!$fp)
    {
        echo '<p><strong>В настоящий момент ваш запрос не может быть обработан. '.'Пожалуйста, попытайтесь позже.</strong></p></body></html>';
        exit;
    }

fwrite($fp, $outputstring);
flock($fp, LOCK_UN);
fclose($fp);
?>

<a href="vieworders_2.php"> Интерфейс персонала для просмотра заказов </a>

</body>
</html>

<?php
require('footer.inc');
?>
