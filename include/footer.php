<script>
function confirmDelete(link) {
    if (confirm("Are you sure you want to delete ?")) {
        // User clicked "Yes"
        window.location.href = link.href;
        return true;
    } else {
        // User clicked "No"
        return false;
    }
}
</script>
<!-- 
<script>

    // Get the popup
var popup = document.getElementById("schedulePopup");

// Get the <span> element that closes the popup
var closeBtn = document.getElementsByClassName("close-btn")[0];

// Automatically open the popup when the page loads
window.onload = function() {
  popup.style.display = "block";
}

// When the user clicks on <span> (x), close the popup
closeBtn.onclick = function() {
  popup.style.display = "none";
}

// When the user clicks anywhere outside of the popup, close it
window.onclick = function(event) {
  if (event.target == popup) {
    popup.style.display = "none";
  }
}

</script> -->

</body>
</html>
