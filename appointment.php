<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="studentdashboard.css" />
    <title>Responsive Dashboard</title>
    <script>
      function appointNow(documentType) {
        window.location.href = `request.php?document=${documentType}`;
      }
    </script>
  </head>

  <body>
    <!-- Sidebar -->
    <div class="sidebar">
      <a href="#" class="logo">
        <i class="bx bx-code-alt"></i>
        <div class="logo-name"><span>On_</span>A.ment</div>
      </a>
      <ul class="side-menu">
        <li>
          <a href="admindashboard.php"><i class="bx bxs-dashboard"></i>Dashboard</a>
        </li>
        <li>
          <a href="request.php"><i class="bx bx-store-alt"></i>Request</a>
        </li>
        <li class="active">
          <a href="index.php"><i class="bx bx-analyse"></i>Appointment</a>
        </li>
        <li>
          <a href="registrar.php"><i class="bx bx-group"></i>Registrar</a>
        </li>
      </ul>
      <ul class="side-menu">
        <li>
          <a href="login.php" class="logout">
            <i class="bx bx-log-out-circle"></i>
            Logout
          </a>
        </li>
      </ul>
    </div>
    <!-- End of Sidebar -->

    <!-- Main Content -->
    <div class="content">
      <!-- Dark Theme Toggle -->
      <nav>
        <i class="bx bx-menu"></i>
        <input type="checkbox" id="theme-toggle" hidden />
        <label for="theme-toggle" class="theme-toggle"></label>
      </nav>
      <!-- End of Dark Theme Toggle-->

      <main>
        <!-- Insights Section -->
        <div class="insights">
          <!-- TOR Card -->
          <div class="card" id="tor-card">
            <div class="card-front">
              <i class="bx bx-file"></i>
              <div class="info">
                <h3>TOR (Transcript of Records)</h3>
              </div>
            </div>
            <div class="card-back">
              <div class="requirements">
                <p>Requirements: Any valid ID</p>
              </div>
              <button class="appoint-now" onclick="appointNow('TOR')">Appoint Now</button>
            </div>
          </div>

          <!-- GWA Card -->
<div class="card" id="gwa-card">
  <div class="card-front">
    <i class="bx bx-line-chart"></i>
    <div class="info">
      <h3><strong>GWA</strong></h3>
      <p><strong>General Weighted Average</strong></p>
    </div>
  </div>
  <div class="card-back">
    <div class="requirements">
      <p>Requirements: TOR</p>
    </div>
    <button class="appoint-now" onclick="appointNow('GWA')">Appoint Now</button>
  </div>
</div>

<!-- COR Card -->
<div class="card" id="cor-card">
  <div class="card-front">
    <i class="bx bx-card"></i>
    <div class="info">
      <h3><strong>COR</strong></h3>
      <p><strong>Certificate of Registration</strong></p>
    </div>
  </div>
  <div class="card-back">
    <div class="requirements">
      <p>Requirements: 1st or 2nd Semester Card</p>
    </div>
    <button class="appoint-now" onclick="appointNow('COR')">Appoint Now</button>
  </div>
</div>


          <!-- ID Card -->
          <div class="card" id="id-card">
            <div class="card-front">
              <i class="bx bx-id-card"></i>
              <div class="info">
                <h3>ID</h3>
              </div>
            </div>
            <div class="card-back">
              <div class="requirements">
                <p>Requirements: COR</p>
              </div>
              <button class="appoint-now" onclick="appointNow('ID')">Appoint Now</button>
            </div>
          </div>
        </div>
        <!-- End of Insights -->

        <div class="bottom-data">
          <div class="orders">
            <div class="header">
              <i class="bx bx-receipt"></i>
              <h3>Recent Requests</h3>
            </div>
            <table>
              <thead>
                <tr>
                  <th>Document</th>
                  <th>Request Date</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <p>John Doe</p>
                  </td>
                  <td>14-08-2023</td>
                </tr>
                <tr>
                  <td>
                    <p>John Doe</p>
                  </td>
                  <td>14-08-2023</td>
                </tr>
                <tr>
                  <td>
                    <p>John Doe</p>
                  </td>
                  <td>14-08-2023</td>
                </tr>
              </tbody>
            </table>
          </div>

          <!-- Reminders -->
          <div class="reminders">
            <div class="header">
              <i class="bx bx-note"></i>
              <h3>Reminders</h3>
            </div>
            <ul class="task-list">
              <li class="completed">
                <div class="task-title">
                  <i class="bx bx-check-circle"></i>
                  <p>Start Our Meeting</p>
                </div>
                <i class="bx bx-dots-vertical-rounded"></i>
              </li>
              <li class="completed">
                <div class="task-title">
                  <i class="bx bx-check-circle"></i>
                  <p>Analyse Our Site</p>
                </div>
                <i class="bx bx-dots-vertical-rounded"></i>
              </li>
              <li class="not-completed">
                <div class="task-title">
                  <i class="bx bx-x-circle"></i>
                  <p>Play Footbal</p>
                </div>
                <i class="bx bx-dots-vertical-rounded"></i>
              </li>
            </ul>
          </div>

          <!-- End of Reminders-->
        </div>
      </main>
    </div>

    <script src="script.js"></script>

    <style>
      /* General Card Styles */
.insights {
  display: flex;
  justify-content: space-between;
  gap: 20px;
}

.card {
  width: 220px;
  height: 300px;
  perspective: 1000px; /* Enables 3D effect */
}

.card-front,
.card-back {
  width: 100%;
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  backface-visibility: hidden; /* Hides the back when flipped */
  transition: transform 0.5s;
  position: absolute;
  top: 0;
  left: 0;
}

.card-front {
  background: #f1f1f1;
  border-radius: 10px;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  text-align: center;
}

.card-back {
  background: #d32f2f;
  color: white;
  border-radius: 10px;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  text-align: center;
  transform: rotateY(180deg);
}

.card:hover .card-front {
  transform: rotateY(180deg);
}

.card:hover .card-back {
  transform: rotateY(0);
}

.card .info {
  text-align: center;
}

.card .info h3 {
  font-size: 22px;  /* Adjusted to match TOR card */
  margin: 0;
}

.card .info p {
  font-size: 16px;  /* Adjusted to match TOR card */
  margin: 5px 0;
}

.card .info strong {
  font-weight: bold;
}

.card i {
  font-size: 50px;
  margin-bottom: 10px;
}

.card .requirements p {
  font-size: 18px;
  margin: 10px 0;
}

.card .appoint-now {
  padding: 10px 20px;
  font-size: 16px;
  background-color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  color: #0a0500;
  text-transform: uppercase;
}

.card .appoint-now:hover {
  background-color: #0a0500;
  color: white;
}

/* Adjusting for smaller screens */
@media (max-width: 768px) {
  .insights {
    flex-direction: column;
    align-items: center;
  }

  .card {
    width: 100%;
    margin-bottom: 20px;
  }
}

    </style>
  </body>
</html>
