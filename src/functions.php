<?php

//task1 - вариант 1 (рекурсия)

echo "<h2>Задание № 1 (Путем рекурсии)</h2>";

function task1($xmlData)
{
    foreach ($xmlData as $key => $value) {
        if ($value->count() < 1) {
            echo $key , ' : ', $value->__toString(), '<br>';
        } else {
            echo $key, ' : ', '<br>';
            task1($value);
        }


    }
}

task1(simplexml_load_file('data.xml'));


//task1 - вариант 2


echo "<h2>Задание № 1 (Путем foreach)</h2>";

function task1B($getData)
{

    echo '<h3>', $getData->getName(), '</h3>';
    echo 'PurchaseOrderNumber', ' : ', (string)$getData["PurchaseOrderNumber"], '<br><br>';
    echo 'OrderDate', ' : ', (string)$getData["OrderDate"], '<br><br>';

    foreach ($getData as $key => $item) {
        if ($key != "Items") {
            echo '<h2>', (string)$item->attributes()->Type, '</h2>', '<br>', $item->getName(), ' : ', (string)$item, '<br>'  ;
            foreach ($item as $value) {
                echo $value->getName(), ' : ', (string)$value, '<br>';
            }
            echo '<br>';
        } elseif ($key == "Items") {
            foreach ($item as $value) {
                foreach ($value as $v) {
                    echo $v->getName(), ' : ', (string)$v . '<br>';
                }
                echo '<br>';
            }
        }
    }
}

task1B(simplexml_load_file('data.xml'));



//task2



function createJSON()
{
    $data = [
        [
            1,
            2,
            3,
            4,
        ],
        [
            11,
            22,
            33,
            44,
        ]
    ];


    $createData = json_encode($data);
    file_put_contents('my.json', $createData);

}

createJSON();


function createNewJSON()
{
    $data = file_get_contents('my.json');
    $decoded = json_decode($data);

    $rand = rand(0, 1);

    if ($rand == 1) {
        array_push($decoded, 11);
    }

    $createData = json_encode($decoded);
    file_put_contents('my2.json', $createData);
}

createNewJSON();



function resultJSON()
{
    $data = file_get_contents('my.json');
    $original = json_decode($data);

    $data2 = file_get_contents('my2.json');
    $newArray = json_decode($data2);

    if (sizeof($original) != sizeof($newArray)) {
        return "В массиве стало больше параметров";
    }

    foreach ($original as $key => $value) {
        if (!isset($newArray [$key]) || $newArray[$key] != $value) {
            return "В массиве изменились ключи";
        }
    }
    return "Массивы остались такими же";

}






//task3

function createCSV()
{
    $arr = [];

    for ($i = 0; $i < 51; $i++) {
        $arr[] = rand($i, 100);
    }

    $fp = fopen('./test.csv', 'w');
    fputcsv($fp, $arr, ';');

    fclose($fp);
}

createCSV();


function sumFromCSV()
{
    $csvPath = './test.csv';
    $csvFile = fopen($csvPath, "r");
    $csvData = fgetcsv($csvFile, 200, ";");

    $count = 0;

    foreach ($csvData as $key => $value) {
        if ($value % 2 == 0) {
             $count += $value;
        }
    }

    return 'Сумма все четных чиселе в аргумента равна - ' . $count;
}


//task4

function jsonWiki()
{
    $data = file_get_contents('https://en.wikipedia.org/w/api.php?action=query&titles=Main%20Page&prop=revisions&rvprop=content&format=json');

    $decoded = json_decode($data, true);

    $params = ["title", "pageid"];

    $result = array_shift($decoded["query"]["pages"]);

//  print_r($result);

    foreach ($params as $value) {
        echo "<br>" . $value . " = " . $result[$value];
    }
}
