const QRCode = require('qrcode');
const PDFDocument = require('pdfkit');
const schedule = require('node-schedule');
const fs = require('fs');

const generateQR = async (text) => {
    try {
        return await QRCode.toDataURL(text);
    } catch (err) {
        console.error(err);
    }
};

const createPDF = async (qrData) => {
    const doc = new PDFDocument();
    const outputPath = './QR_Attendance_System.pdf';

    doc.pipe(fs.createWriteStream(outputPath));

    // Title
    doc.fontSize(25).text('QR Attendance System', {
        align: 'center'
    });

    // QR Code
    const qrSize = 250; // Size of the QR code
    const pageCenter = doc.page.width / 2;
    const qrPositionX = pageCenter - (qrSize / 2); // Centering the QR code

    // Adding some vertical space after the title
    doc.moveDown(2);

    doc.image(qrData, qrPositionX, doc.y, {
        fit: [qrSize, qrSize]
    });

    doc.end();
    console.log("PDF created with new QR Code.");
};

const generateAndUpdatePDF = async () => {
    const qrData = await generateQR('http://127.0.0.1:8000/');
    await createPDF(qrData);
};

/*
The first 0 stands for the 0th minute.
The second 0 stands for the 0th hour.
The asterisks * in the other positions mean "every day of the month", "every month", and "every day of the week".
Therefore, 0 0 * * * means the function generateAndUpdatePDF() will execute at midnight (00:00) every day.
*/
// Schedule the task to run at midnight every day
schedule.scheduleJob('0 0 * * *', function(){
    generateAndUpdatePDF();
});

// Generate initial PDF
generateAndUpdatePDF();
