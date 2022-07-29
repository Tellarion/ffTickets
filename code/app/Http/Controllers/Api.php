<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

use DB;

class Api extends BaseController
{
    public $db;
    public $redis = 0;

    public $act, $webdata;

    public function __construct() {
        $this->middleware(function ($request, $next) {
            $this->db = DB::connection('mysql');
            return $next($request);
        });
    }

    public function getTickets() {
        $getTickets = $this->db->table('tickets')->orderBy('status', 'DESC')->get();
        return json_encode($getTickets);
    }

    public function ansTicket() {
        //$getTickets = $this->db->table('tickets')->orderBy('status', 'DESC')->get();
        //return json_encode($getTickets);
    }

    public function sendTicket(Request $request) {
        //$getTickets = $this->db->table('tickets')->orderBy('status', 'DESC')->get();

        $validated = $request->validate([
            'name' => 'required|alpha|min:3|max:30',
            'email' => 'required|email|min:5|max:30',
            'message' => 'required|min:10|max:255'
        ]);

        $name = $request->input('name');
        $email = $request->input('email');
        $message = strip_tags($request->input('message'));

        $this->db->table('tickets')->insert(['name' => $name, 'email' => $email, 'status' => 0, 'message' => $message, 'timeleft' => 0]);

        $array = array(
            "status" => true,
            "data" => null
        );

        return json_encode($array);
    }

}
