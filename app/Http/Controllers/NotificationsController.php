<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function index()
    {
        auth()->user()->unreadNotifications->markAsRead();
        return view('notifications')->with('notifications', auth()->user()->notifications);
    }
}
