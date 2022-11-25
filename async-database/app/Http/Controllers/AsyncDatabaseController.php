<?php


namespace App\Http\Controllers;


use App\Jobs\AsyncDatabaseJob;

class AsyncDatabaseController extends Controller
{
    public function asyncDatabase()
    {
        AsyncDatabaseJob::dispatch();
        return response()->json(true);
    }
}
