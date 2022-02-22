<?php

namespace App\Listeners;

use App\Events\StudentRegistered;
use App\Models\Account;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\CivilState;

class CreateStudentAccount
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\StudentRegistered  $event
     * @return void
     */
    public function handle(StudentRegistered $event)
    {
        return Account::create([
            'debt' => $event->student->veicle_class->price, 
            'current_balance' => 0,
            'payment_status' => 0,
            'student_id' => $event->student->id
        ]);
    }
}
