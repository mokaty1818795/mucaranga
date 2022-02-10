<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\CivilState;
use App\Http\Requests\StoreCivilStateRequest;
use App\Http\Requests\UpdateCivilStateRequest;

class CivilStatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('dashboard.civil_state.index')->with('civil_states',CivilState::all());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.civil_state.create_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCivilStateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCivilStateRequest $request)
    {
        try {
            CivilState::create($request->all());
            session()->flash('success', 'Estado civil criado com sucesso.');
           return redirect()->route('civil_state.index');
       } catch (\Throwable $e) {
           throw $e;
           session()->flash('error', 'Erro na criação do estado civil.');
           return redirect()->route('civil_state.index');
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CivilState  $civilState
     * @return \Illuminate\Http\Response
     */
    public function show(CivilState $civilState)
    {
       // return view('dashboard.civil_state.create_edit')->with('civil_state',$civilState);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CivilState  $civilState
     * @return \Illuminate\Http\Response
     */
    public function edit(CivilState $civilState)
    {
        return view('dashboard.civil_state.create_edit')->with('civil_state',$civilState);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCivilStateRequest  $request
     * @param  \App\Models\CivilState  $civilState
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCivilStateRequest $request, CivilState $civilState)
    {
        try {
            $civilState->update($request->all());
            session()->flash('success', 'Estado civil actualizado com sucesso.');
            return redirect()->route('civil_state.index');
        } catch (\Throwable $e) {
            session()->flash('error', 'Erro na actualização do estado civil.');
            return redirect()->route('civil_state.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CivilState  $civilState
     * @return \Illuminate\Http\Response
     */
    public function destroy(CivilState $civilState)
    {
        if (!is_null($civilState) || $civilState->students->count() <= 0) {
            try {
                $civilState->delete();
                session()->flash('success', 'Estado civil deletado com sucesso.');
                return redirect()->route('civil_state.index');
            } catch (\Throwable $e) {
                session()->flash('error', 'Erro ao deletar estado civil.');
                return redirect()->route('civil_state.index');
            }
        } else {
            session()->flash('error', 'Erro ao deletar: " Contacte o administrador do sistema."');
            return redirect()->route('civil_state.index');
        }
    }
}
