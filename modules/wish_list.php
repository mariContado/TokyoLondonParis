<?php
require 'db.php'; // include the database connection

$message = "";

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $fullname      = trim($_POST['fullname'] ?? '');
    $home_address  = trim($_POST['home_address'] ?? '');
    $phone_number  = trim($_POST['phone_number'] ?? '');
    $birth_date    = trim($_POST['birth_date'] ?? '');
    $wishnimo      = trim($_POST['wishnimo'] ?? '');

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



              <h5 class="card-title">Datatables</h5>
              
 <table class="table datatable">
    <thead>
      <tr>

        <th>ID</th>
        <th>Fullname</th>
        <th>Home Address</th>
        <th>Phone Number</th>
        <th>Birth Date</th>
        <th>Wish Nimo</th>

      </tr>
    </thead>
    <tbody>




<?php
// Fetch all data from table
$result = $conn->query("SELECT * FROM wishkolangtbl ORDER BY id DESC");

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['id']) . "</td>";
        echo "<td>" . htmlspecialchars($row['fullname']) . "</td>";
        echo "<td>" . htmlspecialchars($row['home_address']) . "</td>";
        echo "<td>" . htmlspecialchars($row['phone_number']) . "</td>";
        echo "<td>" . htmlspecialchars($row['birth_date']) . "</td>";
        echo "<td>" . htmlspecialchars($row['wishnimo']) . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='6'>No data found.</td></tr>";
}

$conn->close();
?>

              </table>