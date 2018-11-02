<?php

function presentPrice($price)
{
    //return money_format('$%i', $price / 100);
    return sprintf('$%01.2f', $price / 100); // replace money_format() function which doesn't exists on windows systems
}

function setActiveCategory($category, $output = 'active')
{
    return request()->category == $category ? $output : '';
}

function productImage($path)
{
    return $path && file_exists('storage/'.$path) ? asset('storage/'.$path) : asset('img/not-found.jpg');
}
