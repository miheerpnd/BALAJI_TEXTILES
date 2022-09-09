<?php
$term = $_GET['term'];

require('../connection.php');
$query = mysqli_query($mysql,"SELECT DISTINCT c_name FROM invoice where c_name LIKE '%$term%' LIMIT 10");
$i = 0;
echo '[';
while($data = mysqli_fetch_array($query)){
    echo '
    {
        "label":"'.$data['c_name'].'"
    },';
$i++;
}
echo '
        {
            "label":"'.$term.'"
        }
    ';
echo ']';