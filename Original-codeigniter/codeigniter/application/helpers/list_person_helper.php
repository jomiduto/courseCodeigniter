<?php

function list_person() {
    $CI = & get_instance();

    $personas = $CI->Persona->findAll();

    $ul = "<ul>";
    foreach ($personas as $key => $persona) {
        $ul .= "<li>$persona->nombre $persona->apellido</li>";
    }
    $ul .= "</ul>";
    //$ul = $ul . "</ul>";
    
    return $ul;
}
