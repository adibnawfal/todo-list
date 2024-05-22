<!DOCTYPE html>
<html lang="en">

<head>
    <title>To-do List</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
    <h1>To-do List</h1>
    <form method="POST" action="add_task.php">
        <input type="text" name="task" placeholder="Write your tasks here" required />
        <button name="add">
            Add Task
        </button>
    </form>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Tasks</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
      require 'config.php';

      $fetchingtasks = mysqli_query($db, "SELECT * FROM task ORDER BY task_id ASC")
        or die(mysqli_error($db));
      $count = 1;
      while ($fetch = $fetchingtasks->fetch_array()) {
        ?>
            <tr>
                <td><?php echo $count++ ?></td>
                <td><?php echo $fetch['task'] ?></td>
                <td><?php echo $fetch['status'] ?></td>
                <td colspan="2">
                    <?php
            if ($fetch['status'] != "Done") {
              echo
                '<a href="update_task.php?task_id=' .
                $fetch['task_id'] .
                '">✅</a>';
            }
            ?>
                    <a href="delete_task.php?task_id=<?php echo $fetch['task_id'] ?>">
                        ❌
                    </a>
                </td>
            </tr>
            <?php
      }
      ?>
        </tbody>
    </table>
</body>

</html>