<?php
// use shared DB connection
require 'db.php';

$message = "";

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $fullname      = trim($_POST['fullname'] ?? '');
    $home_address  = trim($_POST['home_address'] ?? '');
    $phone_number  = trim($_POST['phone_number'] ?? '');
    $birth_date    = trim($_POST['birth_date'] ?? '');
    $wishnimo      = trim($_POST['wishnimo'] ?? '');

    // Basic validation
    if ($fullname === '' || $home_address === '' || $phone_number === '' || $birth_date === '' || $wishnimo === '') {
        $message = "All fields are required.";
    } else {

        $stmt = $conn->prepare("
            INSERT INTO wishkolangtbl (fullname, home_address, phone_number, birth_date, wishnimo)
            VALUES (?, ?, ?, ?, ?)
        ");

        if ($stmt) {
            $stmt->bind_param("sssss", $fullname, $home_address, $phone_number, $birth_date, $wishnimo);

            if ($stmt->execute()) {
                $message = "Wish submitted successfully!";
            } else {
                $message = "Failed to save wish. Please try again.";
            }

            $stmt->close();
        } else {
            $message = "An error occurred. Please try again later.";
        }
    }
}
?>


<body class="p-4">

<div class="container">
    <h5 class="card-title mb-3">Wish Ko Lang Form</h5>

    <?php if (!empty($message)): ?>
        <div class="alert alert-info"><?php echo htmlspecialchars($message); ?></div>
    <?php endif; ?>

    <form class="row g-3" method="post" action="">
      <div class="col-md-12">
        <div class="form-floating">
          <input type="text" class="form-control" id="floatingApplicantName" name="fullname" placeholder="Full Name" required>
          <label for="floatingApplicantName">Full Name</label>
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-floating">
          <input type="text" class="form-control" id="floatingApplicantEmail" name="home_address" placeholder="Home Address" required>
          <label for="floatingApplicantEmail">Home Address</label>
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-floating">
          <input type="tel" class="form-control" id="floatingPhone" name="phone_number" placeholder="Phone Number" required>
          <label for="floatingPhone">Phone Number</label>
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-floating">
          <input type="date" class="form-control" id="floatingPosition" name="birth_date" placeholder="Birth Date" required>
          <label for="floatingPosition">Birth Date</label>
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-floating">
          <input type="text" class="form-control" id="floatingExperience" name="wishnimo" placeholder="Your Wish" required>
          <label for="floatingExperience">Your Wish</label>
        </div>
      </div>

      <div class="text-center">
        <button type="submit" class="btn btn-primary">Submit Wish</button>
        <button type="reset" class="btn btn-secondary">Reset</button>
      </div>
    </form>
</div>

</body>
</html>
