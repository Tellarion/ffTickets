<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

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

    public function sendTicket() {
        //$getTickets = $this->db->table('tickets')->orderBy('status', 'DESC')->get();
        $array = array(
            "status" => true,
            "data" => null
        );

        return json_encode($array);
    }

}
