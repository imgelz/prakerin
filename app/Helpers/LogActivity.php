<?php

namespace App\Helpers;
use Request;
use App\LogActivity as LogActivityModel;


class LogActivity
{


    public static function addToLog($subject)
    {
    	$log = [];
    	$log['subject'] = $subject;
    	$log['url'] = Request::fullUrl();
    	$log['method'] = Request::method();
    	$log['ip'] = Request::ip();
    	$log['agent'] = Request::header('user-agent');
    	$log['user_name'] = auth()->user()->name;
    	LogActivityModel::create($log);
    }


    public static function logActivityLists()
    {
    	return LogActivityModel::latest()->get();
    }


}