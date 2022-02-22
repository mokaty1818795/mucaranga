<?php

namespace App\Http\Controllers\Dashboard;

use App\Events\StudentRegistered;
use App\Http\Controllers\Controller;
use App\Models\Student as Registration;
use App\Http\Requests\StoreStudentRequest as StoreRegistrationRequest;
use App\Http\Requests\UpdateStudentRequest as UpdateRegistrationRequest;
use App\Models\CivilState;
use App\Models\VeicleClass;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.registration.create_edit')->with([
            'civil_states' => CivilState::all(),
            'veicle_classes' => VeicleClass::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreRegistrationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRegistrationRequest $request)
    {
        try {
            $registration =  Registration::create($request->all());
            session()->flash('success', 'Estudante matriculado com sucesso.');

            event(new StudentRegistered($registration));

           return redirect()->route('student.show',$registration);
       } catch (\Throwable $e) {
           throw $e;
           session()->flash('error', 'Erro ao realizar matricula.');
           return redirect()->back();
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function show(Registration $registration)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function edit(Registration $registration)
    {
       // dd($registration);
        return view('dashboard.registration.create_edit')->with([
            'civil_states' => CivilState::all(),
            'veicle_classes' => VeicleClass::all(),
            'registration' => $registration
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRegistrationRequest  $request
     * @param  \App\Models\Student  $registration
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRegistrationRequest $request, Registration $registration)
    {
        try {
            $registration->update($request->all());
            session()->flash('success', 'Estudante actualizado com sucesso.');
            return redirect()->route('student.show',$registration);
        } catch (\Throwable $e) {
            session()->flash('error', 'Erro na actualização do estudante.');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function destroy(Registration $registration)
    {

    }
}
