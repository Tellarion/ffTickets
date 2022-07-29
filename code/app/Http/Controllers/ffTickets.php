<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class ffTickets extends BaseController {

    public function indexMain() {
        return view('pages.main', []);
    }

    public function listTickets() {
        return view('pages.list', []);
    }

}