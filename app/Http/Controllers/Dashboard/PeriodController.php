<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Period;
use App\Http\Requests\StorePeriodRequest;
use App\Http\Requests\UpdatePeriodRequest;

class PeriodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.period.index')->with('periods',Period::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.period.create_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePeriodRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePeriodRequest $request)
    {
        try {
            Period::create($request->all());
            session()->flash('success', 'Horário criado com sucesso.');
           return redirect()->route('period.index');
       } catch (\Throwable $e) {
           throw $e;
           session()->flash('error', 'Erro na criação do horário.');
           return redirect()->route('period.index');
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function show(Period $period)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function edit(Period $period)
    {
        return view('dashboard.period.create_edit')->with('period',$period);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePeriodRequest  $request
     * @param  \App\Models\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePeriodRequest $request, Period $period)
    {
        try {
            $period->update($request->all());
            session()->flash('success', 'Horário actualizado com sucesso.');
            return redirect()->route('period.index');
        } catch (\Throwable $e) {
            session()->flash('error', 'Erro na actualização do horário.');
            return redirect()->route('period.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function destroy(Period $period)
    {
        if (!is_null($period) || $period->class_rooms->count() <= 0) {
            try {
                $period->delete();
                session()->flash('success', 'Horário deletado com sucesso.');
                return redirect()->route('period.index');
            } catch (\Throwable $e) {
                session()->flash('error', 'Erro ao deletar horário.');
                return redirect()->route('period.index');
            }
        } else {
            session()->flash('error', 'Erro ao deletar: " Contacte o administrador do sistema."');
            return redirect()->route('period.index');
        }
    }
}
