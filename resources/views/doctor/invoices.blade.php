@extends('layouts.dashboard.doc_main')

@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-sm-5 col-4">
                    <h4 class="page-title">Invoices</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0">
                            <thead>
                                <tr>
                                    <th>Invoice Number</th>
                                    <th>Patient</th>
                                    <th>Created Date</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($getUserPayment as $Payment)
                                    <tr>
                                        <td><a
                                                href="{{ route('Patient-invoiceView', ['ref' => $Payment->id]) }}">{{ $Payment->payment_id ?? '' }}</a>
                                        </td>
                                        <td>{{ $Payment->user->name ?? '' }}</td>
                                        <td>{{ \Carbon\Carbon::parse($Payment->created_at)->format('Y-m') ?? '' }}</td>
                                        <td>{{ $Payment->currency ?? '' }} {{ $Payment->amount ?? '' }}</td>
                                        <td><span
                                                class="custom-badge status-green">{{ $Payment->payment_status ?? '' }}</span>
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                                    aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#"><i
                                                            class="fa fa-file-pdf-o m-r-5"></i> Download</a>
                                                    <a class="dropdown-item" href="#" data-toggle="modal"
                                                        data-target="#delete_invoice"><i class="fa fa-trash-o m-r-5"></i>
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
    <div id="delete_invoice" class="modal fade delete-modal" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <img src="{{ asset('dash/assets/img/sent.png') }} " alt="" width="50" height="46">
                    <h3>Are you sure want to delete this Invoice?</h3>
                    <div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
