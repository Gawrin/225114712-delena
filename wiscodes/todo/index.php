<?php
require_once 'db.php';

$stmt = $conn->query("SELECT * FROM tasks ORDER BY created_at DESC");
$tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
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
            max-width: 800px;
            margin: 0 auto;
        }
        .task-list {
            background: #2a2a2a;
            border-radius: 10px;
            padding: 20px;
        }
        .task-item {
            background: #333;
            margin: 10px 0;
            padding: 15px;
            border-radius: 8px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .add-btn {
            background: var(--neon-green);
            color: var(--midnight-black);
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .action-btn {
            background: transparent;
            border: 1px solid var(--neon-green);
            color: var(--neon-green);
            padding: 5px 10px;
            border-radius: 5px;
            margin-left: 5px;
            cursor: pointer;
        }

        /* Add these media queries at the end of the style block */
        @media screen and (max-width: 768px) {
            .container {
                padding: 10px;
                margin: 0 10px;
            }

            .task-list {
                padding: 10px;
            }

            .task-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .task-item div:last-child {
                width: 100%;
                display: flex;
                gap: 10px;
            }

            .action-btn {
                flex: 1;
                text-align: center;
                padding: 10px;
                font-size: 16px;
            }

            .add-btn {
                display: block;
                width: 100%;
                text-align: center;
                padding: 15px;
                font-size: 16px;
            }

            h1 {
                font-size: 24px;
                margin-bottom: 15px;
            }

            h3 {
                margin: 0 0 5px 0;
                font-size: 18px;
            }

            p {
                margin: 0;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Todo List</h1>
        <a href="add.php" class="add-btn">Add New Task</a>
        
        <div class="task-list">
            <?php foreach($tasks as $task): ?>
                <div class="task-item">
                    <div>
                        <h3><?= htmlspecialchars($task['title']) ?></h3>
                        <p><?= htmlspecialchars($task['description']) ?></p>
                    </div>
                    <div>
                        <a href="edit.php?id=<?= $task['id'] ?>" class="action-btn">Edit</a>
                        <a href="delete.php?id=<?= $task['id'] ?>" class="action-btn" onclick="return confirm('Are you sure?')">Delete</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
