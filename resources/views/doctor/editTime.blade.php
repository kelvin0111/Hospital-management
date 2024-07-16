@extends('layouts.dashboard.doc_main')

@section('content')
    <div class="container col-md-12 d-flex justify-content-center align-items-center vh-100">
        <div class="row col-md-12 vh-100 d-flex justify-content-center align-items-center">
            <div class="col-md-6 d-flex justify-content-center align-items-center">
                <div class="card-box">
                    <h4 class="card-title">Update Appointment Time</h4>
                    <form action="{{ route('doctor-updateTime') }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group row">

                            <div class="col-md-9">
                                <label class="col-md-3 col-form-label">Start </label>
                                <input type="time" class="form-control" required name="start_time">
                            </div>

                            <div class="col-md-9">
                                <label class="col-md-3 col-form-label">End </label>
                                <input type="time" class="form-control" required name="end_time">
                            </div>

                            <div class="col-md-9">
                                <label class="col-md-3 col-form-label">Step</label>
                                <select class="form-control" id="minutesSelect" required name="step">
                                    <option value="30">30</option>
                                    <option value="60">60</option>
                                </select>
                            </div>

                            <div class="col-md-9">
                                <!-- Hidden input field to store the ID -->
                                <input type="hidden" class="form-control" id="hiddenId" name="id">
                            </div>

                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>

                    </form>


                </div>
            </div>
        </div>
    </div>
    <script>
        // Function to extract the numeric part of the ID from the URL
        function extractIdFromUrl() {
            // Get the URL of the current page
            var url = window.location.href;

            // Extract the query string from the URL
            var queryString = url.substring(url.indexOf('?') + 1);

            // Extract the value of the 'id' parameter from the query string
            var id = queryString.split('=')[1];

            // Set the value of the hidden input field
            document.getElementById('hiddenId').value = id;
        }

        // Call the function when the page is loaded
        window.onload = function() {
            extractIdFromUrl();
        };
    </script>
@endsection
