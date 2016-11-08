<?php

/* 
 * The Following Content is The demo of a web page 
 * It is done using bare PHP  * 
 * It is owned by DUC LIEM NGUYEN  * 
 * Reachable at cyberliem.civil@gmail.com  * 
 */

 function cleanInputs($data) {
        $clean_input = Array ();
        if (is_array($data)) {
            foreach ($data as $k => $v) {
                $clean_input[$k]= cleanInputs($v);
            }
        }
        else {
            $clean_input= trim(strip_tags($data));
        }
        return $clean_input;
    }