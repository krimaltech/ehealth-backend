<?php

namespace App\Traits;

trait engnep
{

    function ent_to_nepali_num_convert($number)
    {
        $eng_number = array(
            '0',
            '1',
            '2',
            '3',
            '4',
            '5',
            '6',
            '7',
            '8',
            '9'
        );
        $nep_number = array(
            '०',
            '१',
            '२',
            '३',
            '४',
            '५',
            '६',
            '७',
            '८',
            '९'
        );
        return str_replace($eng_number, $nep_number, $number);
    }
    function nep_to_eng_num_convert($number)
    {
        $eng_number = array(
            '0',
            '1',
            '2',
            '3',
            '4',
            '5',
            '6',
            '7',
            '8',
            '9'
        );
        $nep_number = array(
            '०',
            '१',
            '२',
            '३',
            '४',
            '५',
            '६',
            '७',
            '८',
            '९'
        );
        return str_replace($nep_number, $eng_number, $number);
    }
}