<?php
$term = $_GET['term'];

require('../connection.php');
$query = mysqli_query($mysql,"SELECT DISTINCT c_address FROM invoice where c_address LIKE '%$term%' LIMIT 5");
$i = 0;
echo '[';
while($data = mysqli_fetch_array($query)){
    echo '
    {
        "label":"'.$data['c_address'].'"
    },';
$i++;
}
echo '
        {
            "label":"'.$term.'"
        }
    ';
echo ']';