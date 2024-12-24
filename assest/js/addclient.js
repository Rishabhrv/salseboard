// JavaScript to ensure elements are displayed properly when "Other" is selected
window.onload = function() {
    // For "Enquiry" field
   
}

    // Open the modal
    function openModal() {
       

        // Use AJAX to load content from addclient.php into the modal
    
        
    }

    // Close the modal
    function closeModal() {
        document.getElementById("newLeadModal").style.display = "none";
    }

    // Close the modal if user clicks outside of it
    window.onclick = function(event) {
        if (event.target == document.getElementById("newLeadModal")) {
            closeModal();
        }
    }

  

