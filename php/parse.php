<?php
$i = 0;
$html = file_get_contents('http://vak.ed.gov.ru/news');
preg_match_all('|<section class="portlet"[^>]*>(.*?)</section>|is', $html, $matches);
 
foreach (array_slice($matches[1], 0, 10) as $item) {
    preg_match('#<span class="portlet-title-text">(.+?)</span>#is', $item, $m);
    echo $m[1], "<br>";
    preg_match('#<div class="journal-content-article"[^>]*>(.+?)</div>#is', $item, $m);
    echo $m[1], "<br>";
}