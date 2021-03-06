<?php

namespace App\Http\Controllers;

use ElephantIO;
use Illuminate\Http\Request;

use App\Http\Requests;

class TestController extends Controller
{


    public function index(){
        $elephant = new Elephant('http://localhost:8000', 'socket.io', 1, false, true, true);

        $elephant->init();
        $elephant->send(
            ElephantIOClient::TYPE_EVENT,
            null,
            null,
            json_encode(array('name' => 'foo', 'args' => 'bar'))
        );
        $elephant->close();

        echo 'tryin to send `bar` to the event `foo`';

        return view('test');
    }


}
