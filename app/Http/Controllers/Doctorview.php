<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\appointment;
use App\Models\Payment;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Business_hour;
use Illuminate\Validation\Rule;

class Doctorview extends Controller
{
    public function dashboard()
    {
        $user = auth()->user(); // Example to get user ID, adjust as per your logic
        // Get the current datetime
        $currentDateTime = Carbon::now();

        // Fetch appointments where the appointment datetime is in the future
        $getUserAppointmentCount = appointment::where('doctor_id', $user->id)->where(function ($query) {
            $query->where('status', 'scheduled')
                ->orWhere('status', 'rescheduled');
        })
            ->where('appointment_datetime', '>', $currentDateTime)
            ->count();


        $getUserAppointments = Appointment::with('user')
            ->where('doctor_id', $user->id)
            ->where(function ($query) {
                $query->where('status', 'scheduled')
                    ->orWhere('status', 'rescheduled');
            })
            ->where('appointment_datetime', '>', $currentDateTime)
            ->get();


        $getUserAppointmentsAll = appointment::with('user')
            ->where('doctor_id', $user->id)
            ->get();

        $getUserPaymentCount = Payment::with('user',)
            ->where('doctor_id', $user->id)->count();

        $getUserPayment = Payment::where('doctor_id', $user->id)->get();

        return view('doctor.dashboard', compact(
            'getUserAppointmentCount',
            'getUserAppointments',
            'getUserPaymentCount',
            'getUserPayment',
            'getUserAppointmentsAll'
        ));
    }


    public function addAppointment()
    {
        return view('doctor.add-appointment');
    }

    public function appointment()
    {
        $user = auth()->user(); // Example to get user ID, adjust as per your logic

        $getUserAppointments = appointment::with('user', 'doctor')->where('doctor_id', $user->id)->get();
        return view('doctor.appointments', compact('getUserAppointments'));
    }
    public function invoiceView(Request $request)
    {
        $user = auth()->user(); // Example to get user ID, adjust as per your logic
        $invoiceId =  $request->ref;

        $invoice = Payment::with('user', 'doctor')->where('id', $invoiceId)->first(); // Assuming there's only one invoice with the given ID
        $getInvoice = Payment::with('user', 'doctor')->where('id', $invoiceId)->get(); // Assuming there's only one invoice with the given ID

        return view('doctor.invoice-view', compact('invoice', 'getInvoice'));
    }


    public function invoices()
    {
        $user = auth()->user(); // Example to get user ID, adjust as per your logic

        $getUserPayment = Payment::with('user', 'doctor')->where('user_id', $user->id)->get();

        return view('doctor.invoices', compact('getUserPayment'));
    }
    public function Reports()
    {
        return view('doctor.Reports');
    }
    public function appoitmantTimeView()
    {
        return view('doctor.appointmenttime');
    }
    public function acceptPayment()
    {
        return view('doctor.acceptPayment');
    }
    public function Reschedule()
    {
        return view('doctor.Reschedule');
    }
    public function Time()
    {
        $user = auth()->user(); // Example to get user ID, adjust as per your logic
        $getDocAvalabTime = Business_hour::where('doctor_id', $user->id)->get();

        return view('doctor.Time', compact('getDocAvalabTime'));
    }


    public function availability(Request $request)
    {
        $user = auth()->user(); // Example to get user ID, adjust as per your logic

        $doctorId = $user->id;
        $day = $request->input('day');
        $offStatus = $request->input('off');

        // Find the doctor's availability for the given day
        $doctorAvailability = Business_hour::where('doctor_id', $doctorId)
            ->where('day', $day)
            ->first();

        if ($doctorAvailability) {
            // Update the off status
            $doctorAvailability->off = $offStatus;
            $doctorAvailability->save();

            return response()->json(['message' => 'Doctor availability updated successfully']);
        } else {
            return response()->json(['error' => 'Doctor availability not found'], 404);
        }
    }

    public function editTime(Request $request)
    {
        return view('doctor.editTime');
    }

    public function updateTime(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'start_time' => ['required', 'date_format:H:i'],
            'end_time' => ['required', 'date_format:H:i', 'after:start_time'],
            'step' => ['required', Rule::in(['30', '60'])],
        ]);

        $id = $request['id'];
        // Update the record in the Business_hour model

        $user = auth()->user();
        $businessHour = Business_hour::where('doctor_id', $user->id)->where('id', $id)->first();

        if ($businessHour) {
            $businessHour->start_time = $validatedData['start_time'];
            $businessHour->end_time = $validatedData['end_time'];
            $businessHour->step = $validatedData['step'];
            $businessHour->save();

            return redirect()->back()->with('success', 'Time updated successfully');
        } else {
            return redirect()->back()->with('error', 'Business hour record not found');
        }
    }

    public function registration()
    {
        return view('Docsignup');
    }


    public function login()
    {
        return view('Doclogin');
    }
}
