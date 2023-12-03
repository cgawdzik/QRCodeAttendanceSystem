// Updated employee-tracker.js with QR code scanning
new Vue({
    el: '#app',
    data: {
        employeeName: '',
        entered: false,
        scanner: null
    },
    mounted() {
        // Initialize the scanner only if Instascan is loaded and scanner is not yet initialized
        if (typeof Instascan !== 'undefined' && !this.scanner) {
            this.initializeScanner();
        }
    },
    methods: {
        initializeScanner: function() {
            let self = this;
            self.scanner = new Instascan.Scanner({ video: document.getElementById('qr-scanner') });
            self.scanner.addListener('scan', function (content) {
                console.log('Scanned content:', content);
                // You can now use the `content` from the QR code to perform your logic
                // For simplicity, assuming the content is the employee name
                self.employeeName = content;
                // Trigger the appropriate action based on whether the user is entering or exiting
                if (!self.entered) {
                    self.registerEntry();
                } else {
                    self.registerExit();
                }
            });

            // Start the scanner with the first available camera
            Instascan.Camera.getCameras().then(function (cameras) {
                if (cameras.length > 0) {
                    self.scanner.start(cameras[0]);
                } else {
                    console.error('No cameras found.');
                }
            }).catch(function (e) {
                console.error(e);
            });
        },
        registerEntry: function() {
            // ... existing entry registration logic
        },
        registerExit: function() {
            // ... existing exit registration logic
        }
    }
});
