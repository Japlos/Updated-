<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Request Appointment</title>
  <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
  <script crossorigin src="https://unpkg.com/react@18/umd/react.development.js"></script>
<script crossorigin src="https://unpkg.com/react-dom@18/umd/react-dom.development.js"></script>
  <link rel="stylesheet" href="studentdashboard.css" />

  <script>

     // Function to pre-select the document type based on URL parameter
     function preSelectDocument() {
      const urlParams = new URLSearchParams(window.location.search);
      const documentType = urlParams.get('document');
      if (documentType) {
        const selectElement = document.getElementById('document');
        selectElement.value = documentType;
        showFileInput(); // Call this to update the form based on the selected document
      }
    }

    // Call preSelectDocument when the page loads
    window.onload = preSelectDocument;
    // Function to dynamically show the form based on selected document
    function showFileInput() {
  const selectedDocument = document.getElementById('document').value;
  const fileInputDiv = document.getElementById('file-input-div');
  const fileInputLabel = document.getElementById('file-input-label');
  const formFields = document.getElementById('form-fields');
  const secondFileInputDiv = document.getElementById('second-file-input-div');
  const receiptDiv = document.getElementById('receipt');
  const totalCostDiv = document.getElementById('total-cost');

  let documentCost = 0;

  // Clear previous form fields
  formFields.innerHTML = '';
  secondFileInputDiv.style.display = 'none'; // Hide second file input by default
  receiptDiv.style.display = 'none'; // Hide receipt initially

  // Hide the file input div by default
  fileInputDiv.style.display = 'none';

  // Modify the form based on the selected document type
  if (selectedDocument === 'TOR' || selectedDocument === 'GWA') {
    // Show fields specific to TOR (Transcript of Records)
    formFields.innerHTML = `
      <div class="form-row">
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
          <label for="year-graduate">Year Graduate:</label>
          <input type="text" id="year-graduate" name="year-graduate" required>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group">
          <label for="section">Section:</label>
          <input type="text" id="section" name="section" required>
        </div>

        <div class="form-group">
          <label for="course">Course:</label>
          <select id="course" name="course" required>
            <option value="">-- Select Course --</option>
            <option value="ACT">Associative in Computer Technology</option>
            <option value="BACOMM">Bachelor of Arts in Communication</option>
            <option value="BSBA">Bachelor of Science in Business Administration</option>
            <option value="BSCRIM">Bachelor of Science in Criminology</option>
            <option value="BSCS">Bachelor of Science in Computer Science</option>
            <option value="BSED">Bachelor of Secondary Education</option>
            <option value="BPED">Bachelor in Primary Education</option>
            <option value="BSN">Bachelor of Science in Nursing</option>
          </select>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group">
          <label for="cellphone">Cellphone Number:</label>
          <input type="text" id="cellphone" name="cellphone" required>
        </div>

        <div class="form-group">
          <label for="gender">Gender:</label>
          <select id="gender" name="gender" required>
            <option value="">-- Select Gender --</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
          </select>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group">
          <label for="appointment-date">Preferred Appointment Date:</label>
          <input type="date" id="appointment-date" name="appointment-date" required>
        </div>
        <div class="form-group">
          <label for="appointment-time">Preferred Appointment Time:</label>
          <input type="time" id="appointment-time" name="appointment-time" required>
        </div>
      </div>
    `;
    // Show the file input for TOR or GWA
    fileInputDiv.style.display = 'block';
    fileInputLabel.innerText = 'Upload Any Valid ID:';
    
    // Show the receipt for TOR or GWA
    receiptDiv.style.display = 'block';
    
    if (selectedDocument === 'TOR') {
      totalCostDiv.innerText = "150 PHP"; // Cost for TOR
      documentCost = 150;
    } else if (selectedDocument === 'GWA') {
      totalCostDiv.innerText = "25 PHP"; // Cost for GWA
      documentCost = 25;
    }
  } else if (selectedDocument === 'COR') {
    // Show fields specific to COR (Certificate of Registration)
    formFields.innerHTML = `
      <div class="form-row">
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" id="name" name="name" required>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group">
          <label for="student">Student Number:</label>
          <input type="text" id="student" name="student" required>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group">
          <label for="appointment-date">Preferred Appointment Date:</label>
          <input type="date" id="appointment-date" name="appointment-date" required>
        </div>
        <div class="form-group">
          <label for="appointment-time">Preferred Appointment Time:</label>
          <input type="time" id="appointment-time" name="appointment-time" required>
        </div>
      </div>
    `;
    // Show the file input for COR
    fileInputDiv.style.display = 'block';
    fileInputLabel.innerText = 'Upload your 1st Semester Grades:';

    secondFileInputDiv.style.display = 'block';
    secondFileInputDiv.innerHTML = `
    <div class="form-group">
        <label for="second-semester">Upload your 2nd Semester Grades:</label>
        <input type="file" id="second-semester" name="second-semester" required />
      </div>
    `;
    
    // Hide receipt for COR (no cost)
    receiptDiv.style.display = 'none';
    documentCost = 0; // No cost for COR
  } else if (selectedDocument === 'ID') {
    // Show fields for ID document
    formFields.innerHTML = `
      <div class="form-row">
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" id="name" name="name" required>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group">
          <label for="student">Student Number:</label>
          <input type="text" id="student" name="student" required>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group">
          <label for="appointment-date">Preferred Appointment Date:</label>
          <input type="date" id="appointment-date" name="appointment-date" required>
        </div>
        <div class="form-group">
          <label for="appointment-time">Preferred Appointment Time:</label>
          <input type="time" id="appointment-time" name="appointment-time" required>
        </div>
      </div>
    `;
    // Show the file input for ID
    fileInputDiv.style.display = 'block';
    fileInputLabel.innerText = 'Upload Your COR (Certificate of Registration):';
    
    // Hide the receipt for ID (no cost)
    receiptDiv.style.display = 'none';
    documentCost = 0; // No cost for ID
  } else {
    // If no document type is selected, hide the file input and receipt
    fileInputDiv.style.display = 'none';
    secondFileInputDiv.style.display = 'none';
    receiptDiv.style.display = 'none';
  }

  document.querySelector('.submit-btn').addEventListener('click', function(event) {
      event.preventDefault();  // Prevent the default form submission behavior

      const selectedDocument = document.getElementById('document').value;
      
      // Gather form data
      const formData = {
        name: document.getElementById('name').value,
        studentNumber: document.getElementById('student') ? document.getElementById('student').value : '',
        yearGraduate: document.getElementById('year-graduate') ? document.getElementById('year-graduate').value : '',
        section: document.getElementById('section') ? document.getElementById('section').value : '',
        course: document.getElementById('course') ? document.getElementById('course').value : '',
        cellphone: document.getElementById('cellphone') ? document.getElementById('cellphone').value : '',
        gender: document.getElementById('gender') ? document.getElementById('gender').value : '',
        firstSemesterGrades: document.getElementById('document-file') ? document.getElementById('document-file').files[0] : '',
        secondSemesterGrades: document.getElementById('second-semester') ? document.getElementById('second-semester').files[0] : '',
        appointmentDate: document.getElementById('appointment-date') ? document.getElementById('appointment-date').value : '',
        appointmentTime: document.getElementById('appointment-time') ? document.getElementById('appointment-time').value : ''
      };

      // Show the confirmation modal with the form data
      const confirmationDetails = document.getElementById('confirmation-details');
      let confirmationHTML = '';

      if (selectedDocument === 'TOR' || selectedDocument === 'GWA') {
        confirmationHTML = `
          <p><strong>Name:</strong> ${formData.name}</p>
          <p><strong>Year Graduate:</strong> ${formData.yearGraduate}</p>
          <p><strong>Section:</strong> ${formData.section}</p>
          <p><strong>Course:</strong> ${formData.course}</p>
          <p><strong>Cellphone:</strong> ${formData.cellphone}</p>
          <p><strong>Gender:</strong> ${formData.gender}</p>
          <p><strong>Total Cost:</strong> ${selectedDocument === 'TOR' ? '150 PHP' : '25 PHP'}</p>
          <p><strong>Preferred Appointment Date:</strong> ${formData.appointmentDate}</p>
          <p><strong>Preferred Appointment Time:</strong> ${formData.appointmentTime}</p>
        `;
      } else if (selectedDocument === 'COR' || selectedDocument === 'ID') {
        confirmationHTML = `
          <p><strong>Name:</strong> ${formData.name}</p>
          <p><strong>Student Number:</strong> ${formData.studentNumber}</p>
          <p><strong>Preferred Appointment Date:</strong> ${formData.appointmentDate}</p>
          <p><strong>Preferred Appointment Time:</strong> ${formData.appointmentTime}</p>
        `;
      }

      confirmationDetails.innerHTML = confirmationHTML;

      // Show the modal by changing its display to flex
      document.getElementById('confirmation-modal').style.display = 'flex';

    // Handle Edit action
    document.getElementById('edit-btn').addEventListener('click', function() {
      // Close the modal and let the user edit the form
      document.getElementById('confirmation-modal').style.display = 'none';
    });

    // Handle Submit action
    document.getElementById('submit-btn').addEventListener('click', function() {
      // Here you can handle form submission (e.g., send data to the server)
      alert('Form submitted!');
      document.getElementById('confirmation-modal').style.display = 'none';
    });
  });
}

  </script>
</head>

<body>

  <div class="sidebar">
    <a href="#" class="logo">
      <i class="bx bx-code-alt"></i>
      <div class="logo-name"><span>On_</span>A.ment</div>
    </a>
    <ul class="side-menu">
      <li><a href="admindashboard.php"><i class="bx bxs-dashboard"></i>Dashboard</a></li>
      <li class="active"><a href="request.php"><i class="bx bx-store-alt"></i>Request</a></li>
      <li><a href="appointment.php"><i class="bx bx-analyse"></i>Appointment</a></li>
      <li><a href="login.php"><i class="bx bx-group"></i>Registrar</a> </li>
    </ul>
    <ul class="side-menu">
      <li><a href="#" class="logout"><i class="bx bx-log-out-circle"></i>Logout</a></li>
    </ul>
  </div>

  <div class="content">
    <nav>
      <i class="bx bx-menu"></i>
      <input type="checkbox" id="theme-toggle" hidden />
      <label for="theme-toggle" class="theme-toggle"></label>
    </nav>

    <div class="content">
      <main>
        <div class="header">
          <h1>Request Appointment</h1>
        </div>
        
        <div class="request-form">
          <form>
            <!-- Document Selection -->
            <div class="form-row">
              <div class="form-group">
                <label for="document">Select Document:</label>
                <select id="document" name="document" onchange="showFileInput()" required>
                  <option value="">-- Select Document --</option>
                  <option value="TOR">TOR (Transcript of Records)</option>
                  <option value="GWA">GWA (General Weighted Average)</option>
                  <option value="COR">COR (Certificate of Registration)</option>
                  <option value="ID">ID</option>
                </select>
              </div>
            </div>

            <!-- Dynamically generated form fields -->
            <div id="form-fields"></div>

            <!-- File Upload Input (Initially Hidden) -->
            <div id="file-input-div" class="form-row" style="display: none;">
              <div class="form-group">
                <label id="file-input-label" for="document-file"></label>
                <input type="file" id="document-file" name="document-file" required />
              </div>
            </div>

            <!-- Second File Upload Input (Initially Hidden for COR) -->
            <div id="second-file-input-div" class="form-row" style="display: none;"></div>
 
            <!-- Receipt Section (Initially Hidden) -->
            <div id="receipt" class="form-row" style="display: none;">
              <div class="form-group">
                <label>Total Cost:</label>
                <div id="total-cost" style="font-weight: bold; font-size: 18px;"></div>
              </div>
            </div>

            <button type="submit" class="submit-btn">Request Appointment</button>

          </form>
        </div>
      </main>
    </div>
  </div>

  <!-- Confirmation Modal -->
<!-- Confirmation Modal with Form -->
<div id="confirmation-modal" class="modal" style="display: none;">
  <div class="modal-content">
    <h2>Confirm Your Details</h2>
    <form id="confirmation-form">
      <div id="confirmation-details">
        <!-- Dynamically populated details will go here -->
      </div>
      <div class="form-row">
        <button id="edit-btn" type="button" class="submit-btn">Edit</button>
        <button id="submit-btn" type="submit" class="submit-btn">Confirm</button>
      </div>
    </form>
  </div>
</div>



  <style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap");

    :root {
      --light: #f6f6f9;
      --primary: #1976d2;
      --light-primary: #cfe8ff;
      --grey: #eee;
      --dark-grey: #aaaaaa;
      --dark: #363949;
      --danger: #d32f2f;
      --light-danger: #fecdd3;
      --warning: #fbc02d;
      --light-warning: #fff2c6;
      --success: #388e3c;
      --light-success: #bbf7d0;
    }


/* Style the modal container */
.modal {
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 90%;
  max-width: 500px;
  background-color: white;
  padding: 30px;
  border-radius: 8px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  z-index: 1000;
  display: none;
  max-height: 80vh;
  overflow-y: auto;
  box-sizing: border-box;
}

/* Optional: Optional backdrop to make modal pop */
.modal::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: rgba(0, 0, 0, 0.5); /* Semi-transparent dark background */
  z-index: -1; /* Keep the backdrop behind the modal */
}

.modal-content {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
}
/* Add these to your existing styles */

/* Body should be blurred when modal is visible */
body.modal-open {
  pointer-events: none; /* Disable interaction with the background */
}

/* The content behind the modal will be blurred */
body.modal-open .content {
  filter: blur(5px); /* Apply blur to content behind modal */
}

/* Modal itself should remain clear and white */
.modal {
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 90%;
  max-width: 500px;
  background-color: #d32f2f; /* White background for the modal */
  padding: 30px;
  color: white;
  border-radius: 8px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  z-index: 1000; /* Make sure modal is on top */
  display: none; /* Initially hidden */
  max-height: 80vh;
  overflow-y: auto;
  box-sizing: border-box;
}

/* Optional: Optional backdrop to make modal pop */
.modal::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: rgba(0, 0, 0, 0.5); /* Semi-transparent dark background */
  z-index: -1; /* Keep the backdrop behind the modal */
}

.modal-content {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
}

.modal h2 {
  font-size: 24px;
  font-weight: 600;
  margin-bottom: 20px;
}

.modal .form-row {
  margin-bottom: 20px;
}

.modal .form-group {
  margin-bottom: 10px;
}

.modal .form-group label {
  font-weight: 500;
  margin-bottom: 5px;
}

.modal .form-group input {
  width: 100%;
  padding: 8px;
  border: 1px solid var(--grey);
  border-radius: 5px;
}

.modal .form-group input:focus {
  border-color: var(--primary);
}

.modal button {
  margin-top: 20px;
  padding: 12px 20px;
  border-radius: 5px;
  cursor: pointer;
  background-color: var(--primary);
  color: white;
  font-size: 16px;
}

.modal button:hover {
  background-color: #1565c0;
}



/* Button styling */
.submit-btn {
  width: 45%;
  padding: 10px;
  border: none;
  background-color: #1976d2;
  color: white;
  border-radius: 5px;
  font-size: 16px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.submit-btn:hover {
  background-color: #1565c0;
}

.form-row {
  display: flex;
  justify-content: space-around;
  gap: 10px;
  margin-top: 20px;
}





    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
      background: var(--grey);
      overflow-x: hidden;
    }

    .content {
      position: relative;
      width: calc(85% - 230px);
      left: 230px;
      transition: all 0.3s ease;
    }

    .content main {
      width: 100%;
      padding: 36px 24px;
      max-height: calc(100vh - 56px);
    }

    .content main .header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      grid-gap: 16px;
      flex-wrap: wrap;
      margin-bottom: 24px;
    }

    .content main .header h1 {
      font-size: 36px;
      font-weight: 600;
      color: var(--danger);
    }

    .request-form {
      background: var(--light);
      padding: 24px;
      border-radius: 20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .form-row {
      display: flex;
      gap: 20px;
      margin-bottom: 20px;
    }

    .form-group {
      flex: 1;
    }

    .form-group.full-width {
      width: 100%;
    }

    .form-group label {
      display: block;
      margin-bottom: 5px;
      color: var(--dark);
      font-weight: 500;
    }

    .form-group input,
    .form-group select,
    .form-group textarea {
      width: 100%;
      padding: 10px;
      border: 1px solid var(--grey);
      border-radius: 5px;
      font-size: 16px;
      transition: border-color 0.3s ease;
    }

    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus {
      outline: none;
      border-color: var(--primary);
    }

    .input-icon {
      position: relative;
    }

    .input-icon i {
      position: absolute;
      top: 50%;
      right: 10px;
      transform: translateY(-50%);
      color: var(--dark-grey);
    }

    .form-group textarea {
      height: 100px;
      resize: vertical;
    }

    .submit-btn {
      background-color: var(--danger);
      color: white;
      border: none;
      padding: 12px 20px;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
      font-weight: 600;
      transition: background-color 0.3s ease;
      width: 100%;
      margin-top: 20px;
    }

    .submit-btn:hover {
      background-color: #b71c1c;
    }

    @media screen and (max-width: 768px) {
      .content {
        width: 100%;
        left: 0;
      }

      .form-row {
        flex-direction: column;
        gap: 0;
      }
    }
  </style>

  <script src="script.js"></script>
</body>

</html>
