<?php


function breadcrumb($array=[])
{
    $data = $array;
    return view('partials.breadcrumb', compact('data'))->render();
}