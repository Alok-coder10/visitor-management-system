
document.addEventListener('DOMContentLoaded', function() {
    // Function to load pending requests
    function loadPendingRequests() {
        fetch('fetch_pending_requests.php')
            .then(response => response.json())
            .then(data => {
                let tableBody = document.querySelector('#pending-requests');
                tableBody.innerHTML = ''; // Clear existing rows
                
                data.requests.forEach(request => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${request.name}</td>
                        <td>${request.role}</td>
                        <td>${request.purpose}</td>
                        <td>${request.direction}</td>
                        <td>${request.visit_date}</td>
                        <td>${request.submitted}</td>
                        <td>${request.whom_to_visit_id}</td>
                        <td>
                            <form method="POST" action="update_request.php">
                                <input type="hidden" name="request_id" value="${request.request_id}">
                                <button type="submit" name="action" value="approve">Approve</button>
                            </form>
                            <form method="POST" action="update_request.php">
                                <input type="hidden" name="request_id" value="${request.request_id}">
                                <button type="submit" name="action" value="reject" class="reject">Reject</button>
                            </form>
                        </td>
                    `;
                    tableBody.appendChild(row);
                });

                // Add event listeners for approve and reject buttons
                document.querySelectorAll('.approve').forEach(button => {
                    button.addEventListener('click', handleApproveReject);
                });

                document.querySelectorAll('.reject').forEach(button => {
                    button.addEventListener('click', handleApproveReject);
                });
            })
            .catch(error => console.error('Error loading pending requests:', error));
    }

    // Function to handle approve and reject actions
    function handleApproveReject(event) {
        const button = event.target;
        const requestId = button.getAttribute('data-request-id');
        const action = button.classList.contains('approve') ? 'approve' : 'reject';

        // Send AJAX request
        fetch('update_request.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `request_id=${requestId}&action=${action}`
        })
        .then(response => response.text())
        .then(data => {
            console.log(data); // Handle success or error response
            loadPendingRequests(); // Reload pending requests after action
            loadStats(); // Reload stats after action
        })
        .catch(error => console.error('Error updating request status:', error));
    }

    // Function to load the stats (Total, Approved, Rejected)
    function loadStats() {
        fetch('fetch_stats.php')
            .then(response => response.json())
            .then(data => {
                document.querySelector('#total-requests span').textContent = data.total_requests;
                document.querySelector('#approved span').textContent = data.approved_requests;
                document.querySelector('#rejected span').textContent = data.rejected_requests;
            })
            .catch(error => console.error('Error loading stats:', error));
    }

    // Update pending requests and stats on page load
    loadPendingRequests();
    loadStats();

    // Polling every 10 seconds to update pending requests and stats
    setInterval(function() {
        loadPendingRequests();
        loadStats();
    }, 10000);  // 10 seconds
});

    // Function to load recent activity (last 5 approved/rejected)
    function loadRecentActivity() {
        fetch('fetch_requests.php')
            .then(response => response.json())
            .then(data => {
                const tableBody = document.querySelector('#recent-activity');
                const rows = tableBody.querySelectorAll('tr');

                // Keep the table header
                const headerRow = rows[0];
                tableBody.innerHTML = '';
                tableBody.appendChild(headerRow);

                data.recent.forEach(entry => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${entry.name}</td>
                        <td>${entry.role}</td>
                        <td>${entry.status}</td>
                        <td>${entry.purpose}</td>
                        <td>${entry.direction}</td>
                        <td>${entry.visit_date}</td>
                        <td>${entry.submitted}</td>
                        <td>${entry.whom_to_visit_id}</td>
                    `;
                    tableBody.appendChild(row);
                });
            })
            .catch(error => console.error('Error loading recent activity:', error));
    }

    // Initial load and polling every 10 seconds
    loadRecentActivity();
    setInterval(loadRecentActivity, 10000);
