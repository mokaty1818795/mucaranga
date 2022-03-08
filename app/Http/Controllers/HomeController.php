<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Registration;
use App\Models\Student;
use App\Models\User;
use App\Services\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home')->with([
            'students' => Student::count(),
            'administrators' => Role::with('users')->where('name','Root')->first()->users->count(),
            'instructors' => Role::with('users')->where('name','Instructor')->first()->users->count(),
            'employees' => Role::with('users')->where('name','Employee')->first()->users->count(),
            'payments' => $this->paymentReports(auth()->user())->sortByDesc('date')->take(150)
        ]);
    }

    public function profile()
    {
        return view('dashboard.profile')->with('user',auth()->user());
    }
    public function finances()
    {
        return view('finances')->with([]);
    }

    public  function paymentReports(User $user)
    {
        $payments = $user->registrations->map(function(Registration $payment)
        {
            return new Payment(
                $payment->id,
                $payment->payment_phase,
                $payment->student,
                $payment->processedBy,
                Media::where('id',$payment->invoice_id)->first(),
                Media::where('id',$payment->bank_invoice_id)->first(),
                $payment->created_at,
                $payment->amount
            );
        });
        $exams = $user->exams->map(function(Exam $exam)
        {
            return new Payment(
                $exam->id,
                $exam->exam_tpye,
                $exam->student,
                $exam->processedBy,
                Media::where('id',$exam->invoice_id)->first(),
                Media::where('id',$exam->bank_invoice_id)->first(),
                $exam->created_at,
                $exam->exam_tpye->price
            );
        });
        return collect([$payments,$exams])->collapse();
    }
}
