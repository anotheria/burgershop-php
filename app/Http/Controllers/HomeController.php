<?php

namespace App\Http\Controllers;

use Anotheria\MoskitoPHPAgent\producers\impl\ServiceOrientedProducer;

class HomeController
{

    public function index()
    {

        $serviceProducer = new ServiceOrientedProducer('service', 'php', 'php');
        $executionWatcher = $serviceProducer->getWatcher('sample-execution');
        $executionWatcher->start();
        // Some long executing stuff
        sleep(3);
        $executionWatcher->end();

        return view('index');
    }

}