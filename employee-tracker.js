new Vue({
    el: '#app',
    data: {
        employeeName: '',
        entered: false,
        employees: []
    },
    mounted() {
        // Fetch the list of current employees from your Laravel backend when the component is mounted
        this.fetchEmployees();
    },
    methods: {
        fetchEmployees() {
            // Fetch employees from your Laravel backend
            fetch('http://localhost:8000/api/employees') // Replace with your Laravel backend URL
                .then(response => response.json())
                .then(data => {
                    this.employees = data;
                })
                .catch(error => {
                    console.error('Error fetching employee data:', error);
                });
        },
        registerEntry() {
            // Implement logic to register entry in your Laravel backend
            // You can send a POST request to your Laravel backend to register entry
            // Use this.employeeName to send the employee's name to the backend
            fetch('http://localhost:8000/api/register-entry', { // Replace with your Laravel backend URL
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ name: this.employeeName }),
            })
                .then(response => response.json())
                .then(data => {
                    // Handle the response from your backend if needed
                    this.entered = true; // Set entered to true upon successful entry
                })
                .catch(error => {
                    console.error('Error registering entry:', error);
                });
        },
        registerExit() {
            // Implement logic to register exit in your Laravel backend
            // You can send a POST request to your Laravel backend to register exit
            // Use this.employeeName to send the employee's name to the backend
            fetch('http://localhost:8000/api/register-exit', { // Replace with your Laravel backend URL
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ name: this.employeeName }),
            })
                .then(response => response.json())
                .then(data => {
                    // Handle the response from your backend if needed
                    this.entered = false; // Set entered to false upon successful exit
                })
                .catch(error => {
                    console.error('Error registering exit:', error);
                });
        },
    }
});
