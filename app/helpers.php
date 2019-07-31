<?php

function test_helper()
{
    echo 'test';
}

function route_class()
{
    return str_replace('.', '-', Route::currentRouteName());
}
