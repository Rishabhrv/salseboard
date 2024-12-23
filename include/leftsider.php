<?php 

print"

<style>
/* Popup container */
.popup {
  display: none;  /* Hidden by default */
  position: fixed;
  buttom: 0;
  right: 0;  /* This will place the popup on the right side */
  width: 250px;  /* Adjust the width as needed */
  height: 80%;  /* Full height */
  z-index: 9999;  /* Ensure it appears on top */
 
}

/* Popup content */
.popup-content {


  background-color: rgb(245, 245, 245);
  padding: 20px;
  border-radius: 8px;
  height: 100%;
  width: 100%;
  overflow-y: auto; /* Allow scrolling for the content */
  box-sizing: border-box;
}

/* Close button */
.close-btn {
  font-size: 30px;
  color: #aaa;
  float: right;
  cursor: pointer;
}

.close-btn:hover,
.close-btn:focus {
  color: black;
}

/* Popup body styling */
.popup-body {
  margin-top: 10px;
}

.popup-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.counter {
  font-size: 20px;
  font-weight: bold;
}

.popup-title {
  margin-top: 20px;
}

.popup-content {
  margin-top: 20px;
}

/* Task box styles */
.task-box {
  margin: 5px 0;
  padding: 20px;
  border-radius: 5px;
}

.task-box.yellow {
  background-color:var(--box-color);
}

.task-box.green {
  background-color: var(--box-color-4);
}

.task-box.blue {
  background-color: var(--box-color-2);
}

.task-details .time {
  font-size: 14px;
  color: gray;
}

.task-members {
  display: flex;
  align-items: center;
}

.task-members i {
  margin-right: 5px;
}

.task-members div {
  font-size: 15px;
  color: gray;
}

</style>
";
?>
<!-- The Modal -->
<div id="schedulePopup" class="popup">
  <div class="popup-content">
    <span class="close-btn">&times;</span>
    <div class="popup-body">
     
      <div class="popup-title">Today Schedule</div>
      <div class="popup-content">
        <div class="task-box yellow">
          <div class="task-details">
            <div class="time">08:00 - 09:00 AM</div>
            <div class="task-name">Client Name</div>
          </div>
          <div class="more-info"></div>
          <div class="task-members">
            <i class="fa-solid fa-phone" style="display: inline; margin-right: 5px;font-size:14px;"></i>
            <div style="display: inline; margin: 0px;color:gray; font-size:15px">7821921978</div>
          </div>
        </div>
        <div class="task-box green">
          <div class="task-details">
            <div class="time">08:00 - 09:00 AM</div>
            <div class="task-name">Client Name</div>
          </div>
          <div class="more-info"></div>
          <div class="task-members">
            <i class="fa-solid fa-phone" style="display: inline; margin-right: 5px;font-size:14px;"></i>
            <div style="display: inline; margin: 0px;color:gray; font-size:15px">7821921978</div>
          </div>
        </div>
        <div class="task-box blue">
          <div class="task-details">
            <div class="time">08:00 - 09:00 AM</div>
            <div class="task-name">Client Name</div>
          </div>
          <div class="more-info"></div>
          <div class="task-members">
            <i class="fa-solid fa-phone" style="display: inline; margin-right: 5px;font-size:14px;"></i>
            <div style="display: inline; margin: 0px;color:gray; font-size:15px">7821921978</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
