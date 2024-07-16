<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedicalDepartment;
use App\Models\User;
use App\Models\Business_hour;
use Carbon\CarbonPeriod;
use App\Models\appointment;
use Carbon\Carbon;
use App\Notifications\CancelAppointmentNotification;
use App\Notifications\RescheduleAppointmentNotification;

class AppointmentController extends Controller
{
    public function getMedicalDepertment()
    {
        $departments = MedicalDepartment::all();
        return response()->json($departments);
    }



    public function getDoctorsBelongToDepartment(Request $request, $id)
    {
        // Validate the 'd' parameter


        // Get the department from the URL
        $departmentName = $request->query('d');

        // Check if the department exists
        $department = MedicalDepartment::where('id', $id)->first();

        if (!$department) {
            return response()->json(['error' => 'Department not found'], 404);
        }

        // Get all doctors belonging to this department
        $doctorDepartments = $department->doctorDepartments;

        // Transform data if necessary
        // maping over the collection  of doctorDepartments and transform each one into a simple array. 
        // while display the doctor details using the doctor relationship in the doctordepertment  model.
        $doctors = $doctorDepartments->map(function ($doctorDepartment) {
            return [
                'id' => $doctorDepartment->doctor->id,
                'name' => $doctorDepartment->doctor->name,
                // Add more fields as needed
            ];
        });

        return response()->json($doctors);
    }





    public function getDoctorBusinessHours(Request $request, $doctor_id)
    {
        $doctor = User::find($doctor_id);
        $dataPeriod = CarbonPeriod::create(now(), now()->addDays(6));
        $data = [];

        foreach ($dataPeriod as $date) {
            $dayName = $date->format('l');

            // Check if the doctor is marked as off for the day
            $isDayOff = Business_hour::where('doctor_id', $doctor_id)
                ->where('off', true)
                ->where('day', $dayName)
                ->exists();

            // If the doctor is off for the day, skip this day and continue to the next iteration
            if ($isDayOff) {
                continue;
            }

            // Retrieve business hours for the day
            $businessHoursRecord = Business_hour::where('doctor_id', $doctor_id)
                ->where('off', false)
                ->where('day', $dayName)
                ->first();

            // Check if there's a record for the day
            if ($businessHoursRecord) {
                $businessHours = $businessHoursRecord->TimesPeriod;
            } else {
                // If no record found for the day, set business hours to an empty array
                $businessHours = [];
            }

            $currentAppointments = appointment::where('appointment_date', $date->toDateString())
                ->where('doctor_id', $doctor_id)
                ->pluck('appointment_time')
                ->map(function ($time) {
                    return $time->format('H:i');
                })
                ->toArray();

            $availableHours = array_diff($businessHours, $currentAppointments);

            $data[] = [
                'day_name' => $dayName,
                'date' => $date->format('d M'),
                'available_time' => $availableHours
            ];
        }

        return $data;
    }


    public function updateSchedule(Request $request)
    {
        // Decode the appointment data
        $appointmentData = json_decode($request->input('appointment_data'), true);
        // Extract appointment details
        $appointment_id = $appointmentData['appointment_id'];
        $appointment_date = $appointmentData['appointment_date'];
        $appointment_time = $appointmentData['appointment_time'];

        // Find the appointment by ID
        $appointment = appointment::find($appointment_id);

        // Check if the appointment exists
        if (!$appointment) {
            return response()->json(['error' => 'Appointment not found'], 404);
        }

        // Parse appointment_date to ensure it's in the correct format
        $appointment_date = Carbon::parse($appointment_date)->format('Y-m-d');

        // Update the appointment details
        $appointment->appointment_date = $appointment_date;
        $appointment->appointment_time = $appointment_time;
        $appointment->status = 'rescheduled';

        // Save the updated appointment
        $appointment->save();

        $doctor = User::find($appointment->doctor_id);

        $doctor->notify(new RescheduleAppointmentNotification($appointment_id));

        // Optionally, you can return a success response
        return redirect()->back()->with('success', 'Appointment updated successfully.');

    }

    public function cancelAppointment(Request $request)
    {

        // Extract appointment ID and doctor ID from the request
        $appointmentId = $request->input('ref_d');
        $doctorId = $request->input('ref_id_2');

        // Find the appointment
        $appointment = Appointment::find($appointmentId);

        // Check if the appointment exists
        if (!$appointment) {
            return redirect()->back()->with('error', 'Appointment not found.');
        }

        // Check if the appointment belongs to the authenticated user (optional, if you're using user authentication)
        // if ($appointment->user_id !== auth()->user()->id) {
        //     return redirect()->back()->with('error', 'Unauthorized access.');
        // }

        // Cancel the appointment
        $appointment->status = 'cancelled';
        $appointment->save();

        // Find the doctor
        $doctor = User::find($doctorId);

        // Check if the doctor exists
        if (!$doctor) {
            return redirect()->back()->with('error', 'Doctor not found.');
        }

        // Notify the doctor about the canceled appointment
        $doctor->notify(new CancelAppointmentNotification($appointmentId));

        // Redirect back with success message
        return redirect()->back()->with('success', 'Appointment canceled successfully.');
    }
}
