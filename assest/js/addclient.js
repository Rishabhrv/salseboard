
    // Open the modal
    function openModal() {
        document.getElementById("newLeadModal").style.display = "block";
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
    };

  
