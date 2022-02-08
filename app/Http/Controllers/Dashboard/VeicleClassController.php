<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\VeicleClass;
use App\Http\Requests\StoreVeicleClassRequest;
use App\Http\Requests\UpdateVeicleClassRequest;

class VeicleClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.veicle_class.index')->with('veicle_classes',VeicleClass::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.veicle_class.create_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVeicleClassRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVeicleClassRequest $request)
    {
        try {
             VeicleClass::create($request->all());
             session()->flash('success', 'Tipo de carta criada com sucesso.');
            return redirect()->route('veicle_class.index');
        } catch (\Throwable $e) {
            throw $e;
            session()->flash('error', 'Erro na criação do tipo de carta.');
            return redirect()->route('veicle_class.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VeicleClass  $veicleClass
     * @return \Illuminate\Http\Response
     */
    public function show(VeicleClass $veicleClass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VeicleClass  $veicleClass
     * @return \Illuminate\Http\Response
     */
    public function edit(VeicleClass $veicleClass)
    {
        return view('dashboard.veicle_class.create_edit')->with('veicle_class',$veicleClass);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVeicleClassRequest  $request
     * @param  \App\Models\VeicleClass  $veicleClass
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVeicleClassRequest $request, VeicleClass $veicleClass)
    {
        try {
            $veicleClass->update($request->all());
            session()->flash('success', 'Tipo de carta actualizada com sucesso.');
            return redirect()->route('veicle_class.index');
        } catch (\Throwable $e) {
            session()->flash('error', 'Erro na actualização do tipo de carta.');
            return redirect()->route('veicle_class.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VeicleClass  $veicleClass
     * @return \Illuminate\Http\Response
     */
    public function destroy(VeicleClass $veicleClass)
    {
        if (!is_null($veicleClass) || $veicleClass->students->count() <= 0) {
            try {
                $veicleClass->delete();
                session()->flash('success', 'Tipo de carta deletada com sucesso.');
                return redirect()->route('veicle_class.index');
            } catch (\Throwable $e) {
                session()->flash('error', 'Erro ao deletar tipo de carta.');
                return redirect()->route('veicle_class.index');
            }
        } else {
            session()->flash('error', 'Erro ao deletar: " Contacte o administrador do sistema."');
            return redirect()->route('veicle_class.index');
        }
    }
}
