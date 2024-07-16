@extends('layouts.dashboard.doc_main')

@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-sm-5 col-4">
                    <h4 class="page-title">Bussiness Time</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0">
                            <thead>
                                <tr>
                                    <th>Day </th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Duration</th>
                                    <th>unavailable</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($getDocAvalabTime as $DocAvalabTime)
                                    <tr>
                                        <td>{{ $DocAvalabTime->day }}</td>
                                        <td>{{ $DocAvalabTime->start_time }}</td>
                                        <td>{{ $DocAvalabTime->end_time }}</td>
                                        <td>{{ $DocAvalabTime->step }}</td>
                                        <td>
                                            <input type="checkbox" class="availability-toggle" id="availability"
                                                data-day-id="{{ $DocAvalabTime->day }}" data-toggle="toggle"
                                                data-width="100" @if ($DocAvalabTime->off) checked @endif>
                                        </td>
                                        <td>
                                            <a class="dropdown-item"
                                                href="{{ route('doctor-editTime', ['id' => $DocAvalabTime->id]) }}">
                                                <i class="fa fa-pencil m-r-5"></i> Change Time
                                            </a>

                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                                    aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="edit-invoice.html"><i
                                                            class="fa fa-pencil m-r-5"></i> Edit</a>
                                                    <a class="dropdown-item" href="invoice-view.html"><i
                                                            class="fa fa-eye m-r-5"></i> View</a>
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        jQuery.noConflict();
        jQuery(document).ready(function($) {
            $('.availability-toggle').click(function() { // Change #availability to .availability-toggle

                var day = $(this).data('day-id');
                var isChecked = $(this).prop('checked');
                console.log(day, isChecked);
                // Send AJAX request
                $.ajax({
                    url: '{{ route('doctor-availability') }}', // Use route name
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                            'content') // Include CSRF token
                    },
                    data: {
                        day: day,
                        off: isChecked ? 1 : 0
                    },
                    success: function(response) {
                        console.log(response);
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
@endsection
