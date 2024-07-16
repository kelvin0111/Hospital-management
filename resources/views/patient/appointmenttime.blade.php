@extends('layouts.dashboard.main')

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
        if (window.location.href.includes('http://127.0.0.1:8000/Patient/appoitmantTimeView')) {
            // If the URL matches, execute the logic to fetch medical department data
            function getMedicalDoctors() {
                console.log('Fetching medical doctors...');

                const formDataJSON = localStorage.getItem('formData');
                const formData = JSON.parse(formDataJSON);
                const title = formData.title;
                const department = formData.department;
                const doctor = formData.doctor;

                console.log(`${title}, ${department}, ${doctor}`);

                // Make a POST request to fetch doctor's available times based on doctor ID
                fetch(`http://127.0.0.1:8000/api/GetDoctorBusinessHours/${doctor}`, {
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

                            // Create hidden input fields for title, department, and doctor
                            const titleInput = document.createElement('input');
                            titleInput.type = 'hidden';
                            titleInput.name = 'title';
                            titleInput.value = title;

                            const departmentInput = document.createElement('input');
                            departmentInput.type = 'hidden';
                            departmentInput.name = 'department';
                            departmentInput.value = department;

                            const doctorInput = document.createElement('input');
                            doctorInput.type = 'hidden';
                            doctorInput.name = 'doctor_id';
                            doctorInput.value = doctor;

                            // Append hidden inputs to the form
                            form.appendChild(titleInput);
                            form.appendChild(departmentInput);
                            form.appendChild(doctorInput);


                            // Create a div to hold datetime information
                            const datetimeDiv = document.createElement('div');
                            datetimeDiv.classList.add('form-group');

                            // Set the text content of the datetime div
                            // Set the text content of the datetime div
                            datetimeDiv.textContent = `${datetime.day_name}/${datetime.date}`;


                            // Loop through available times and create buttons for each time
                            datetime.available_time.forEach(time => {
                                // Create a button for the time slot
                                const button = document.createElement('button');
                                button.textContent = time;
                                button.classList.add('btn', 'btn-success', 'btn-sm');
                                button.style.margin = '2px'; // Add margin here

                                // Add event listener to handle form submission
                                button.addEventListener('click', function() {
                                    // Prevent the default behavior of the button click event
                                    event.preventDefault();
                                    // Set the value of hidden inputs
                                    const dateInput = document.createElement('input');
                                    dateInput.type = 'hidden';
                                    dateInput.name = 'appointment_date';
                                    dateInput.value = datetime.date;

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
                                        title: title,
                                        department: department,
                                        doctor: doctor,
                                        appointment_date: datetime.date,
                                        appointment_time: time
                                    });

                                    // Save the data to localStorage
                                    localStorage.setItem('appointmentData', appointmentData);

                                    // You can do further processing here, such as redirecting to another page
                                    window.location.href =
                                        'http://127.0.0.1:8000/Patient/acceptPayment';
                                    // submitForm();
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
