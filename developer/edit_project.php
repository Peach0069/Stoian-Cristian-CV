<?php
require_once 'db_connect.php';

$projectId = '';
$projectName = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $projectId = $_POST['project_id'];
    $projectName = $_POST['project_name'];
    
    $sql = "UPDATE project SET PROJECT_NAME = '$projectName' WHERE ID_PROJECT = '$projectId'";
    
    if ($conn->query($sql) === TRUE) {
        echo "Proiectul cu ID-ul '$projectId' a fost actualizat cu succes!";
    } else {
        echo "Eroare la actualizarea proiectului: " . $conn->error;
    }
    
    $conn->close();
} elseif (isset($_GET['id'])) {
    $projectId = $_GET['id'];
    $sql = "SELECT * FROM project WHERE ID_PROJECT = '$projectId'";
    $result = $conn->query($sql);
    
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $projectName = $row['PROJECT_NAME'];
    } else {
        echo "Proiectul nu a fost găsit!";
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Project</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="edit-project-container">
        <h2>Edit Project</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="hidden" name="project_id" value="<?php echo $projectId; ?>">
            <input type="text" name="project_name" value="<?php echo $projectName; ?>" required>
            <button type="submit">Update Project</button>
        </form>
        <a href="admin_dashboard.php">Back to Dashboard</a>
    </div>
</body>

</html>
