<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "task_management";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle task addition
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['task-title'])) {
    $title = $_POST['task-title'];
    $assigned_to = $_POST['assigned-to'];
    $start_time = $_POST['start-time'];
    $end_time = $_POST['end-time'];
    $status = $_POST['status'];
    $priority = $_POST['priority'];

    $sql = "INSERT INTO tasks (title, assigned_to, start_time, end_time, status, priority)
            VALUES ('$title', '$assigned_to', '$start_time', '$end_time', '$status', '$priority')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>swal('Success', 'New task added successfully', 'success');</script>";
    } else {
        echo "<script>swal('Error', 'Error: " . $sql . "<br>" . $conn->error . "', 'error');</script>";
    }
}

// Handle task deletion
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $sql = "DELETE FROM tasks WHERE id=$delete_id";
    if ($conn->query($sql) === TRUE) {
        echo "<script>swal('Success', 'Task deleted successfully', 'success');</script>";
    } else {
        echo "<script>swal('Error', 'Error deleting task: " . $conn->error . "', 'error');</script>";
    }
}

// Handle task editing
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit-task'])) {
    $edit_id = $_POST['edit-id'];
    $title = $_POST['edit-task-title'];
    $assigned_to = $_POST['edit-assigned-to'];
    $start_time = $_POST['edit-start-time'];
    $end_time = $_POST['edit-end-time'];
    $status = $_POST['edit-status'];
    $priority = $_POST['edit-priority'];

    $sql = "UPDATE tasks SET 
            title='$title', 
            assigned_to='$assigned_to', 
            start_time='$start_time', 
            end_time='$end_time', 
            status='$status', 
            priority='$priority' 
            WHERE id=$edit_id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>swal('Success', 'Task updated successfully', 'success');</script>";
    } else {
        echo "<script>swal('Error', 'Error updating task: " . $conn->error . "', 'error');</script>";
    }
}

// Fetch all tasks
$sql = "SELECT * FROM tasks";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Task Management</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <style>
    
.sidebar {
    position: fixed;
    top: 0;
    left: -200px; /* Initially hide the sidebar off-screen */
    height: 100%;
    width: 200px; /* Adjust sidebar width as needed */
    background-color: #007BFF;
    color: white;
    padding: 20px;
    border-radius: 0 8px 8px 0; /* Rounded corners on the right side */
    z-index: 1000;
    overflow-y: auto;
    transition: left 0.3s ease; /* Smooth transition for sliding effect */
}

.sidebar.visible {
    left: 0; /* Slide sidebar into view */
}

.sidebar h2 {
    margin-bottom: 20px;
    text-align: center;
}

.sidebar button {
    margin-bottom: 10px;
    padding: 10px;
    border: none;
    background-color: #0056b3;
    color: white;
    border-radius: 5px;
    cursor: pointer;
    width: 100%;
    text-align: left;
}

.sidebar button:hover {
    background-color: #004080;
}



.toggle-sidebar {
    position: absolute;
    left: 20px; /* Adjust button position */
    top: 20px;
    background-color: #007BFF;
    color: white;
    padding: 5px 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    z-index: 1001;
}

.toggle-sidebar:hover {
    background-color: #00aab3;
}

body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #f4f4f4;
}
/* Add responsive styles here */
.container {
    width: 90%;
    max-width: 1200px;
    background: white;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    overflow-x: auto; /* Allow horizontal scroll on small screens */
}

header {
    display: flex;
    flex-wrap: wrap; /* Allow wrapping on small screens */
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
}
header .left-buttons {
    display: flex;
    flex-wrap: wrap; /* Allow wrapping on small screens */
    align-items: center;
    margin-bottom: 10px;
}

header .left-buttons {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
}

header .export-buttons {
    display: flex;
    flex-wrap: wrap; /* Allow wrapping on small screens */
    justify-content: flex-start;
    margin-top: 10px;
}

header .export-buttons button {
    margin-right: 5px;
    padding: 5px 10px;
    border: none;
    background-color: #007BFF;
    color: white;
    border-radius: 5px;
    cursor: pointer;
}

header .export-buttons button:hover {
    background-color: #0056b3;
}

header .search-input {
    display: flex;
    align-items: center;
    flex-wrap: wrap; /* Allow wrapping on small screens */
    margin-top: 5px;
}

header .search-input input[type="text"] {
    padding: 5px;
    margin-bottom: 5px;
}

header button {
    margin-top: 5px;
    padding: 5px 10px;
    border: none;
    background-color: #007BFF;
    color: white;
    border-radius: 5px;
    cursor: pointer;
}

header button:hover {
    background-color: #0056b3;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    overflow-x: auto; /* Allow horizontal scroll on small screens */
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 10px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}

.status-completed {
    background-color: green;
    padding: 5px 10px;
    border-radius: 5px;
    color: black;
}

.status-incomplete {
    background-color: red;
    padding: 5px 10px;
    border-radius: 5px;
    color: black;
}

.status-in-progress {
    background-color: yellow;
    padding: 5px 10px;
    border-radius: 5px;
    color: black;
}

.action-buttons button {
    margin-right: 5px;
    padding: 5px 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    color: white;
}

.action-buttons .edit-btn {
    background-color: rgb(0, 132, 255);
}

.action-buttons .delete-btn {
    background-color: red;
}

.action-buttons .file-attach-btn {
    background-color: orange;
}

.action-buttons button i {
    margin-right: 5px;
}

.action-buttons button:hover {
    opacity: 0.8;
}

/* Modal Styles */
.modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgb(0,0,0);
    background-color: rgba(0,0,0,0.4);
    padding-top: 60px;
}

.modal-content {
    background-color: #fefefe;
    margin: 5% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    max-width: 600px;
    border-radius: 10px;
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}

form {
    display: flex;
    flex-direction: column;
}

form label {
    margin-top: 10px;
}

form input, form select, form button {
    padding: 10px;
    margin-top: 5px;
}

@media screen and (max-width: 768px) {
    .container {
        padding: 10px;
    }
    header .left-buttons {
        flex-direction: column;
        align-items: flex-start;
    }
    header .export-buttons {
        justify-content: flex-start;
    }
    header .search-input {
        flex-direction: column;
        align-items: flex-start;
    }
    table {
        overflow-x: auto;
    }
}
@media screen and (max-width: 480px) {
    .container {
        padding: 5px;
    }
    header .left-buttons button,
    header .export-buttons button,
    header button,
    header .search-input input[type="text"] {
        padding: 5px;
        font-size: 12px;
    }
    table {
        font-size: 12px;
    }
}


</style>
</head>
<body>
    <button class="toggle-sidebar" onclick="toggleSidebar()">☰ Menu</button>
    <div class="sidebar">
        <h2>Task Management Menu</h2>
        <button onclick="indexlink()">Task Management</button>
        <button onclick="tasklink()">PHP Task</button>
        <!-- Add more buttons for other sidebar actions as needed -->
    </div>
    <script>
        function indexlink(){
            location.href="index.php";
        }
        function tasklink(){
            location.href="PHPprogrammingtask.php";
        }


</script>

    <div class="container">
        <header>
            <div class="left-buttons">
                <button onclick="openModal('add')">Add Task</button>
                <div class="export-buttons">
                    <button onclick="exportTableToCSV('tasks.csv')">Export to CSV</button>
                    <button onclick="exportTableToExcel('tasks.xlsx')">Export to Excel</button>
                    <button onclick="exportTableToPDF()">Export to PDF</button>
                </div>
                <div class="search-input">
                    <input type="text" id="search-input" onkeyup="searchTasks()" placeholder="Search for tasks...">
                </div>
            </div>
        </header>

        <table id="task-table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Assigned To</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Status</th>
                    <th>Priority</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['title']; ?></td>
                            <td><?php echo $row['assigned_to']; ?></td>
                            <td><?php echo $row['start_time']; ?></td>
                            <td><?php echo $row['end_time']; ?></td>
                            <td class="status-<?php echo strtolower($row['status']); ?>"><?php echo $row['status']; ?></td>
                            <td><?php echo $row['priority']; ?></td>
                            <td class="action-buttons">
                                <button class="edit-btn" onclick="openEditModal(<?php echo $row['id']; ?>, '<?php echo $row['title']; ?>', '<?php echo $row['assigned_to']; ?>', '<?php echo $row['start_time']; ?>', '<?php echo $row['end_time']; ?>', '<?php echo $row['status']; ?>', '<?php echo $row['priority']; ?>')">
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                                <button class="delete-btn" onclick="deleteTask(<?php echo $row['id']; ?>)">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7">No tasks found</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Add Task Modal -->
    <div id="add-task-modal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('add')">&times;</span>
            <h2>Add Task</h2>
            <form method="POST">
                <label for="task-title">Title</label>
                <input type="text" id="task-title" name="task-title" required>
                <label for="assigned-to">Assigned To</label>
                <input type="text" id="assigned-to" name="assigned-to" required>
                <label for="start-time">Start Time</label>
                <input type="datetime-local" id="start-time" name="start-time" required>
                <label for="end-time">End Time</label>
                <input type="datetime-local" id="end-time" name="end-time" required>
                <label for="status">Status</label>
                <select id="status" name="status" required>
                    <option value="Incomplete">Incomplete</option>
                    <option value="In Progress">In Progress</option>
                    <option value="Completed">Completed</option>
                </select>
                <label for="priority">Priority</label>
                <select id="priority" name="priority" required>
                    <option value="Low">Low</option>
                    <option value="Medium">Medium</option>
                    <option value="High">High</option>
                </select>
                <button type="submit">Add Task</button>
            </form>
        </div>
    </div>

    <!-- Edit Task Modal -->
    <div id="edit-task-modal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('edit')">&times;</span>
            <h2>Edit Task</h2>
            <form method="POST">
                <input type="hidden" id="edit-id" name="edit-id">
                <label for="edit-task-title">Title</label>
                <input type="text" id="edit-task-title" name="edit-task-title" required>
                <label for="edit-assigned-to">Assigned To</label>
                <input type="text" id="edit-assigned-to" name="edit-assigned-to" required>
                <label for="edit-start-time">Start Time</label>
                <input type="datetime-local" id="edit-start-time" name="edit-start-time" required>
                <label for="edit-end-time">End Time</label>
                <input type="datetime-local" id="edit-end-time" name="edit-end-time" required>
                <label for="edit-status">Status</label>
                <select id="edit-status" name="edit-status" required>
                    <option value="Incomplete">Incomplete</option>
                    <option value="In Progress">In Progress</option>
                    <option value="Completed">Completed</option>
                </select>
                <label for="edit-priority">Priority</label>
                <select id="edit-priority" name="edit-priority" required>
                    <option value="Low">Low</option>
                    <option value="Medium">Medium</option>
                    <option value="High">High</option>
                </select>
                <button type="submit" name="edit-task">Update Task</button>
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.25/jspdf.plugin.autotable.min.js"></script>
    <script>
        function toggleSidebar() {
            document.querySelector('.sidebar').classList.toggle('visible');
        }

        function openModal(type) {
            document.getElementById(`${type}-task-modal`).style.display = 'block';
        }

        function closeModal(type) {
            document.getElementById(`${type}-task-modal`).style.display = 'none';
        }

        function openEditModal(id, title, assignedTo, startTime, endTime, status, priority) {
            document.getElementById('edit-id').value = id;
            document.getElementById('edit-task-title').value = title;
            document.getElementById('edit-assigned-to').value = assignedTo;
            document.getElementById('edit-start-time').value = startTime.replace(' ', 'T');
            document.getElementById('edit-end-time').value = endTime.replace(' ', 'T');
            document.getElementById('edit-status').value = status;
            document.getElementById('edit-priority').value = priority;
            openModal('edit');
        }

        function deleteTask(id) {
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this task!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = "?delete_id=" + id;
                }
            });
        }

        function searchTasks() {
            const input = document.getElementById('search-input');
            const filter = input.value.toLowerCase();
            const table = document.getElementById('task-table');
            const trs = table.getElementsByTagName('tr');
            for (let i = 1; i < trs.length; i++) {
                const tds = trs[i].getElementsByTagName('td');
                let found = false;
                for (let j = 0; j < tds.length; j++) {
                    if (tds[j].textContent.toLowerCase().indexOf(filter) > -1) {
                        found = true;
                        break;
                    }
                }
                trs[i].style.display = found ? '' : 'none';
            }
        }

        function exportTableToCSV(filename) {
            const csv = [];
            const rows = document.querySelectorAll('table tr');
            for (const row of rows) {
                const cols = row.querySelectorAll('td, th');
                const rowData = [];
                for (const col of cols) {
                    rowData.push('"' + col.innerText.replace(/"/g, '""') + '"');
                }
                csv.push(rowData.join(','));
            }
            downloadCSV(csv.join('\n'), filename);
        }

        function downloadCSV(csv, filename) {
            const csvFile = new Blob([csv], { type: 'text/csv' });
            const downloadLink = document.createElement('a');
            downloadLink.download = filename;
            downloadLink.href = window.URL.createObjectURL(csvFile);
            downloadLink.style.display = 'none';
            document.body.appendChild(downloadLink);
            downloadLink.click();
            document.body.removeChild(downloadLink);
        }

        function exportTableToExcel(filename) {
            const table = document.querySelector('table');
            const html = table.outerHTML;
            const data = new Blob([html], { type: 'application/vnd.ms-excel' });
            const downloadLink = document.createElement('a');
            downloadLink.href = window.URL.createObjectURL(data);
            downloadLink.download = filename;
            downloadLink.style.display = 'none';
            document.body.appendChild(downloadLink);
            downloadLink.click();
            document.body.removeChild(downloadLink);
        }

        async function exportTableToPDF() {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();
            doc.autoTable({ html: '#task-table' });
            doc.save('tasks.pdf');
        }
    </script>
</body>
</html>

<?php $conn->close(); ?>
