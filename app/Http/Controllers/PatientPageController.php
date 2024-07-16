<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\appointment;
use App\Models\Payment;
use App\Models\User;
use Carbon\Carbon;

class PatientPageController extends Controller
{

    public function dashboard()
    {
        $user = auth()->user(); // Example to get user ID, adjust as per your logic
        // Get the current datetime
        $currentDateTime = Carbon::now();

        // Fetch appointments where the appointment datetime is in the future
        $getUserAppointmentCount = appointment::where('user_id', $user->id)->where(function ($query) {
            $query->where('status', 'scheduled')
                ->orWhere('status', 'rescheduled');
        })
            ->where('appointment_datetime', '>', $currentDateTime)
            ->count();

        $getUserAppointments = appointment::with('doctor')
            ->where('user_id', $user->id)
            ->where(function ($query) {
                $query->where('status', 'scheduled')
                    ->orWhere('status', 'rescheduled');
            })
            ->where('appointment_datetime', '>', $currentDateTime)
            ->get();


        $getUserAppointmentsAll = appointment::with('doctor')
            ->where('user_id', $user->id)
            ->get();

        $getUserPaymentCount = Payment::with('user',)
            ->where('user_id', $user->id)->count();

        $getUserPayment = Payment::where('user_id', $user->id)->get();

        return view('patient.dashboard', compact(
            'getUserAppointmentCount',
            'getUserAppointments',
            'getUserPaymentCount',
            'getUserPayment',
            'getUserAppointmentsAll'
        ));
    }

    
    public function addAppointment()
    {
        return view('patient.add-appointment');
    }

    public function appointment()
    {
        $user = auth()->user(); // Example to get user ID, adjust as per your logic

        $getUserAppointments = appointment::with('user', 'doctor')->where('user_id', $user->id)->get();
        return view('patient.appointments', compact('getUserAppointments'));
    }
    public function invoiceView(Request $request)
    {
        $user = auth()->user(); // Example to get user ID, adjust as per your logic
        $invoiceId =  $request->ref;

        $invoice = Payment::with('user', 'doctor')->where('id', $invoiceId)->first(); // Assuming there's only one invoice with the given ID
        $getInvoice = Payment::with('user', 'doctor')->where('id', $invoiceId)->get(); // Assuming there's only one invoice with the given ID

        return view('patient.invoice-view', compact('invoice', 'getInvoice'));
    }


    public function invoices()
    {
        $user = auth()->user(); // Example to get user ID, adjust as per your logic

        $getUserPayment = Payment::with('user', 'doctor')->where('user_id', $user->id)->get();

        return view('patient.invoices', compact('getUserPayment'));
    }
    public function Reports()
    {
        return view('patient.Reports');
    }
    public function appoitmantTimeView()
    {
        return view('patient.appointmenttime');
    }
    public function acceptPayment()
    {
        return view('patient.acceptPayment');
    }
    public function Reschedule()
    {
        return view('patient.Reschedule');
    }
}
