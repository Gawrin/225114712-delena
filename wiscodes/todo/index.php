<?php
require_once 'db.php';

$stmt = $conn->query("SELECT * FROM tasks ORDER BY created_at DESC");
$tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Calculate progress
$total_tasks = count($tasks);
$completed_tasks = 0;
foreach($tasks as $task) {
    if($task['status'] === 'completed') {
        $completed_tasks++;
    }
}
$progress_percentage = $total_tasks > 0 ? round(($completed_tasks / $total_tasks) * 100) : 0;
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

        .completed {
            opacity: 0.7;
        }
        .completed h3 {
            text-decoration: line-through;
        }
        .status {
            color: var(--neon-green);
            font-size: 0.9em;
            margin-top: 5px;
        }
        .status-btn {
            background-color: var(--neon-green) !important;
            color: var(--midnight-black) !important;
        }

        /* Add these new styles */
        .progress-container {
            background: #2a2a2a;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
        }
        
        .progress-bar {
            background: #333;
            height: 25px;
            border-radius: 12.5px;
            position: relative;
            overflow: hidden;
            margin: 10px 0;
        }
        
        .progress-fill {
            background: var(--neon-green);
            height: 100%;
            transition: width 0.3s ease;
        }
        
        .progress-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #fff;
            font-weight: bold;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
        }
        
        .checkmark {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 2px solid var(--neon-green);
            border-radius: 50%;
            margin-right: 10px;
            position: relative;
        }
        
        .completed .checkmark::after {
            content: '✓';
            position: absolute;
            color: var(--neon-green);
            font-size: 14px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        
        .task-header {
            display: flex;
            align-items: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Todo List</h1>
        
        <!-- Add Progress Bar -->
        <div class="progress-container">
            <h3>Progress</h3>
            <div class="progress-bar">
                <div class="progress-fill" style="width: <?= $progress_percentage ?>%"></div>
                <div class="progress-text"><?= $progress_percentage ?>% Complete</div>
            </div>
            <p><?= $completed_tasks ?> of <?= $total_tasks ?> tasks completed</p>
        </div>

        <a href="add.php" class="add-btn">Add New Task</a>
        
        <div class="task-list">
            <?php foreach($tasks as $task): ?>
                <div class="task-item <?= $task['status'] === 'completed' ? 'completed' : '' ?>">
                    <div>
                        <div class="task-header">
                            <span class="checkmark"></span>
                            <h3><?= htmlspecialchars($task['title']) ?></h3>
                        </div>
                        <p><?= htmlspecialchars($task['description']) ?></p>
                        <p class="status">Status: <?= ucfirst($task['status']) ?></p>
                    </div>
                    <div>
                        <a href="update_status.php?id=<?= $task['id'] ?>&status=<?= $task['status'] === 'pending' ? 'completed' : 'pending' ?>" 
                           class="action-btn status-btn">
                           <?= $task['status'] === 'pending' ? 'Mark Complete' : 'Mark Pending' ?>
                        </a>
                        <a href="edit.php?id=<?= $task['id'] ?>" class="action-btn">Edit</a>
                        <a href="delete.php?id=<?= $task['id'] ?>" class="action-btn" onclick="return confirm('Are you sure?')">Delete</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
