<?php

/**
 * The function accepts a string of comma-separated
 * integers and returns a string of ranges.
 * I assume that the values are always integers and sorted in ascending order.
 * @param <string> $str_range A string of comma-separated integers
 * @return <string> A string of ranges
 */

function format_ranges($str_range) {
    $arr_range = explode(' ', $str_range);
    $arr_range = array_map('trim', $arr_range);
    $arr_range = array_map('intval', $arr_range);

    $formatted_range = strval($arr_range[0]);

    for($i = 1; $i < count($arr_range); $i++) {
        if($arr_range[$i] - $arr_range[$i - 1] == 1) {
            $formatted_range = substr($formatted_range, 0, -1) . '-' . strval($arr_range[$i]);
        } else {
            $formatted_range .= ', ' . strval($arr_range[$i]);
        }
    }
}

assert(format_ranges("1 2 3 5 6 8") == "1-3, 5-6, 8");
assert(format_ranges("1 2 3 4 5 6 7 8") == "1-8");
assert(format_ranges("1 2 3 4 5 6 8") == "1-6, 8");
assert(format_ranges("1 3 5 7 9") == "1, 3, 5, 7, 9");