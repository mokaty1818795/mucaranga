<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use App\Http\Requests\StoreRegistrationRequest;
use App\Http\Requests\UpdateRegistrationRequest;
use App\Models\Student;

class RegistrationPaymentController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRegistrationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRegistrationRequest $request,Student $student)
    {
       $invoice =  Registration::create($request->all());
        return view('dashboard.invoice.invoice')->with(['invoice' => $invoice,'student'=> $student]);
    }
}
