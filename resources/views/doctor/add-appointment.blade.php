@extends('layouts.dashboard.doc_main')

@section('content')
    <div class="page-wrapper">
        <div class="content ">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h4 class="page-title">Add Appointment</h4>
                </div>
            </div>

            <div class=" row col-md-12 justify-content-center">
                <form class="col-md-6 ">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Title</label>
                        <input type="text" class="form-control title" id="exampleFormControlInput1" placeholder="Title"
                            value="" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Select Medical Depertment</label>
                        <select class="form-control department" id="exampleFormControlSelect1" required>
                            <span value="" disabled selected hidden>Select Department</span>

                            <option></option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Select Doctors</label>
                        <select class="form-control doctors" id="exampleFormControlSelect1" required>
                            <option></option>
                        </select>
                    </div>

                    <div class="form-group datetime">
                        <button type="button" class="btn btn-primary btn-sm submit">Procced...</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <script>
        // Check if the current URL contains "/Patient/addAppointment"
        if (window.location.href.includes('http://127.0.0.1:8000/Patient/addAppointment')) {
            // If the URL matches, execute the logic to fetch medical department data
            function getMedicalDepartments() {
                console.log('Fetching medical departments...');

                // Make an API call to fetch medical department data
                fetch('http://127.0.0.1:8000/api/getMedicalDepertment')
                    .then(response => response.json())
                    .then(data => {

                        // Get all select elements with the "department" class
                        const selects = document.querySelectorAll('.department');

                        // Loop through each select element
                        selects.forEach(selectElement => {
                            // Clear any existing options
                            selectElement.innerHTML = '';

                            // Loop through the fetched data and create option elements
                            data.forEach(department => {
                                // Create an option element
                                const option = document.createElement('option');
                                option.textContent = department.department;

                                // Set the value attribute if needed
                                // Set the value attribute to the department ID
                                option.value = department.id;
                                // Append the option to the select element
                                selectElement.appendChild(option);
                            });
                        });
                    })
                    .catch(error => {
                        // Handle any errors
                        console.error('Error fetching medical departments:', error);
                    });
            }

            // Call the function to fetch and populate medical department data
            getMedicalDepartments();
        }

        // ************************************************************************************************************************
        document.querySelector('.department').addEventListener('click', function() {

            // Get the selected department ID
            const selectedDepartmentId = this.value;

            // Make a POST request to fetch doctors based on department ID
            fetch(`http://127.0.0.1:8000/api/getDoctorsBelongToDepartment/${selectedDepartmentId}`, {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',
                        // Add any other headers if needed
                    }
                })
                .then(response => response.json())
                .then(data => {
                    // Get the select element
                    const selectElement = document.querySelector('.doctors');

                    // Clear any existing options
                    selectElement.innerHTML = '';

                    // Loop through the fetched data and create option elements
                    data.forEach(doctor => {
                        // Create an option element
                        const option = document.createElement('option');
                        option.textContent = doctor
                            .name; // Assuming the doctor object has a "name" property

                        // Set the value attribute to the doctor's ID
                        option.value = doctor.id;

                        // Append the option to the select element
                        selectElement.appendChild(option);
                    });
                })
                .catch(error => {
                    // Handle any errors
                    console.error('Error fetching doctors:', error);
                });
        });


        document.querySelector('.submit').addEventListener('click', function(event) {
            // Prevent the default form submission behavior
            event.preventDefault();
            console.log('form button');
            // Get the form values
            const title = document.querySelector('.title').value;
            const department = document.querySelector('.department').value;
            const doctor = document.querySelector('.doctors').value;

            // Create an object with the form values
            const formData = {
                title: title,
                department: department,
                doctor: doctor
            };

            // Convert the object to a JSON string
            const formDataJSON = JSON.stringify(formData);

            // Save the JSON string to localStorage
            localStorage.setItem('formData', formDataJSON);

            // Log the saved data to the console
            console.log('Form data saved to localStorage:', formDataJSON);

            // You can do further processing here, such as redirecting to another page
            window.location.href = 'http://127.0.0.1:8000/Patient/appoitmantTimeView';
        });
    </script>
@endsection
