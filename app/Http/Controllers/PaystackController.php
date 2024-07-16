<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\appointment;
use App\Models\Payment;
use Carbon\Carbon;
use App\Notifications\AppointmentNotification;
use App\Models\User;

class PaystackController extends Controller
{

    public function success(Request $request)
    {

        $user = auth()->user(); // Example to get user ID, adjust as per your logic

        $title = $request->query('title');
        $department = $request->query('department');
        $appointment_date = $request->query('appointment_date');
        $appointment_time = $request->query('appointment_time');
        $payment_status = "Paid";
        $payment_method = "Paystack";
        $reference = $request->query('reference');

        $doctorId = $request->query('doctor');
        $doctor = User::find($doctorId);

        // %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% 

        // Your Paystack secret key
        $secretKey = env('PAYSTACK_SECRET_KEY');

        // Initialize cURL session
        $ch = curl_init();

        // Set the API endpoint URL with the transaction reference
        $url = "https://api.paystack.co/transaction/verify/" . $reference;

        // Set cURL options
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Authorization: Bearer $secretKey",
            "Content-Type: application/json",
        ]);

        // Execute the cURL request
        $response = curl_exec($ch);

        // Check for errors
        if ($response === false) {
            echo "cURL Error: " . curl_error($ch);
            // Handle error accordingly
        } else {
            // Parse the JSON response
            $responseData = json_decode($response, true);

            // Check if transaction verification was successful
            if ($responseData['status'] === true) {
                // Transaction details
                $amount = $responseData['data']['amount'] / 100; // Convert amount to actual value
                $currency = $responseData['data']['currency'];
                // Output transaction details

                $appointment_date = Carbon::parse($appointment_date)->format('Y-m-d');
                // Combine date, year, and time into a single string
                $appointment_datetime_string = $appointment_date . ' ' . $appointment_time;

                $payment_id = mt_rand(1000, 9999);

                // Save data to the appointment table
                $appointment = new appointment();
                $appointment->title = $title;
                $appointment->user_id = $user->id; // Example to get user ID, adjust as per your logic
                $appointment->doctor_id = $doctor->id; // Assign the ID of the doctor
                $appointment->appointment_datetime = $appointment_datetime_string;
                $appointment->appointment_date = $appointment_date;
                $appointment->appointment_time = $appointment_time;
                $appointment->save();


                // Save payment information
                $payment = new Payment();
                $payment->user_id = $user->id; // Example to get user ID, adjust as per your logic
                $payment->doctor_id = $doctor->id;
                $payment->department_id = $department;
                $payment->payment_id = $payment_id; // Assuming payment_id is available in the request
                $payment->title = $title;
                $payment->amount = $amount;
                $payment->currency = $currency;
                $payment->payment_status = $payment_status;
                $payment->payment_method = $payment_method;
                $payment->save();

                // email notification to both doctor and patient about appointment {ADD THIS FEATURE} USE JOBS AND QUEUE;
                $appointmentId = $appointment->id;

                $doctor->notify(new AppointmentNotification($appointmentId));

                return redirect()->route('dashboard')->with('success', 'Appointment and payment successful');
            } else {
                // Transaction verification failed
                echo "Transaction verification failed: " . $responseData['message'];
                // Handle failure accordingly
            }
        }

        // Close cURL session
        curl_close($ch);
        // %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% 
    }




    public function cancel()
    {
        return "Payment is cancelled";
    }
}
