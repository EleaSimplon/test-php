<?php

namespace App;

class TitleCaseGenerator
{
    function makeTitleCase($input_title)
    {
        $no_caps = strtolower($input_title);
        $input_array_of_words = explode(" ", $no_caps);
        $output_titlecased = array();

        $string = ucwords($no_caps);
        $prep = array(' a ', ' an ', ' the ', ' for ', ' and ', ' nor ', ' but ', ' or ', ' yet ', ' so ', ' such ', ' as ', ' at ', ' around ', ' by ', ' after ', ' along ', ' for ', ' from ', ' of ', ' on ', ' to ', ' with ', ' without ', ' is ');
        foreach($prep as $lower_case) {
            $string = str_replace(ucwords($lower_case), strtolower($lower_case), $string);
        }
        return ucfirst($string);

        foreach ($input_array_of_words as $word) {
            array_push($output_titlecased, ucfirst($word));
        }
        return implode(" ", $output_titlecased);
    }
}

$title_generator = new TitleCaseGenerator;
$title = $title_generator->makeTitleCase('simplon');
$title = $title_generator->makeTitleCase('sim plon');
$title = $title_generator->makeTitleCase('sim and plon');
$title = $title_generator->makeTitleCase('SIMPLON');