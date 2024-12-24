
  function filterTasks(status) {
    // Hide all task containers
    document.getElementById('tasks-all').style.display = 'none';
    document.getElementById('tasks-on-hold').style.display = 'none';
    document.getElementById('tasks-approved').style.display = 'none';
    document.getElementById('tasks-rejected').style.display = 'none';
    document.getElementById('tasks-followup').style.display = 'none';
    document.getElementById('tasks-new').style.display = 'none';  // Hide new tasks by default

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
    } else if (status === 'new') {
        document.getElementById('tasks-new').style.display = 'block';  // Show new tasks
    }
}

// Initially call filterTasks with 'all' to display all tasks
filterTasks('all');


  function sortTable(n, tableId) {
    var table = document.querySelector(`#${tableId} .table`);
    var rows = table.rows;
    var switching = true;
    var dir = "asc"; // Set the sorting direction to ascending
    var switchCount = 0;

    while (switching) {
      switching = false;
      var rowsArray = Array.from(rows).slice(1); // Skip the first row (header)
      for (var i = 0; i < rowsArray.length - 1; i++) {
        var x = rowsArray[i].cells[n].innerText.trim();
        var y = rowsArray[i + 1].cells[n].innerText.trim();

        // If the column contains dates, handle them differently
        if (n === 0) { // Enquiry Date column (index 0)
          x = new Date(x);
          y = new Date(y);
        } else if (n === 3) { // Number column (index 3)
          x = x.replace(/\D/g, ''); // Strip non-numeric characters for comparison
          y = y.replace(/\D/g, '');
          x = parseInt(x, 10);
          y = parseInt(y, 10);
        }

        // Handle string comparison for Source and Enquiry
        if (n === 2 || n === 4) { // Source (index 2) and Enquiry (index 4)
          x = x.toLowerCase();  // Convert both strings to lowercase for case-insensitive comparison
          y = y.toLowerCase();
        }

        // Compare strings, numbers, or dates
        if (dir === "asc") {
          if (x > y) {
            rowsArray[i].parentNode.insertBefore(rowsArray[i + 1], rowsArray[i]);
            switching = true;
            switchCount++;
            break;
          }
        } else if (dir === "desc") {
          if (x < y) {
            rowsArray[i].parentNode.insertBefore(rowsArray[i + 1], rowsArray[i]);
            switching = true;
            switchCount++;
            break;
          }
        }
      }

      // If no switching has happened and the direction is "asc", set it to "desc"
      if (!switching && switchCount === 0 && dir === "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
