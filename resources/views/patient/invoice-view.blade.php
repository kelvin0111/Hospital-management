@extends('layouts.dashboard.main')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-sm-5 col-4">
                    <h4 class="page-title">Invoice</h4>
                </div>
                {{-- <div class="col-sm-7 col-8 text-right m-b-30">
                    <div class="btn-group btn-group-sm">
                        <button class="btn btn-white">CSV</button>
                        <button class="btn btn-white">PDF</button>
                        <button class="btn btn-white"><i class="fa fa-print fa-lg"></i> Print</button>
                    </div>
                </div> --}}
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row custom-invoice">
                                <div class="col-6 col-sm-6 m-b-20">
                                    <img src="{{ asset('dash/assets/img/logo-dark.png') }} " class="inv-logo"
                                        alt="">
                                    <ul class="list-unstyled">
                                        <li>PreClinic</li>
                                        <li>3864 Quiet Valley Lane,</li>
                                        <li>Sherman Oaks, CA, 91403</li>
                                        <li>GST No:</li>
                                    </ul>
                                </div>
                                <div class="col-6 col-sm-6 m-b-20">
                                    <div class="invoice-details">
                                        <h3 class="text-uppercase">Invoice #{{ $invoice->payment_id ?? '' }}</h3>
                                        <ul class="list-unstyled">
                                            <li>Date:
                                                <span>{{ \Carbon\Carbon::parse($invoice->created_at)->format('Y-m-d h:i A') ?? '' }}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-lg-6 m-b-20">

                                    <h5>Invoice to:</h5>
                                    <ul class="list-unstyled">
                                        <li>
                                            <h5><strong>{{ $invoice->user->name ?? ('Name' ?? '') }}</strong></h5>
                                        </li>
                                        <li><span>{{ $invoice->user->address ?? '' }}</span></li>
                                        <li>{{ $invoice->user->country ?? '' }}</li>
                                        <li>{{ $invoice->user->phone ?? '' }}</li>
                                        <li><a href="#">{{ $invoice->user->email }}</a></li>
                                    </ul>

                                </div>
                                <div class="col-sm-6 col-lg-6 m-b-20">
                                    <div class="invoices-view">
                                        <span class="text-muted">Payment Details:</span>
                                        <ul class="list-unstyled invoice-payment-details">
                                            <li>
                                                <h5>Total Due: <span
                                                        class="text-right">{{ $invoice->currency ?? '' }}{{ $invoice->amount ?? '' }}</span>
                                                </h5>
                                            </li>
                                            <li>Payment Method: <span>{{ $invoice->payment_method ?? '' }}</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>ITEM</th>
                                            <th>UNIT COST</th>
                                            <th>TOTAL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($getInvoice as $invoice)
                                            <tr>
                                                <td>{{ $invoice->title ?? '' }}</td>
                                                <td>{{ $invoice->currency ?? '' }}{{ $invoice->amount ?? '' }}</td>
                                                <td>{{ $invoice->currency ?? '' }}{{ $invoice->amount ?? '' }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
