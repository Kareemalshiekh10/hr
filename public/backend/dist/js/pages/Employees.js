function deleteEmployee(employeeId) {
    const confirmed = confirm("Are you sure you want to delete this employee?");
    if (confirmed) {
        // Implement your deletion logic here
        // For now, let's just remove the row from the table
        const row = document.querySelector(`tr[data-id="${employeeId}"]`);
        if (row) {
            row.remove();
        }
    } else {
        // User clicked Cancel, do nothing or handle accordingly
        console.log("Deletion canceled.");
    }
}
