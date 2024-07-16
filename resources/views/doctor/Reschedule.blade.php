@extends('layouts.dashboard.doc_main')

@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h4 class="page-title">Select Time</h4>
                </div>
            </div>

            {{-- Container to hold the dynamically generated forms --}}
            <div class="row col-md-12 justify-content-center" id="formsContainer"></div>

        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add event listener to form submission
            document.getElementById('yourFormId').addEventListener('submit', function(event) {
                // Prevent default form submission
                event.preventDefault();

                // Capture form inputs
                const formData = {
                    // Capture form inputs here
                    // For example:
                    // title: document.getElementById('title').value,
                    // department: document.getElementById('department').value,
                    // doctor: document.getElementById('doctor').value,
                };

                // Save form inputs to localStorage
                localStorage.setItem('formData', JSON.stringify(formData));

                // Submit the form programmatically
                submitForm();
            });
        });

        function submitForm() {
            // Perform any additional actions before submitting the form
            console.log('Submitting form...');

            // Retrieve the form element
            const form = document.getElementById('yourFormId');

            // Submit the form
            form.submit();
        }

        // Check if the current URL contains "/Patient/appoitmantTimeView"
        if (window.location.href.includes('http://127.0.0.1:8000/Patient/Reschedule')) {
            // If the URL matches, execute the logic to fetch medical department data

            const urlParams = new URLSearchParams(window.location.search);
            const appointment_id = urlParams.get('ref_d');
            const doctor_id = urlParams.get('ref_id_2');
            console.log(appointment_id, doctor_id);

            function getMedicalDoctors() {

                // Make a POST request to fetch doctor's available times based on doctor ID
                fetch(`http://127.0.0.1:8000/api/GetDoctorBusinessHours/${doctor_id}`, {
                        method: 'POST',
                        headers: {
                            'Accept': 'application/json',
                            'Content-Type': 'application/json',
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        // Get the forms container
                        const formsContainer = document.getElementById('formsContainer');

                        // Clear any existing content
                        formsContainer.innerHTML = '';

                        // Loop through the fetched data and create forms for each available time slot
                        data.forEach(datetime => {
                            // Create a form element
                            const form = document.createElement('form');
                            form.classList.add('col-md-6', 'form');

                            // Create a div to hold datetime information
                            const datetimeDiv = document.createElement('div');
                            datetimeDiv.classList.add('form-group');

                            // Set the text content of the datetime div
                            datetimeDiv.textContent = `${datetime.day_name}/${datetime.data}`;

                            // Loop through available times and create buttons for each time
                            datetime.available_time.forEach(time => {
                                // Create a button for the time slot
                                const button = document.createElement('button');
                                button.textContent = time;
                                button.classList.add('btn', 'btn-primary', 'btn-sm');

                                // Add event listener to handle form submission
                                button.addEventListener('click', function() {
                                    // Prevent the default behavior of the button click event
                                    event.preventDefault();
                                    // Set the value of hidden inputs
                                    const dateInput = document.createElement('input');
                                    dateInput.type = 'hidden';
                                    dateInput.name = 'appointment_date';
                                    dateInput.value = datetime.data;

                                    const timeInput = document.createElement('input');
                                    timeInput.type = 'hidden';
                                    timeInput.name = 'appointment_time';
                                    timeInput.value = time;

                                    // Append hidden inputs to the form
                                    form.appendChild(dateInput);
                                    form.appendChild(timeInput);

                                    // Append form to the forms container
                                    formsContainer.appendChild(form);


                                    // Stringify the data
                                    const appointmentData = JSON.stringify({
                                        appointment_id: appointment_id,
                                        doctor_id: doctor_id,
                                        appointment_date: datetime.data,
                                        appointment_time: time
                                    });

                                    // Encode the appointmentData as a query parameter
                                    const encodedAppointmentData = encodeURIComponent(
                                        appointmentData);

                                    // Construct the URL with the encoded appointmentData
                                    const url =
                                        `http://127.0.0.1:8000/Patient/updateSchedule?appointment_data=${encodedAppointmentData}`;

                                    // Redirect to the constructed URL
                                    window.location.href = url;

                                });

                                // Append button to the datetime div
                                datetimeDiv.appendChild(button);
                            });

                            // Append datetime div to the form
                            form.appendChild(datetimeDiv);

                            // Append form to the forms container
                            formsContainer.appendChild(form);
                        });
                    })
                    .catch(error => {
                        // Handle any errors
                        console.error('Error fetching doctor\'s available times:', error);
                    });
            }

            // Call the function to fetch and populate medical department data
            getMedicalDoctors();
        }
    </script>
@endsection
