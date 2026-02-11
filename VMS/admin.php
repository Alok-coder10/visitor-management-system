<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .container {
            width: 80%;
            margin: auto;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #4A54F1;
            color: white;
            padding: 10px;
        }

        .stats {
            display: flex;
            justify-content: space-around;
            margin: 20px 0;
        }

        .stat {
            background: #3f51b5;
            color: white;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            width: 20%;
        }

        table {
            width: 100%;
            margin-bottom: 20px;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #4A54F1;
            color: white;
        }

        button {
            padding: 6px 12px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        button.reject {
            background-color: #f44336;
        }
    </style>
</head>
<body>

<div class="container">
    <header>
        <h1>Admin Dashboard - Welcome, Admin</h1>
        <a href="logout.php" style="color:white;">Logout</a>
    </header>

    <div class="stats">
        <div class="stat" id="total-requests">Total Requests: <span>0</span></div>
        <div class="stat" id="approved">Approved: <span>0</span></div>
        <div class="stat" id="rejected">Rejected: <span>0</span></div>
    </div>

    <h2>Pending Requests</h2>
    <table id="pending-requests">
        <tr>
            <th>Name</th>
            <th>Role</th>
            <th>Purpose</th>
            <th>Direction</th>
            <th>Visit Date</th>
            <th>Submitted</th>
            <th>whom_to_visit_id</th>

        </tr>
        <!-- Pending requests will be dynamically inserted here -->
    </table>

    <h2>Recent Activity</h2>
    <table id="recent-activity">
        <tr>
            <th>Name</th>
            <th>Role</th>
            <th>Status</th>
            <th>Purpose</th>
            <th>Direction</th>
            <th>Visit Date</th>
            <th>Submitted</th>
            <th>whom_to_visit_id</th>

        </tr>
        <!-- Recent activity will be dynamically inserted here -->
    </table>
</div>

<script src="script.js"></script>
</body>
</html>
