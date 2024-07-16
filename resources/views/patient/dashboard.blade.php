@extends('layouts.dashboard.main')

@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">

                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <a href="{{ route('Patient-add-Appointment') }}">
                        <div class="dash-widget">
                            <span class="dash-widget-bg1"><i class="fa fa-stethoscope" aria-hidden="true"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3>{{ $getUserAppointmentCount ?? 0 }}</h3>
                                <span class="widget-title1">Book Appointment<i class="fa fa-check"
                                        aria-hidden="true"></i></span>
                            </div>
                    </a>
                </div>
            </div>

            {{-- <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <a href="{{ route('Patient-appointment') }}">
                    <div class="dash-widget">
                        <span class="dash-widget-bg2"><i class="fa fa-user-o"></i></span>
                        <div class="dash-widget-info text-right">
                            <h3>1072</h3>
                            <span class="widget-title2">Appointments <i class="fa fa-check" aria-hidden="true"></i></span>
                        </div>
                </a>
            </div>
        </div> --}}

            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <a href="{{ route('Patient-invoices') }}">
                    <div class="dash-widget">
                        <span class="dash-widget-bg3"><i class="fa fa-user-md" aria-hidden="true"></i></span>
                        <div class="dash-widget-info text-right">
                            <h3>{{ $getUserPaymentCount ?? 0 }}</h3>
                            <span class="widget-title3">Billing and Payments <i class="fa fa-check"
                                    aria-hidden="true"></i></span>
                        </div>
                    </div>
                </a>

            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <a href="{{ route('Patient-Reports') }}">
                    <div class="dash-widget">
                        <span class="dash-widget-bg4"><i class="fa fa-heartbeat" aria-hidden="true"></i></span>
                        <div class="dash-widget-info text-right">
                            <h3>0</h3>
                            <span class="widget-title4">Reports <i class="fa fa-check" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </a>
            </div>
        </div>



        <div class="row">
            <div class="col-12 col-md-6 col-lg-8 col-xl-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title d-inline-block">Upcoming Appointments</h4> <a href="appointments.html"
                            class="btn btn-primary float-right">View all</a>
                    </div>

                    <div class="card-body p-0 mt-4">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <tbody>
                                    @foreach ($getUserAppointments as $appointment)
                                        <tr>
                                            <td style="min-width: 200px;">
                                                <a class="avatar" href="#">Dr</a>
                                                <h2><a href="profile.html">Dr {{ $appointment->doctor->name ?? 'Doctor' }}
                                                        <span>{{ $appointment->doctor->email ?? 'email' }}</span></a>
                                                </h2>
                                            </td>
                                            <td>
                                                <h5 class="time-title p-0">Specialization</h5>
                                                <p>{{ $appointment->doctor->specialization ?? 'Specialization' }}
                                                </p>
                                            </td>
                                            <td>
                                                <h5 class="time-title p-0">Day</h5>
                                                <p>{{ \Carbon\Carbon::parse($appointment->appointment_datetime)->format('l') }}
                                                </p>
                                            </td>
                                            <td>
                                                <h5 class="time-title p-0">Time</h5>
                                                <p>{{ \Carbon\Carbon::parse($appointment->appointment_time)->format('h:i A') }}
                                                </p>
                                            </td>
                                            <td class="text-right">
                                                <a href="{{ route('Patient-Reschedule', ['ref_d' => $appointment->id, 'ref_id_2' => $appointment->doctor->id]) }}"
                                                    class="btn btn-outline-primary take-btn">Reschedule</a>
                                                <a href="{{ route('Patient-cancelAppointment', ['ref_d' => $appointment->id, 'ref_id_2' => $appointment->doctor->id]) }}"
                                                    class="btn btn-outline-primary take-btn">cancelAppointment</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>

                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title d-inline-block">Appointments</h4> <a href="appointments.html"
                            class="btn btn-primary float-right">View all</a>
                    </div>

                    <div class="card-body p-0 mt-4">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <tbody>
                                    @foreach ($getUserAppointmentsAll as $appointment)
                                        <tr>
                                            <td style="min-width: 200px;">
                                                <a class="avatar" href="#">Dr</a>
                                                <h2><a href="profile.html">Dr {{ $appointment->doctor->name ?? 'Doctor' }}
                                                        <span>{{ $appointment->doctor->email ?? 'email' }}</span></a>
                                                </h2>
                                            </td>
                                            <td>
                                                <h5 class="time-title p-0">Specialization</h5>
                                                <p>{{ $appointment->doctor->specialization ?? 'Specialization' }}
                                                </p>
                                            </td>
                                            <td>
                                                <h5 class="time-title p-0">Day</h5>
                                                <p>{{ \Carbon\Carbon::parse($appointment->appointment_datetime)->format('l') }}
                                                </p>
                                            </td>
                                            <td>
                                                <h5 class="time-title p-0">Time</h5>
                                                <p>{{ \Carbon\Carbon::parse($appointment->appointment_time)->format('h:i A') }}
                                                </p>
                                            </td>
                                            {{-- <td class="text-right">
                                                <a href="appointments.html"
                                                    class="btn btn-outline-primary take-btn">Reschedule</a>
                                            </td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4 col-xl-4">
                <div class="card member-panel">
                    <div class="card-header bg-white">
                        <h4 class="card-title mb-0">Reports</h4>
                    </div>
                    <div class="card-body">
                        <ul class="contact-list">
                            <li>
                                <div class="contact-cont">
                                    <div class="float-left user-img m-r-10">
                                        <a href="profile.html" title="John Doe"><img
                                                src=" {{ asset('dash/assets/img/user.jpg') }}" alt=""
                                                class="w-40 rounded-circle"><span class="status online"></span></a>
                                    </div>
                                    <div class="contact-info">
                                        <span class="contact-name text-ellipsis">John Doe</span>
                                        <span class="contact-date">MBBS, MD</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="contact-cont">
                                    <div class="float-left user-img m-r-10">
                                        <a href="profile.html" title="Richard Miles"><img
                                                src=" {{ asset('dash/assets/img/user.jpg') }} " alt=""
                                                class="w-40 rounded-circle"><span class="status offline"></span></a>
                                    </div>
                                    <div class="contact-info">
                                        <span class="contact-name text-ellipsis">Richard Miles</span>
                                        <span class="contact-date">MD</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="contact-cont">
                                    <div class="float-left user-img m-r-10">
                                        <a href="profile.html" title="John Doe"><img
                                                src=" {{ asset('dash/assets/img/user.jpg') }} " alt=""
                                                class="w-40 rounded-circle"><span class="status away"></span></a>
                                    </div>
                                    <div class="contact-info">
                                        <span class="contact-name text-ellipsis">John Doe</span>
                                        <span class="contact-date">BMBS</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="contact-cont">
                                    <div class="float-left user-img m-r-10">
                                        <a href="profile.html" title="Richard Miles"><img
                                                src=" {{ asset('dash/assets/img/user.jpg') }} " alt=""
                                                class="w-40 rounded-circle"><span class="status online"></span></a>
                                    </div>
                                    <div class="contact-info">
                                        <span class="contact-name text-ellipsis">Richard Miles</span>
                                        <span class="contact-date">MS, MD</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="contact-cont">
                                    <div class="float-left user-img m-r-10">
                                        <a href="profile.html" title="John Doe"><img
                                                src=" {{ asset('dash/assets/img/user.jpg') }} " alt=""
                                                class="w-40 rounded-circle"><span class="status offline"></span></a>
                                    </div>
                                    <div class="contact-info">
                                        <span class="contact-name text-ellipsis">John Doe</span>
                                        <span class="contact-date">MBBS</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="contact-cont">
                                    <div class="float-left user-img m-r-10">
                                        <a href="profile.html" title="Richard Miles"><img
                                                src=" {{ asset('dash/assets/img/user.jpg') }} " alt=""
                                                class="w-40 rounded-circle"><span class="status away"></span></a>
                                    </div>
                                    <div class="contact-info">
                                        <span class="contact-name text-ellipsis">Richard Miles</span>
                                        <span class="contact-date">MBBS, MD</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="card-footer text-center bg-white">
                        <a href="doctors.html" class="text-muted">View all Reports</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-8 col-xl-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title d-inline-block">Payments</h4> <a href="patients.html"
                            class="btn btn-primary float-right">View all</a>
                    </div>
                    <div class="card-block">
                        <div class="table-responsive">
                            <table class="table mb-0 new-patient-table">
                                <tbody>
                                    @foreach ($getUserPayment as $Payment)
                                        <tr>
                                            <td>
                                                <img width="28" height="28" class="rounded-circle"
                                                    src=" {{ asset('dash/assets/img/user.jpg') }} " alt="">
                                            </td>
                                            <td>ID:{{ $Payment->payment_id }}</td>
                                            <td> {{ $Payment->title }} </td>
                                            <td>{{ $Payment->amount }} </td>
                                            <td> {{ $Payment->currency }} </td>
                                            <td>{{ $Payment->payment_method }} </td>
                                            <td><button class="btn btn-primary btn-primary-one float-right">
                                                    {{ $Payment->payment_status }} </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 col-xl-4">
                <div class="hospital-barchart">
                    <h4 class="card-title d-inline-block">Hospital Management</h4>
                </div>
                <div class="bar-chart">
                    <div class="legend">
                        <div class="item">
                            <h4>Level1</h4>
                        </div>

                        <div class="item">
                            <h4>Level2</h4>
                        </div>
                        <div class="item text-right">
                            <h4>Level3</h4>
                        </div>
                        <div class="item text-right">
                            <h4>Level4</h4>
                        </div>
                    </div>
                    <div class="chart clearfix">
                        <div class="item">
                            <div class="bar">
                                <span class="percent">16%</span>
                                <div class="item-progress" data-percent="16">
                                    <span class="title">OPD Patient</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="bar">
                                <span class="percent">71%</span>
                                <div class="item-progress" data-percent="71">
                                    <span class="title">New Patient</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="bar">
                                <span class="percent">82%</span>
                                <div class="item-progress" data-percent="82">
                                    <span class="title">Laboratory Test</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="bar">
                                <span class="percent">67%</span>
                                <div class="item-progress" data-percent="67">
                                    <span class="title">Treatment</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="bar">
                                <span class="percent">30%</span>
                                <div class="item-progress" data-percent="30">
                                    <span class="title">Discharge</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="notification-box">
        <div class="msg-sidebar notifications msg-noti">
            <div class="topnav-dropdown-header">
                <span>Messages</span>
            </div>
            <div class="drop-scroll msg-list-scroll" id="msg_list">
                <ul class="list-box">
                    <li>
                        <a href="chat.html">
                            <div class="list-item">
                                <div class="list-left">
                                    <span class="avatar">R</span>
                                </div>
                                <div class="list-body">
                                    <span class="message-author">Richard Miles </span>
                                    <span class="message-time">12:28 AM</span>
                                    <div class="clearfix"></div>
                                    <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="chat.html">
                            <div class="list-item new-message">
                                <div class="list-left">
                                    <span class="avatar">J</span>
                                </div>
                                <div class="list-body">
                                    <span class="message-author">John Doe</span>
                                    <span class="message-time">1 Aug</span>
                                    <div class="clearfix"></div>
                                    <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="chat.html">
                            <div class="list-item">
                                <div class="list-left">
                                    <span class="avatar">T</span>
                                </div>
                                <div class="list-body">
                                    <span class="message-author"> Tarah Shropshire </span>
                                    <span class="message-time">12:28 AM</span>
                                    <div class="clearfix"></div>
                                    <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="chat.html">
                            <div class="list-item">
                                <div class="list-left">
                                    <span class="avatar">M</span>
                                </div>
                                <div class="list-body">
                                    <span class="message-author">Mike Litorus</span>
                                    <span class="message-time">12:28 AM</span>
                                    <div class="clearfix"></div>
                                    <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="chat.html">
                            <div class="list-item">
                                <div class="list-left">
                                    <span class="avatar">C</span>
                                </div>
                                <div class="list-body">
                                    <span class="message-author"> Catherine Manseau </span>
                                    <span class="message-time">12:28 AM</span>
                                    <div class="clearfix"></div>
                                    <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="chat.html">
                            <div class="list-item">
                                <div class="list-left">
                                    <span class="avatar">D</span>
                                </div>
                                <div class="list-body">
                                    <span class="message-author"> Domenic Houston </span>
                                    <span class="message-time">12:28 AM</span>
                                    <div class="clearfix"></div>
                                    <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="chat.html">
                            <div class="list-item">
                                <div class="list-left">
                                    <span class="avatar">B</span>
                                </div>
                                <div class="list-body">
                                    <span class="message-author"> Buster Wigton </span>
                                    <span class="message-time">12:28 AM</span>
                                    <div class="clearfix"></div>
                                    <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="chat.html">
                            <div class="list-item">
                                <div class="list-left">
                                    <span class="avatar">R</span>
                                </div>
                                <div class="list-body">
                                    <span class="message-author"> Rolland Webber </span>
                                    <span class="message-time">12:28 AM</span>
                                    <div class="clearfix"></div>
                                    <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="chat.html">
                            <div class="list-item">
                                <div class="list-left">
                                    <span class="avatar">C</span>
                                </div>
                                <div class="list-body">
                                    <span class="message-author"> Claire Mapes </span>
                                    <span class="message-time">12:28 AM</span>
                                    <div class="clearfix"></div>
                                    <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="chat.html">
                            <div class="list-item">
                                <div class="list-left">
                                    <span class="avatar">M</span>
                                </div>
                                <div class="list-body">
                                    <span class="message-author">Melita Faucher</span>
                                    <span class="message-time">12:28 AM</span>
                                    <div class="clearfix"></div>
                                    <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="chat.html">
                            <div class="list-item">
                                <div class="list-left">
                                    <span class="avatar">J</span>
                                </div>
                                <div class="list-body">
                                    <span class="message-author">Jeffery Lalor</span>
                                    <span class="message-time">12:28 AM</span>
                                    <div class="clearfix"></div>
                                    <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="chat.html">
                            <div class="list-item">
                                <div class="list-left">
                                    <span class="avatar">L</span>
                                </div>
                                <div class="list-body">
                                    <span class="message-author">Loren Gatlin</span>
                                    <span class="message-time">12:28 AM</span>
                                    <div class="clearfix"></div>
                                    <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="chat.html">
                            <div class="list-item">
                                <div class="list-left">
                                    <span class="avatar">T</span>
                                </div>
                                <div class="list-body">
                                    <span class="message-author">Tarah Shropshire</span>
                                    <span class="message-time">12:28 AM</span>
                                    <div class="clearfix"></div>
                                    <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="topnav-dropdown-footer">
                <a href="chat.html">See all messages</a>
            </div>
        </div>
    </div>
    </div>
@endsection
