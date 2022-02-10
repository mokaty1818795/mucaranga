<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\PaymentPhase;
use App\Http\Requests\StorePaymentPhaseRequest;
use App\Http\Requests\UpdatePaymentPhaseRequest;

class PaymentPhasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.payment_phase.index')->with('payment_phases',PaymentPhase::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.payment_phase.create_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePaymentPhaseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePaymentPhaseRequest $request)
    {
        try {
            PaymentPhase::create($request->all());
            session()->flash('success', 'Fâse de pagamento criada com sucesso.');
           return redirect()->route('payment_phase.index');
       } catch (\Throwable $e) {
           throw $e;
           session()->flash('error', 'Erro na criação da fâse de pagamento.');
           return redirect()->route('payment_phase.index');
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaymentPhase  $paymentPhase
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentPhase $paymentPhase)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaymentPhase  $paymentPhase
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentPhase $paymentPhase)
    {
        return view('dashboard.payment_phase.create_edit')->with('payment_phase',$paymentPhase);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePaymentPhaseRequest  $request
     * @param  \App\Models\PaymentPhase  $paymentPhase
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePaymentPhaseRequest $request, PaymentPhase $paymentPhase)
    {
        try {
            $paymentPhase->update($request->all());
            session()->flash('success', 'Fâse de pagamento actualizada com sucesso.');
            return redirect()->route('payment_phase.index');
        } catch (\Throwable $e) {
            session()->flash('error', 'Erro na actualização da fâse de pagamento.');
            return redirect()->route('payment_phase.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaymentPhase  $paymentPhase
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentPhase $paymentPhase)
    {
        if (!is_null($paymentPhase) || $paymentPhase->students->count() <= 0) {
            try {
                $paymentPhase->delete();
                session()->flash('success', 'Fâse de pagamento deletada com sucesso.');
                return redirect()->route('payment_phase.index');
            } catch (\Throwable $e) {
                session()->flash('error', 'Erro ao deletar a fâse de pagamento.');
                return redirect()->route('payment_phase.index');
            }
        } else {
            session()->flash('error', 'Erro ao deletar: " Contacte o administrador do sistema."');
            return redirect()->route('payment_phase.index');
        }
    }
}
