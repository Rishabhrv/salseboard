function filterTasks(status) {
    // Hide all task containers
    document.getElementById('tasks-all').style.display = 'none';
    document.getElementById('tasks-on-hold').style.display = 'none';
    document.getElementById('tasks-approved').style.display = 'none';
    document.getElementById('tasks-rejected').style.display = 'none';
    document.getElementById('tasks-followup').style.display = 'none';

    // Show tasks for the selected status
    if (status === 'all') {
        document.getElementById('tasks-all').style.display = 'block';
    } else if (status === 'on-hold') {
        document.getElementById('tasks-on-hold').style.display = 'block';
    } else if (status === 'approved') {
        document.getElementById('tasks-approved').style.display = 'block';
    } else if (status === 'rejected') {
        document.getElementById('tasks-rejected').style.display = 'block';
    } else if (status === 'followup') {
        document.getElementById('tasks-followup').style.display = 'block';
    }
}

// Initially call filterTasks with 'all' to display all tasks
filterTasks('all');
