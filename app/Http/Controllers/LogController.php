<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;
use Illuminate\Support\Carbon;

class LogController extends Controller {
    public function show($id) {
       return view('log', [
           'log' => Log::where('_id', '=', $id)->first()
       ]);
    }

    public function store(Request $request) {
        $message = $request->message;
        $token = $request->token;
        $isValid = isset($message) && $message != "" && isset($token) && $token != "";
        
        if ($isValid) {
            $log = new Log;

            $log->timestamp = $request->timestamp ?? Carbon::now()->format('d/m/Y H:i:s');
            $log->sender = $request->sender;
            $log->label = $request->label ?? "Log";
            $log->context = $request->context;
            $log->message = $message;
            $log->token = $token;
            
            $log->save();

            return response()->json(["result" => "ok", "id" => $log->id ], 201);
        }

        return response()->json(["result" => "Invalid format"], 422);
    }

    public function destroy($id) {
        $log = Log::find($id);
        $log->delete();

        return response()->json(["result" => "ok"], 200);       
    }
}
