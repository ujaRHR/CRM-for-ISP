<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\Subscription;
use App\Models\Customer;
use App\Models\Admin;
use App\Models\Notice;
use App\Models\Staff;
use App\Models\Task;
use App\Models\Ticket;
use App\Models\Order;
use NunoMaduro\Collision\Adapters\Phpunit\Subscribers\Subscriber;
use App\Mail\OTPMail;
use Illuminate\Support\Facades\Mail;

class TestController extends Controller
{
    public function testFunc(Request $request)
    {
        Mail::to("reajulhasanraju10@gmail.com")->send(new OTPMail(635482));
    }
}
