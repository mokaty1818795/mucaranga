<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ClassRoom;
use App\Http\Requests\StoreClassRoomRequest;
use App\Http\Requests\UpdateClassRoomRequest;
use App\Models\Period;
use App\Models\User;

class ClassRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.class_room.index')->with([
            'class_rooms' => ClassRoom::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.class_room.create_edit')->with([
            'periods' => Period::all(),
            'instructors' => User::role('Intructor')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreClassRoomRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClassRoomRequest $request)
    {
        try {
            ClassRoom::create($request->all());
            session()->flash('success', 'Turma criada com sucesso.');
           return redirect()->route('class_room.index');
       } catch (\Throwable $e) {
           throw $e;
           session()->flash('error', 'Erro na criação da turma.');
           return redirect()->route('class_room.index');
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClassRoom  $classRoom
     * @return \Illuminate\Http\Response
     */
    public function show(ClassRoom $classRoom)
    {
        abort(401);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClassRoom  $classRoom
     * @return \Illuminate\Http\Response
     */
    public function edit(ClassRoom $classRoom)
    {
        return view('dashboard.class_room.create_edit')->with([
            'periods' => Period::all(),
            'instructors' => User::role('Intructor')->get(),
            'class_room' => $classRoom
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateClassRoomRequest  $request
     * @param  \App\Models\ClassRoom  $classRoom
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClassRoomRequest $request, ClassRoom $classRoom)
    {
        try {
            $classRoom->update($request->all());
            session()->flash('success', 'Turma actualizada com sucesso.');
            return redirect()->route('class_room.index');
        } catch (\Throwable $e) {
            session()->flash('error', 'Erro na actualização da turma.');
            return redirect()->route('class_room.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClassRoom  $classRoom
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassRoom $classRoom)
    {
        if (!is_null($classRoom) || $classRoom->students->count() <= 0) {
            try {
                $classRoom->delete();
                session()->flash('success', 'Turma deletada com sucesso.');
                return redirect()->route('class_room.index');
            } catch (\Throwable $e) {
                session()->flash('error', 'Erro ao deletar a turma.');
                return redirect()->route('class_room.index');
            }
        } else {
            session()->flash('error', 'Erro ao deletar: " Contacte o administrador do sistema."');
            return redirect()->route('class_room.index');
        }
    }
}
