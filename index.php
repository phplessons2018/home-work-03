<?php

//$file = file_get_contents('data.xml');
//
//$getData = new SimpleXMLElement($file);
//
////print_r($getData);
//
//echo '<h1>'. $getData->getName() . '</h1>';
//echo 'PurchaseOrderNumber' . ' : ' . (string)$getData["PurchaseOrderNumber"] . '<br><br>';
//echo 'OrderDate' . ' : ' . (string)$getData["OrderDate"] . '<br><br>';
//
//foreach ($getData as $key => $item) {
//    if ($key != "Items") {
//        echo '<h2>'. (string)$item->attributes()->Type . '</h2>' . '<br>' . $item->getName() . ' : ' . (string)$item . '<br>'  ;
//        foreach ($item as $value) {
//            echo $value->getName() . ' : ' . (string)$value . '<br>';
//    }
//        echo '<br>';
//    } elseif ($key == "Items") {
//        foreach ($item as $value) {
//            foreach ($value as $v) {
//                echo $v->getName() . ' : ' . (string)$v . '<br>';
//
//            }
//            echo '<br>';
//
//        }
//    }
//}



//task2

//1. Создайте массив, в котором имеется как минимум 1 уровень вложенности.
//Преобразуйте его в JSON. Сохраните как output.json
//2. Откройте файл output.json. Случайным образом, используя функцию rand(), решите
//изменять данные или нет. Сохраните как output2.json
//3. Откройте оба файла. Найдите разницу и выведите информацию об отличающихся
//элементах

function createJSON ()
{
    $data = [
      [
          1,
          2,
          3,
          4,
      ]
    ];


    $createData = json_encode($data);

}



