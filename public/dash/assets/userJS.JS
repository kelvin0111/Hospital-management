// function getMedicalDepertment() {
//     // Make an API call to fetch medical department data
//     fetch('/api/getMedicalDepertment')
//         .then(response => response.json())
//         .then(data => {
//             // Get the element where you want to display the data
//             const departmentList = document.getElementById('department-list');

//             // Clear any existing content
//             departmentList.innerHTML = '';

//             // Loop through the fetched data and create HTML elements to display it
//             return data;

//             data.forEach(department => {
//                 // Create a list item element
//                 const listItem = document.createElement('li');
//                 listItem.textContent = department.department;

//                 // Append the list item to the department list
//                 departmentList.appendChild(listItem);
//             });
//         })
//         .catch(error => {
//             // Handle any errors
//             console.error('Error fetching medical departments:', error);
//         });
// }