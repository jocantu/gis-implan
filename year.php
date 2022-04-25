<!-- Small while loop to return year options for register form. -->

<?php
    $year = intval(date("Y"));
    $n = 100;
    while($n >= 0) {
        echo "<option value='".$year."'>".$year."</option>";
        $n--;
        $year--;
    }
?>