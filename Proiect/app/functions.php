<?php

function escape($text){
    return htmlspecialchars($text,ENT_QUOTES,'UTF-8');
}