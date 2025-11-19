<?php
include 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $type = $_POST['type'];
    $platform = $_POST['platform'];
    $user_id = $_SESSION['user_id'];

    $stmt = $conn->prepare("INSERT INTO resources (user_id, title, type, platform) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $user_id, $title, $type, $platform);

    if ($stmt->execute()) {
        echo "<script>
                alert('Resource added successfully!');
                window.location='view_resources.php';
              </script>";
    } 
    else {
        echo "<script>
                alert('Error adding resource.');
                window.location='add_resource.html';
              </script>";
    }
}
?>
