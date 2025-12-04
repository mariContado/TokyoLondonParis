<?php

$host     = "localhost";
$user     = "root";
$password = "";
$dbname   = "wishkolang";


$conn = new mysqli($host, $user, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $fullname      = $_POST['fullname'] ?? '';
    $home_address  = $_POST['home_address'] ?? '';
    $phone_number  = $_POST['phone_number'] ?? '';
    $birth_date    = $_POST['birth_date'] ?? '';
    $wishnimo      = $_POST['wishnimo'] ?? '';

    // Basic validation
    if (empty($fullname) || empty($home_address) || empty($phone_number) || empty($birth_date) || empty($wishnimo)) {
        $message = "All fields are required.";
    } else {
        // 👍 Direct INSERT (no SQL function, simpler)
        $stmt = $conn->prepare("
            INSERT INTO wishkolangtbl (fullname, home_address, phone_number, birth_date, wishnimo)
            VALUES (?, ?, ?, ?, ?)
        ");
        $stmt->bind_param("sssss", $fullname, $home_address, $phone_number, $birth_date, $wishnimo);

        if ($stmt->execute()) {
            $message = "Wish submitted successfully! ";
        } else {
            $message = "Error saving wish: " . $conn->error;
        }

        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Wish Ko Lang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">

<div class="container">
    <h5 class="card-title mb-3">Wish Ko Lang</h5>

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
