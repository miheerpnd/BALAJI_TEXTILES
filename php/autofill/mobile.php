<?php
$term = $_GET['term'];

require('../connection.php');
$query = mysqli_query($mysql,"SELECT DISTINCT c_mob,c_name,c_address FROM invoice where c_mob LIKE '%$term%' LIMIT 10");
$i = 0;
echo '[';
while($data = mysqli_fetch_array($query)){
    echo '
    {
        "label":"'.$data['c_mob'].'",
        "name":"'.$data['c_name'].'",
        "add":"'.$data['c_address'].'"
    },';
$i++;
}
echo '
        {
            "label":"'.$term.'",
            "name":"",
            "add":""
        }
    ';
echo ']';