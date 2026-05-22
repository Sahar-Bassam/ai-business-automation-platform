<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Vonage\Client;
use Vonage\Client\Credentials\Basic;
use Vonage\SMS\Message\SMS;


class SmsController extends Controller
{
public function index()
{
    try {
        $basic  = new Basic(env('VONAGE_KEY'), env('VONAGE_SECRET'));
        $client = new Client($basic);

        $message = new SMS('+962790670911', env('VONAGE_FROM'), 'Test SMS');
        $client->sms()->send($message);

        return "Message Sent!";
    } catch (\Exception $e) {
        return "Failed to send SMS: " . $e->getMessage();
    }
}

}
