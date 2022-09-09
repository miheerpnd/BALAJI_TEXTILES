<?php

require('../connection.php');


if(isset($_GET['id'])){
    $globelID = $_GET['id'];
}
else{
    $query = mysqli_query($mysql,"SELECT id FROM invoice ORDER BY id DESC LIMIT 1");
    $data = mysqli_fetch_array($query);
    $globelID = $data['id'];
}
$sqlQuery = mysqli_query($mysql,"SELECT * FROM setting");
$setting = mysqli_fetch_array($sqlQuery);
$sqlQuery1 = mysqli_query($mysql,"SELECT * FROM invoice where id = '$globelID'");
$invoice = mysqli_fetch_array($sqlQuery1);

?>


<div class="row">
<div class="col">
    <input type="hidden" id="print_chk_inp">
  <!-- Printing invoice template -->
  <div class="print"  id="print"  style="display: flex; justify-content: center; align-items: center;">
<div class="body bg-light"style="border-radius: px;">
<style>
.body{
    width: 670px;
    height: auto;
    background-color: white;
    padding: 10px;
    line-height: 0.7;
    font-size: 12px;
}
td{
    border: 0;
    padding-top: 0;
    padding-bottom: 0;
}
tr{
    margin: 0;
    padding: 0;
}
</style>
<div class="text-center">
<b><?=$setting['title1']?></b>
</div>
<div class="row" style="line-height: 2;">
<div class="col-3" style="text-align: left; padding-left: 25px;">
<b>CASH</b>
</div>
<div class="col-6" style="text-align: center;">
<?=$setting['title2']?>
</div>
<div class="col-3" style="text-align: right;">
</div>
</div>
<div class="text-center">
<b>ESTIMATE/ORDER</b>
</div>
<table class="table" style="margin-top: 10px;">
<tr>
    <td style="border-top: 2px black solid; border-right: 2px black solid;" colspan="5">Name: <b><?=$invoice['c_name']?></b></td>
    <td style="text-align: right; border-top: 2px black solid;" colspan="3"><b>Bill No. <?=$invoice['id']?></b></td>
</tr>
<tr><td style="border-right: 2px black solid;" colspan="5">Place: <b><?=$invoice['c_address']?></b></td>
    <td style="text-align: right;" colspan="3">Date: <b><?=$invoice['show_date']?></b></td>
</tr>
<tr>
<td style="border-right: 2px black solid; border-bottom: 2px black solid;" colspan="5">Phone: <b><?=$invoice['c_mob']?></b></td>
<td style="text-align: right; border-bottom: 2px black solid;" colspan="3">Time: <?=$invoice['time']?></td>
</tr>
<tr>
    <td style="border-bottom: 2px black solid; border-right: 2px black solid;">
        <b>SN</b>
    </td>
    <td style="border-bottom: 2px black solid; border-right: 2px black solid;">
        <b>Item</b>
    </td>
    <td colspan="3" style="border-bottom: 2px black solid; border-right: 2px black solid;">
        <b>Merchant No</b>
    </td>
    <td style="border-bottom: 2px black solid; border-right: 2px black solid; text-align: center;">
        <b>Qty</b>
    </td>
    <td style="border-bottom: 2px black solid; border-right: 2px black solid; text-align: right;">
        <b>RATE</b>
    </td>
    <td style="border-bottom: 2px black solid; text-align: right;">
        <b>AMOUNT</b>
    </td>
</tr>
<?php
$i = 1;
$item = 0;
$gross = 0;
$qrt = mysqli_query($mysql,"SELECT * FROM invoice_data where join_id = '$globelID'");
while($data = mysqli_fetch_array($qrt)){


echo '  <tr>    
<td style="border-bottom: 2px dashed lightgray; border-right: 2px black solid;">
'.$i.'
</td>
<td style="border-bottom: 2px dashed lightgray; border-right: 2px black solid;">
'.$data['item'].'
</td>
<td colspan="3" style="border-bottom: 2px dashed lightgray; border-right: 2px black solid;">
('.$data["join_id"]."-".$data["id"]."-".$data["unit"].')
</td>
<td style="border-bottom: 2px dashed lightgray; border-right: 2px black solid; text-align: center;">
'.$data['qty'].'
</td>
<td style="border-bottom: 2px dashed lightgray; border-right: 2px black solid; text-align: right;">
'.sprintf('%0.2f', $data['rate']).'
</td>
<td style="border-bottom: 2px dashed lightgray; text-align: right;">
'.sprintf('%0.2f', $data['total']).'
</td>
</tr>';
$i++;
$gross = $gross + $data['total'];
$item++;
}



?>
<?php
if($i < 15){
    for($l = $i;$l<15;$l++){
        echo '<tr>
        <td style="border-bottom: 2px dashed lightgray; border-right: 2px black solid;">
            '.$l.'
        </td>
        <td style="border-bottom: 2px dashed lightgray; border-right: 2px black solid;">
            
        </td>
        <td colspan="3" style="border-bottom: 2px dashed lightgray; border-right: 2px black solid;">
            
        </td>
        <td style="border-bottom: 2px dashed lightgray; border-right: 2px black solid; text-align: center;">
            
        </td>
        <td style="border-bottom: 2px dashed lightgray; border-right: 2px black solid; text-align: right;">
            
        </td>
        <td style="border-bottom: 2px dashed lightgray; text-align: right;">
            
        </td>
    </tr>';
}

echo '        <tr>
<td style="border-bottom: 2px solid black; border-right: 2px black solid;">
'.$l.'
</td>
<td style="border-bottom: 2px solid black; border-right: 2px black solid;">

</td>
<td colspan="3" style="border-bottom: 2px solid black; border-right: 2px black solid;">

</td>
<td style="border-bottom: 2px solid black; border-right: 2px black solid; text-align: center;">

</td>
<td style="border-bottom: 2px solid black; border-right: 2px black solid; text-align: right;">

</td>
<td style="border-bottom: 2px solid black; text-align: right;">

</td>
</tr>';

}else{
    echo '        <tr>
    <td style="border-bottom: 2px solid black; border-right: 2px black solid;">
        '.($i).'
    </td>
    <td style="border-bottom: 2px solid black; border-right: 2px black solid;">
        
    </td>
    <td colspan="3" style="border-bottom: 2px solid black; border-right: 2px black solid;">
        
    </td>
    <td style="border-bottom: 2px solid black; border-right: 2px black solid; text-align: center;">
        
    </td>
    <td style="border-bottom: 2px solid black; border-right: 2px black solid; text-align: right;">
        
    </td>
    <td style="border-bottom: 2px solid black; text-align: right;">
        
    </td>
</tr>';
}

?>

<tr>
<td style="border-bottom: 2px black solid; border-right: 2px black solid;">
        <b>SALERET</b=>
    </td>
    <td style="border-bottom: 2px black solid; border-right: 2px black solid;">
        <b>Packing</b>
    </td>
    <td style="border-bottom: 2px black solid; border-right: 2px black solid;">
        <b>Coolie</b>
    </td>
    <td style="border-bottom: 2px black solid; border-right: 2px black solid;">
        <b>Oth</b>
    </td>
    <td style=" border-right: 2px black solid;">
        <b>Total</b>
    </td>
    <td style="border-bottom: 2px black solid; border-right: 2px black solid; text-align: right;" colspan="2">
        <b>GROSS</b>
    </td>
    <td style="border-bottom: 2px black solid; text-align: right;">
        <?=sprintf('%0.2f',$gross)?>
    </td>
</tr>
<tr>
<td style="border-bottom: 2px black solid; border-right: 2px black solid;">
        <?=sprintf('%0.2f',$invoice['seleret'])?>
    </td>
    <td style="border-bottom: 2px black solid; border-right: 2px black solid;">
    <?=sprintf('%0.2f',$invoice['packing'])?>
    </td>

    <td style="border-bottom: 2px black solid; border-right: 2px black solid;">
    <?=sprintf('%0.2f',$invoice['coolie'])?>
    </td>

    <td style="border-bottom: 2px black solid; border-right: 2px black solid;">
    <?=sprintf('%0.2f',$invoice['oth'])?>
    </td>
    <td style="border-bottom: 2px black solid; border-right: 2px black solid;">
    <b><?=$item?></b>
    </td>

    <td style="border-bottom: 2px black solid; border-right: 2px black solid; text-align: right;" colspan="2">
        TOTAL ADD
    </td>

    <td style="border-bottom: 2px black solid; text-align: right;">
        <?=sprintf('%0.2f', $invoice['total_add'])?>
    </td>
</tr>
<tr>
<td style="border-bottom: 2px black solid; border-right: 2px black solid;">
        
    </td>
    <td style="border-bottom: 2px black solid; border-right: 2px black solid;">
        
    </td>

    <td style="border-bottom: 2px black solid; border-right: 2px black solid;">
        
    </td>

    <td style="border-bottom: 2px black solid; border-right: 2px black solid;">
        
    </td>
    <td style="border-bottom: 2px black solid; border-right: 2px black solid;">
    R/Off
    </td>

    <td style="border-bottom: 2px black solid; border-right: 2px black solid; text-align: right;" colspan="2">
        TOTAL LESS
    </td>

    <td style="border-bottom: 2px black solid; text-align: right;">
    <?=sprintf('%0.2f', $invoice['total_less'])?>
    </td>
</tr>
<tr>
<td style="border-bottom: 2px black solid; border-right: 2px black solid;">
        
    </td>
    <td style="border-bottom: 2px black solid; border-right: 2px black solid;">
        
    </td>

    <td style="border-bottom: 2px black solid; border-right: 2px black solid;">
        
    </td>

    <td style="border-bottom: 2px black solid; border-right: 2px black solid;">
        
    </td>
    <td style="border-bottom: 2px black solid; border-right: 2px black solid;">
    <?php
    $ego = explode('.',sprintf('%0.2f',$invoice['net_worth']));
    echo ".".$ego[1];
    ?>
    </td>

    <td style=" border-right: 2px black solid; text-align: right;" colspan="2">
    </td>

    <td style=" text-align: right;">
        
    </td>
</tr>
<tr>
<td style=" border-right: 2px black solid;" colspan="5">
<?php echo '<b>'.convertNumber($invoice['net_worth']).'rupees only</b>'; ?>
    </td>


    <td style=" border-right: 2px black solid; text-align: center;" colspan="2">
        <b>NET PAYABLE</b>
    </td>

    <td style=" text-align: right;">
        <b><?=sprintf('%0.0f',$invoice['net_worth'])?></b>
    </td>
</tr>
<tr>
<td style="border-bottom: 2px black solid; border-right: 2px black solid;" colspan="5">
        
    </td>


    <td style="border-bottom: 2px black solid; border-right: 2px black solid; text-align: right;" colspan="2">
        
    </td>

    <td style="border-bottom: 2px black solid; text-align: right;">
        
    </td>
</tr>
<tr>
  <td colspan="8"></td>
</tr>
<tr>
  <td colspan="8"></td>
</tr>
<tr>
  <td colspan="8"></td>
</tr>
<tr>
  <td colspan="8" style="text-align: right; margin-top: 20px; font-size: 13px;">Authority Signatory</td>
</tr>


</table>

</div>
</div>
  <!-- Printing invoice template -->
</div>
</div>




<?php
function convertNumber($num = false)
{
    $num = str_replace(array(',', ''), '' , trim($num));
    if(! $num) {
        return false;
    }
    $num = (int) $num;
    $words = array();
    $list1 = array('', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'eleven',
        'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'
    );
    $list2 = array('', 'ten', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety', 'hundred');
    $list3 = array('', 'thousand', 'million', 'billion', 'trillion', 'quadrillion', 'quintillion', 'sextillion', 'septillion',
        'octillion', 'nonillion', 'decillion', 'undecillion', 'duodecillion', 'tredecillion', 'quattuordecillion',
        'quindecillion', 'sexdecillion', 'septendecillion', 'octodecillion', 'novemdecillion', 'vigintillion'
    );
    $num_length = strlen($num);
    $levels = (int) (($num_length + 2) / 3);
    $max_length = $levels * 3;
    $num = substr('00' . $num, -$max_length);
    $num_levels = str_split($num, 3);
    for ($i = 0; $i < count($num_levels); $i++) {
        $levels--;
        $hundreds = (int) ($num_levels[$i] / 100);
        $hundreds = ($hundreds ? ' ' . $list1[$hundreds] . ' hundred' . ( $hundreds == 1 ? '' : '' ) . ' ' : '');
        $tens = (int) ($num_levels[$i] % 100);
        $singles = '';
        if ( $tens < 20 ) {
            $tens = ($tens ? ' and ' . $list1[$tens] . ' ' : '' );
        } elseif ($tens >= 20) {
            $tens = (int)($tens / 10);
            $tens = ' and ' . $list2[$tens] . ' ';
            $singles = (int) ($num_levels[$i] % 10);
            $singles = ' ' . $list1[$singles] . ' ';
        }
        $words[] = $hundreds . $tens . $singles . ( ( $levels && ( int ) ( $num_levels[$i] ) ) ? ' ' . $list3[$levels] . ' ' : '' );
    } //end for loop
    $commas = count($words);
    if ($commas > 1) {
        $commas = $commas - 1;
    }
    $words = implode(' ',  $words);
    $words = preg_replace('/^\s\b(and)/', '', $words );
    $words = trim($words);
    $words = ucfirst($words);
    $words = $words . " ";
    return $words;
}?>