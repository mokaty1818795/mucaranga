<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ExamTpye;
use App\Http\Requests\StoreExamTpyeRequest;
use App\Http\Requests\UpdateExamTpyeRequest;

class ExamTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.exam_type.index')->with('exam_types',ExamTpye::all());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.exam_type.create_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreExamTpyeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExamTpyeRequest $request)
    {
        try {
            ExamTpye::create($request->all());
            session()->flash('success', 'Tipo de exame criado com sucesso.');
           return redirect()->route('exam_type.index');
       } catch (\Throwable $e) {
           throw $e;
           session()->flash('error', 'Erro na criação da tipo de pagamento.');
           return redirect()->route('exam_type.index');
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExamTpye  $exam_type
     * @return \Illuminate\Http\Response
     */
    public function show(ExamTpye $exam_type)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExamTpye  $exam_type
     * @return \Illuminate\Http\Response
     */
    public function edit(ExamTpye $exam_type)
    {
        return view('dashboard.exam_type.create_edit')->with('exam_type',$exam_type);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateExamTpyeRequest  $request
     * @param  \App\Models\ExamTpye  $exam_type
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExamTpyeRequest $request, ExamTpye $exam_type)
    {
        try {
            $exam_type->update($request->all());
            session()->flash('success', 'Tipo de exame actualizado com sucesso.');
            return redirect()->route('exam_type.index');
        } catch (\Throwable $e) {
            session()->flash('error', 'Erro na actualização do tipo de exame.');
            return redirect()->route('exam_type.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExamTpye  $exam_type
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExamTpye $exam_type)
    {
        if (!is_null($exam_type) || $exam_type->exams->count() <= 0) {
            try {
                $exam_type->delete();
                session()->flash('success', 'Tipo de exame deletado com sucesso.');
                return redirect()->route('exam_type.index');
            } catch (\Throwable $e) {
                session()->flash('error', 'Erro ao deletar o Tipo de exame.');
                return redirect()->route('exam_type.index');
            }
        } else {
            session()->flash('error', 'Erro ao deletar: " Contacte o administrador do sistema."');
            return redirect()->route('exam_type.index');
        }
    }
}
