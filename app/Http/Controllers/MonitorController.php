<?php

namespace App\Http\Controllers;

use App\Http\Controllers\api\TraccarApiController;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MonitorController extends Controller
{
    public function index(Request $request)
    {

        $controller = new TraccarApiController();
        $thisSession = $controller->session($request);
        $session = json_decode($thisSession->content());
        $dataUsers =  $controller->usersById($session->id, $request);
        $users = $dataUsers->getData();
        $dataDevices =  $controller->devices();
        $devices = $dataDevices->getData();
        $token = $request->cookie('JSESSIONID');
        $now = Carbon::now();
        return view('master.monitor.index', compact('users', 'devices', 'token', 'now', 'session'));
    }
}
