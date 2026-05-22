<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\TestEnrollment;
use Illuminate\Support\Facades\Notification;


class TestEnrollmentController extends Controller
{
   public function sendTestNotification(){
    $user=User::first();
    $enrolmentData=[
        'body'=>'Congratulations! You just have been enrolled in our website!',
        'enrollment'=>'You are now officially a fire alien is this fireShip!',
        'url'=>url(''),
        'thankyou'=>'you have access of all the ships services'
    ];
    // dd($user);
    // $user->notify(new TestEnrollment ($enrolmentData));

   Notification::send($user, new TestEnrollment($enrolmentData));

   }
}
