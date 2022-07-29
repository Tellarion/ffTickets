<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Tickets;

use DB;

class Api extends BaseController
{
    public $redis = 0;

    public $act, $webdata;

    public function __construct() {
        $this->middleware(function ($request, $next) {
            return $next($request);
        });
    }

    public function getTickets() {
        $getTickets = Tickets::orderBy('status', 'DESC')->get();
        return json_encode($getTickets);
    }

    public function ansTicket() {

    }

    public function sendTicket(Request $request) {

        $validated = $request->validate([
            'name' => 'required|alpha|min:3|max:30',
            'email' => 'required|email|min:5|max:30',
            'message' => 'required|min:10|max:255'
        ]);

        $name = $request->input('name');
        $email = $request->input('email');
        $message = strip_tags($request->input('message'));

        Tickets::insert(['name' => $name, 'email' => $email, 'status' => 'Active', 'message' => $message, 'timeleft_at' => 0]);

        $array = array(
            "status" => true,
            "data" => null
        );

        return json_encode($array);
    }

}
