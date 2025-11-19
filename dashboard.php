<?php
include 'db.php';
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

$user_id = $_SESSION['user_id'];

// Count total resources
$totalQuery = $conn->query("SELECT COUNT(*) AS total FROM resources WHERE user_id=$user_id");
$totalResources = $totalQuery->fetch_assoc()['total'];

// Count each type (Course, Article, Video)
$typeQuery = $conn->query("SELECT type, COUNT(*) as count FROM resources WHERE user_id=$user_id GROUP BY type");
$typeCounts = [];
while ($row = $typeQuery->fetch_assoc()) {
    $typeCounts[$row['type']] = $row['count'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard - AI Learning Tracker</title>
  <link rel="stylesheet" href="style.css">
  <style>
    .dashboard {
      margin-top: 100px;
      text-align: center;
    }

    .cards {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 20px;
      margin-top: 30px;
    }

    .card {
      background: #161b22;
      padding: 20px;
      border-radius: 10px;
      width: 200px;
      text-align: center;
      box-shadow: 0 0 10px #000;
      transition: 0.3s;
    }

    .card:hover {
      transform: scale(1.05);
      background: #1e2633;
    }

    .card h3 {
      color: #58a6ff;
      font-size: 20px;
      margin-bottom: 10px;
    }

    .card p {
      font-size: 24px;
      font-weight: bold;
    }

    .actions {
      margin-top: 40px;
    }

    .actions a {
      background-color: #2563eb;
      padding: 10px 20px;
      color: white;
      border-radius: 8px;
      text-decoration: none;
      margin: 10px;
      transition: 0.3s;
    }

    .actions a:hover {
      background-color: #1d4ed8;
    }
  </style>
</head>
<body>

<div class="navbar">
  <h1>AI Learning Tracker 🤖</h1>
  <nav>
    <a href="add_resource.html">Add Resource</a>
    <a href="view_resources.php">View Resources</a>
    <a href="logout.php">Logout</a>
  </nav>
</div>

<div class="dashboard">
  <h2>Welcome, <?php echo $_SESSION['email']; ?> 👋</h2>
  <p>Here’s your AI Learning Progress Summary:</p>

  <div class="cards">
    <div class="card">
      <h3>Total Resources</h3>
      <p><?php echo $totalResources; ?></p>
    </div>

    <div class="card">
      <h3>Courses</h3>
      <p><?php echo $typeCounts['Course'] ?? 0; ?></p>
    </div>

    <div class="card">
      <h3>Articles</h3>
      <p><?php echo $typeCounts['Article'] ?? 0; ?></p>
    </div>

    <div class="card">
      <h3>Videos</h3>
      <p><?php echo $typeCounts['Video'] ?? 0; ?></p>
    </div>
  </div>

  <div class="actions">
    <a href="add_resource.html">➕ Add New Resource</a>
    <a href="view_resources.php">📂 View All Resources</a>
  </div>
</div>

</body>
</html>
