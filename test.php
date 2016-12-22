<?php


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$data = '45$Qr87$482d'; 

foreach (hash_algos() as $v) { 
        $r = hash($v, $data, false); 
        print('<pre>');
        printf("%-12s %3d %s\n", $v, strlen($r), $r); 
        print('</pre>');
} 


?>
