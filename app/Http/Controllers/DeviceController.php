<?php

namespace App\Http\Controllers;

use App\Http\Controllers\api\TraccarApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DeviceController extends Controller
{
    protected $traccarApiUrl;
    protected $username;
    protected $password;

    public function __construct()
    {
        $this->traccarApiUrl = env('TRACCAR_API_URL');
        $this->username = env('TRACCAR_USERNAME');
        $this->password = env('TRACCAR_PASSWORD');
    }

    public function index(Request $request)
    {
        $controller = new TraccarApiController();
        $thisSession = $controller->session($request);
        $session = json_decode($thisSession->content());
        $dataUsers =  $controller->usersById($session->id, $request);
        $users = $dataUsers->getData();
        return view('master.device.index', compact('users', 'session'));
    }
    public function create()
    {
        return view('master.device.create');
    }
    public function store(Request $request)
    {
        $token = $request->cookie('JSESSIONID');
        $formData = [
            'name' => 'STARGPS',
            'uniqueId' => $request->input('imei'),
            'model' => $request->input('model')
        ];
        $response = Http::withHeaders([
            'Cookie' => 'JSESSIONID=' . $token,
        ])->post($this->traccarApiUrl . '/devices', $formData);
        $data = $response->json();

        $permissions = [
            "userId" => $request->input('user'),
            "deviceId" => $data['id'],
        ];

        $session = Http::withHeaders([
            'Cookie' => 'JSESSIONID=' . $token,
        ])->get($this->traccarApiUrl . '/session');

        $sessionResponse = $session->json();
        $sessionId = $sessionResponse['id'];
        $deletePermissions = [
            "userId" => $sessionId,
            "deviceId" => $data['id']
        ];

        $responsess = Http::withHeaders([
            'Cookie' => 'JSESSIONID=' . $token,
        ])->delete($this->traccarApiUrl . '/permissions', $deletePermissions);
        $responses = Http::withHeaders([
            'Cookie' => 'JSESSIONID=' . $token,
        ])->post($this->traccarApiUrl . '/permissions', $permissions);

        return redirect()->back();
    }
    public function destroy($device, Request $request)
    {
        $token = $request->cookie('JSESSIONID');
        $response = Http::withHeaders([
            'Cookie' => 'JSESSIONID=' . $token,
        ])->delete($this->traccarApiUrl . '/devices' . '/' . $device);
        return response($response);
    }
}
