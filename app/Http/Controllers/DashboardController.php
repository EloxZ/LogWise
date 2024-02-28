<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;

class DashboardController extends Controller {
    function index(Request $request) {
        $hasToken = $request->has('token') && $request->get('token') != "";
        $hasLimit = $request->has('limit') && is_numeric($request->get("limit"));
        $logs = Log::query();
        
        if ($hasToken) {
            $logs->where('token', $request->input('token'));
            $logs->latest();

            if ($hasLimit) {
                $logs->take($request->get('limit'));
            }

            $logs = $logs->get();
        }

        return view("dashboard", ['logs' => $logs, 'hasToken' => $hasToken]);
    }
}
