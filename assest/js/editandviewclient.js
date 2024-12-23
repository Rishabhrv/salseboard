// Open the modal
function openPopup() {
    document.getElementById("editLeadModal").style.display = "block";
    closeDropdown();
}

// Close the modal
function closePopup() {
    document.getElementById("editLeadModal").style.display = "none";
}

// Function to toggle dropdown visibility
function toggleDropdown(event) {
    // Prevents the dropdown content from closing when clicking on it
    event.stopPropagation();
    var dropdown = event.target.nextElementSibling;
    dropdown.style.display = dropdown.style.display === "block" ? "none" : "block";
}
function closeDropdown() {
    var dropdowns = document.querySelectorAll(".dropdown-content");
    dropdowns.forEach(function(dropdown) {
        dropdown.style.display = "none"; // Close all dropdowns
    });
}
// Close the dropdown or modal if clicked outside
window.onclick = function(event) {
    // Close dropdown if clicked outside
    var dropdowns = document.querySelectorAll(".dropdown-content");
    dropdowns.forEach(function(dropdown) {
        if (!dropdown.contains(event.target) && !event.target.closest('.dropdown')) {
            dropdown.style.display = "none"; // Close dropdown if clicked outside
        }
    });

    // Close modal if clicked outside
    var modal = document.getElementById("editLeadModal");
    if (event.target === modal) {
        closePopup(); // Close the modal if clicked outside
    }
};
