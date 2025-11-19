<?php
include 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit;
}

$user_id = $_SESSION['user_id'];
$result = $conn->query("SELECT * FROM resources WHERE user_id = $user_id");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>View Resources</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="navbar">
  <h1>AI Learning Tracker 🤖</h1>
  <nav>
    <a href="add_resource.html">Add Resource</a>
    <a href="view_resources.php">View Resources</a>
    <a href="dashboard.html">Dashboard</a>
    <a href="logout.php">Logout</a>
  </nav>
</div>

<div class="container">
  <h2>Your AI Learning Resources</h2>
  <table border="1" cellpadding="10" style="margin:auto; background:#161b22; color:white;">
    <tr>
      <th>Title</th>
      <th>Type</th>
      <th>Platform</th>
      <th>Date Added</th>
    </tr>
    
    <?php while ($row = $result->fetch_assoc()) { ?>
    <tr>
      <td><?php echo $row['title']; ?></td>
      <td><?php echo $row['type']; ?></td>
      <td><?php echo $row['platform']; ?></td>
      <td><?php echo $row['created_at']; ?></td>
    </tr>
    <?php } ?>
  </table>
</div>

</body>
</html>
