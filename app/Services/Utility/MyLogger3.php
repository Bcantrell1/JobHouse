<?php

/*
 * Project Name: Milestone 7
 * Version: 7.0
 * Programmers: Brian Cantrell
 * Date: 4/30/2021
 */


namespace App\Services\Utility;

use Illuminate\Support\Facades\Log;

class MyLogger3 implements ILoggerService
{
    function getLogger()
    {
        
    }
    public  function debug($message, $data=array())
    {
        Log::debug($message . (count($data) != 0 ? 'with data of ' . print_r($data, true) : ""));
    }
    public  function info($message, $data=array())
    {
        Log::info($message . (count($data) != 0 ? 'with data of ' . print_r($data, true) : ""));
    }
    public  function warning($message, $data=array())
    {
        Log::warning($message . (count($data) != 0 ? 'with data of ' . print_r($data, true) : ""));
    }
    public  function error($message, $data=array())
    {
        Log::error($message . (count($data) != 0 ? 'with data of ' . print_r($data, true) : ""));
    }
}