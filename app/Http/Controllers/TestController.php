<?php

namespace App\Http\Controllers;

class TestController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function handle()
    {
        $botman = resolve('botman');

        $botman->hears('Hi', function ($bot) {
            $bot->reply('Hello! i\'m MA Smart');
        });

        $botman->listen();
    }
}
