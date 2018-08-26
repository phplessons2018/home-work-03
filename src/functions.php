<?php

$file = file_get_contents('data.xml');

$getData = new SimpleXMLElement($file);

//print_r($getData);

echo '<h1>'. $getData->getName() . '</h1>';
echo 'PurchaseOrderNumber' . ' : ' . (string)$getData["PurchaseOrderNumber"] . '<br><br>';
echo 'OrderDate' . ' : ' . (string)$getData["OrderDate"] . '<br><br>';

foreach ($getData as $key => $item) {
    if ($key != "Items") {
        echo '<h2>'. (string)$item->attributes()->Type . '</h2>' . '<br>' . $item->getName() . ' : ' . (string)$item . '<br>'  ;
        foreach ($item as $value) {
            echo $value->getName() . ' : ' . (string)$value . '<br>';
        }
        echo '<br>';
    } elseif ($key == "Items") {
        foreach ($item as $value) {
            foreach ($value as $v) {
                echo $v->getName() . ' : ' . (string)$v . '<br>';

            }
            echo '<br>';

        }
    }
}



//task2



function createJSON ()
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

createJSON ();




function createNewJSON ()
{
    $data = file_get_contents('my.json');
    $decoded = json_decode($data);



    $rand = rand(0, 1);

    if ($rand == 1) {
        array_push($decoded, 11);
        $createData = json_encode($decoded);
    } else {
        $createData = json_encode($decoded);
    }

//    print_r($createData);

    file_put_contents('my2.json', $createData);
}

createNewJSON ();




function resultJSON () {
    $data = file_get_contents('my.json');
    $decoded = json_decode($data);

    $data2 = file_get_contents('my2.json');
    $decoded2 = json_decode($data2);

    $result = array_diff_assoc($decoded, $decoded2);

//    echo 'Результат разницы двух массивов - ' . $result;

}

resultJSON ();



//task3

//function random_array($n, $min = 0, $max = 100) {
//    return array_map(function() use ($min, $max) { return mt_rand($min, $max); }, range(1, $n));
//
//
//}
//
//var_dump(random_array(50));