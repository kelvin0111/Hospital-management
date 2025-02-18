@extends('layouts.dashboard.doc_main')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-sm-4 col-3">
                    <h4 class="page-title">Appointments</h4>
                </div>


                {{-- <div class="col-sm-8 col-9 text-right m-b-20">
                    <a href="{{ route('doctor-add-Appointment') }}" class="btn btn btn-primary btn-rounded float-right"><i
                            class="fa fa-plus"></i> Add Appointment</a>
                </div> --}}


            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table">
                            <thead>
                                <tr>
                                    <th>Patient Name</th>
                                    <th>Gender</th>
                                    <th>Appointment Date</th>
                                    <th>Appointment Time</th>
                                    <th>Status</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($getUserAppointments as $appointments)
                                    <tr>
                                        <td><img width="28" height="28"
                                                src="{{ asset('dash/assets/img/user.jpg') }} " class="rounded-circle m-r-5"
                                                alt="">{{ $appointments->user->name ?? 'doctor' }}</td>
                                        <td>{{ $appointments->user->gender }}</td>
                                        <td>{{ \Carbon\Carbon::parse($appointments->appointment_datetime)->format('Y-m') ?? '' }}
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($appointments->appointment_datetime)->format('l') ?? '' }}
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($appointments->appointments_time)->format('h:i A') ?? '' }}
                                            </< /td>
                                        <td><span class="custom-badge status-blue">{{ $appointments->status }}</span></td>
                                        <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                                    aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="edit-appointment.html"><i
                                                            class="fa fa-pencil m-r-5"></i> Edit</a>
                                                    <a class="dropdown-item" href="#" data-toggle="modal"
                                                        data-target="#delete_appointment"><i
                                                            class="fa fa-trash-o m-r-5"></i>
                                                        Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    {{-- <script></script> --}}
@endsection
