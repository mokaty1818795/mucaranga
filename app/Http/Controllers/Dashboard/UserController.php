<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\UserRequest;
use App\Http\Requests\Dashboard\UserRequestEdit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index():View
    {
        return view('dashboard.user.index')->with('users',User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create() : View
    {
        return view('dashboard.user.create_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UserRequest $request
     * @return Response
     */
    public function store(UserRequest $request)
    {
        try {
            $data = $request->all();

            $dataCreate  = array();
            foreach ($data as $key => $value) {
                if ($key == "password"  || $key == "password_confirmation" && $value) {
                    $value = Hash::make($value);
                }
                if (!is_null($value)) {
                    $dataCreate[$key] = $value;
                }
            }
             $user = User::create($dataCreate);
             $user->assignRole(Role::where('id',$request->role_id)->pluck('name')->toArray());
            session()->flash('success', 'User criado com sucesso.');
            return redirect()->route('user.index');
        } catch (\Throwable $e) {
            throw $e;
            session()->flash('error', 'Erro na criação do user.');
            return redirect()->route('user.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return Response
     */
    public function edit(User $user) : View
    {
        return view('dashboard.user.create_edit')->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UserRequestEdit  $request
     * @param User $user
     * @return Response
     */
    public function update(UserRequestEdit $request, User $user)
    {
        $data = $request->all();


        $dataUpdate  = array();
        foreach ($data as $key => $value) {
            if ($key == "password" && $value) {
                $value = Hash::make($value);
            }
            if (!is_null($value)) {
                $dataUpdate[$key] = $value;
            }
        }
        try {
            $user->update($dataUpdate);
            $user->syncRoles([]);
            $user->assignRole(Role::where('id',$request->role_id)->pluck('name')->toArray());
            session()->flash('success', 'User actualizado com sucesso.');
            return redirect()->route('user.index');
        } catch (\Throwable $e) {
            session()->flash('error', 'Erro na actualização do user.');
            return redirect()->route('user.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return Response
     */
    public function destroy(User $user)
    {
        if (!is_null($user)) {
            try {
                $user->syncRoles([]);
                $user->delete();
                session()->flash('success', 'Usuário deletado com sucesso.');
                return redirect()->route('user.index');
            } catch (\Throwable $e) {
                session()->flash('error', 'Erro ao deletar user.');
                return redirect()->route('user.index');
            }
        } else {
            session()->flash('error', 'Erro ao deletar: " Contacte o administrador do sistema."');
            return redirect()->route('user.index');
        }
    }
}
