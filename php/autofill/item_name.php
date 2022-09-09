<?php
$term = $_GET['term'];

require('../connection.php');
$query = mysqli_query($mysql,"SELECT DISTINCT item FROM invoice_data where item LIKE '%$term%' LIMIT 10");
$i = 0;
echo '[';
while($data = mysqli_fetch_array($query)){
    echo '
    {
        "label":"'.$data['item'].'"
    },';
$i++;
}
echo '
        {
            "label":"'.$term.'"
        }
    ';
echo ']';