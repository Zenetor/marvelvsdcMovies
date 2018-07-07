<?php

function pearson_correlation($x, $y) {
    if (count($x) !== count($y)) {
        return -1;
    }
    $x = array_values($x);
    $y = array_values($y);
    $xs = array_sum($x) / count($x);
    $ys = array_sum($y) / count($y);
    $a = 0;
    $bx = 0;
    $by = 0;
    for ($i = 0; $i < count($x); $i++) {
        $xr = $x[$i] - $xs;
        $yr = $y[$i] - $ys;
        $a += $xr * $yr;
        $bx += pow($xr, 2);
        $by += pow($yr, 2);
    }
    $b = sqrt($bx * $by);
    return $a / $b;
}

function variance($a) {
    //variable and initializations
    $the_standard_deviation = 0.0;
    $the_variance = 0.0;
    $the_mean = 0.0;
    $the_array_sum = array_sum($a); //sum the elements
    $number_elements = count($a); //count the number of elements
    $the_mean = $the_array_sum / $number_elements;
    for ($i = 0; $i < $number_elements; $i++) {
        //sum the array
        $the_variance = $the_variance + ($a[$i] - $the_mean) * ($a[$i] - $the_mean);
    }

    $the_variance = $the_variance / $number_elements;

    return $the_variance;
}

function standard_deviation_population($a) {
    $the_variance = variance($a);
    return pow($the_variance, 0.5);
}

function the_mean($a) {
    $the_array_sum = array_sum($a);
    $number_elements = count($a);
    return ($the_array_sum / $number_elements);
}

function get_databyfranchise(string $franchise) {
    include ( ROOT_PATH . "/functions/connectionDB.php");
    $SQLG = 'SELECT * FROM `filmes2` WHERE filmes2.franquia = \'' . $franchise . '\'';
    $resultadoG = $pcon->query($SQLG) OR trigger_error($pcon->error, E_USER_ERROR);
    $arrayG = array();
    while ($row = $resultadoG->fetch_assoc()) {
        $arrayG[]= $row;
    }
    $resultadoG->free();
    return $arrayG;
}
