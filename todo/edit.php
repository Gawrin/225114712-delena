<?php
require_once 'db.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    
    $stmt = $conn->prepare("UPDATE tasks SET title = ?, description = ? WHERE id = ?");
    $stmt->execute([$title, $description, $id]);
    
    header("Location: index.php");
    exit();
}

$stmt = $conn->prepare("SELECT * FROM tasks WHERE id = ?");
$stmt->execute([$id]);
$task = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$task) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    <style>
        :root {
            --midnight-black: #1a1a1a;
            --neon-green: #39FF14;
        }
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background-color: var(--midnight-black);
            color: #fff;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
        }
        .form-group {
            margin-bottom: 20px;
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            background: #333;
            border: 1px solid #444;
            color: #fff;
            border-radius: 5px;
        }
        .submit-btn {
            background: var(--neon-green);
            color: var(--midnight-black);
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Task</h1>
        <form method="POST">
            <div class="form-group">
                <label>Title:</label>
                <input type="text" name="title" value="<?= htmlspecialchars($task['title']) ?>" required>
            </div>
            <div class="form-group">
                <label>Description:</label>
                <textarea name="description" rows="4"><?= htmlspecialchars($task['description']) ?></textarea>
            </div>
            <button type="submit" class="submit-btn">Update Task</button>
        </form>
    </div>
</body>
</html>
