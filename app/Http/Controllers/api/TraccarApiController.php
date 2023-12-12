<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TraccarApiController extends Controller
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
    public function server()
    {

        $response = Http::get("$this->traccarApiUrl/server");
        $data = $response->json();
        return response()->json($data);
    }
    public function devices()
    {
        $response = Http::withBasicAuth($this->username, $this->password)
            ->get("$this->traccarApiUrl/devices");

        $data = $response->json();
        return response()->json($data);
    }
    public function devicesById(Request $request)
    {
        $id = $request->input('id');
        $token = $request->cookie('JSESSIONID');
        $resultString = implode("&id=", $id);
        $resultString = "id=" . $resultString;
        $response = Http::withHeaders([
            'Cookie' => 'JSESSIONID=' . $token,
        ])->get("$this->traccarApiUrl/devices?$resultString");

        $data = $response->json();
        return response()->json($data);
    }
    public function devicesByUserId($id, Request $request)
    {
        $token = $request->cookie('JSESSIONID');
        $response = Http::withHeaders([
            'Cookie' => 'JSESSIONID=' . $token,
        ])->get("$this->traccarApiUrl/devices?userId=" . $id);

        $data = $response->json();
        return response()->json($data);
    }

    public function session(Request $request)
    {
        $token = $request->cookie('JSESSIONID');
        $response = Http::withHeaders([
            'Cookie' => 'JSESSIONID=' . $token,
        ])->get("$this->traccarApiUrl/session");

        return response($response);
        if ($response->successful()) {
            $data = $response->json();
            return response()->json($data);
        } else {
            $errorResponse = $response->json();
            return response()->json(['error' => $errorResponse], 400);
        }
    }

    public function sessionToken()
    {
        $response = Http::post("$this->traccarApiUrl/session/token");

        $data = $response->json();
        return response()->json($data);
    }
    public function sessionSocket()
    {
        $response = Http::get("$this->traccarApiUrl/socket");

        $data = $response->json();
        return response()->json($data);
    }
    public function sessionOpenidAuth()
    {
        $response = Http::withBasicAuth($this->username, $this->password)
            ->get("$this->traccarApiUrl/session/openid/auth");

        $data = $response->json();
        return response()->json($data);
    }
    public function sessionOpenidCallback()
    {
        $response = Http::withBasicAuth($this->username, $this->password)
            ->get("$this->traccarApiUrl/session/openid/callback");

        $data = $response->json();
        return response()->json($data);
    }
    public function groups()
    {
        $response = Http::withBasicAuth($this->username, $this->password)
            ->get("$this->traccarApiUrl/groups");

        $data = $response->json();
        return response()->json($data);
    }
    public function positions()
    {
        $response = Http::withBasicAuth($this->username, $this->password)
            ->get("$this->traccarApiUrl/positions");

        $data = $response->json();
        dd($data);
        return response()->json($data);
    }
    public function positionsById($id)
    {
        $response = Http::withBasicAuth($this->username, $this->password)
            ->get("$this->traccarApiUrl/positions?deviceId=" . $id);

        $data = $response->json();
        return response()->json($data[0]);
    }
    public function events()
    {
        $response = Http::withBasicAuth($this->username, $this->password)
            ->get("$this->traccarApiUrl/events");

        $data = $response->json();
        return response()->json($data);
    }
    public function reportsRoute()
    {
        $response = Http::withBasicAuth($this->username, $this->password)
            ->get("$this->traccarApiUrl/reports/route");

        $data = $response->json();
        return response()->json($data);
    }
    public function reportsSummary()
    {
        $response = Http::withBasicAuth($this->username, $this->password)
            ->get("$this->traccarApiUrl/reports/summary");

        $data = $response->json();
        return response()->json($data);
    }
    public function reportsTrips()
    {
        $response = Http::withBasicAuth($this->username, $this->password)
            ->get("$this->traccarApiUrl/reports/trips");

        $data = $response->json();
        return response()->json($data);
    }
    public function reportsStops()
    {
        $response = Http::withBasicAuth($this->username, $this->password)
            ->get("$this->traccarApiUrl/reports/stops");

        $data = $response->json();
        return response()->json($data);
    }
    public function notification()
    {
        $response = Http::withBasicAuth($this->username, $this->password)
            ->get("$this->traccarApiUrl/notifications");

        $data = $response->json();
        return response()->json($data);
    }
    public function notificationType()
    {
        $response = Http::withBasicAuth($this->username, $this->password)
            ->get("$this->traccarApiUrl/notifications/type");

        $data = $response->json();
        return response()->json($data);
    }
    public function geofences()
    {
        $response = Http::withBasicAuth($this->username, $this->password)
            ->get("$this->traccarApiUrl/geofences");

        $data = $response->json();
        return response()->json($data);
    }
    public function commands()
    {
        $response = Http::withBasicAuth($this->username, $this->password)
            ->get("$this->traccarApiUrl/commands");

        $data = $response->json();
        return response()->json($data);
    }
    public function commandsSend()
    {
        $response = Http::withBasicAuth($this->username, $this->password)
            ->get("$this->traccarApiUrl/commands/send");

        $data = $response->json();
        return response()->json($data);
    }
    public function commandsTypes()
    {
        $response = Http::withBasicAuth($this->username, $this->password)
            ->get("$this->traccarApiUrl/commands/types");

        $data = $response->json();
        return response()->json($data);
    }
    public function attributesComputed()
    {
        $response = Http::withBasicAuth($this->username, $this->password)
            ->get("$this->traccarApiUrl/attributes/computed");

        $data = $response->json();
        return response()->json($data);
    }
    public function drivers()
    {
        $response = Http::withBasicAuth($this->username, $this->password)
            ->get("$this->traccarApiUrl/drivers");

        $data = $response->json();
        return response()->json($data);
    }
    public function calendars()
    {
        $response = Http::withBasicAuth($this->username, $this->password)
            ->get("$this->traccarApiUrl/calendars");

        $data = $response->json();
        return response()->json($data);
    }
    public function statistics()
    {
        $response = Http::withBasicAuth($this->username, $this->password)
            ->get("$this->traccarApiUrl/statistics");

        $data = $response->json();
        return response()->json($data);
    }
    public function users(Request $request)
    {
        $token = $request->cookie('JSESSIONID');
        $response = Http::withHeaders([
            'Cookie' => 'JSESSIONID=' . $token,
        ])->get("$this->traccarApiUrl/users");
        $data = $response->json();
        return response()->json($data);
    }
    public function usersById($id, Request $request)
    {
        $token = $request->cookie('JSESSIONID');
        $response = Http::withHeaders([
            'Cookie' => 'JSESSIONID=' . $token,
        ])->get("$this->traccarApiUrl/users?userId=" . $id);
        $data = $response->json();
        return response()->json($data);
    }
    public function getmodel()
    {
        $jsonData = file_get_contents(public_path('storage/json/model.json'));
        $data = json_decode($jsonData);

        return response()->json($data);
    }
}
