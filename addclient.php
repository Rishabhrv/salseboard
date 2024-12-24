<?php require "include/header.php"?>
<?php require "include/sidebar.php"?>
<?php require "db.php" ?>
<?php 
print"

<style>
.wrapper {
margin-left:20px;
  padding: 10px 0;
  flex: 1;
  overflow-y: auto;
  height: 100%;
  padding-right: 8px;
}
.task-manager {
  display: flex;
  justify-content: space-between;
  width: 100%; /* Full width of its container */
  height: 100vh; /* Full height of the viewport */
  background: #fff;
  border-radius: 4px;
  box-shadow: 
    0 0.3px 2.2px rgba(0, 0, 0, 0.011), 
    0 0.7px 5.3px rgba(0, 0, 0, 0.016), 
    0 1.3px 10px rgba(0, 0, 0, 0.02), 
    0 2.2px 17.9px rgba(0, 0, 0, 0.024), 
    0 4.2px 33.4px rgba(0, 0, 0, 0.029), 
    0 10px 80px rgba(0, 0, 0, 0.04);
  overflow: hidden;
}


.tag.hold {
  background-color:rgb(253, 238, 197);
  color: rgb(255, 136, 0);
}
.right-bar1 {
  width: 270px;
  border-left: 1px solid #e3e7f7;
  display: flex;
  flex-direction: column;
}
.button-86 {
  background-color: #4CAF50;  /* Green background */
  color: white;  /* White text */
  padding: 12px 22px;  /* Padding around the text */
  font-size: 27px;  /* Font size */
  border: none;  /* Removes the border */
  border-radius: 8px;  /* Rounded corners */
  cursor: pointer;  /* Changes the cursor to a pointer on hover */
  transition: background-color 0.3s ease;  /* Smooth transition effect */
}

.button-86:hover {
  background-color: #45a049;  /* Darker green on hover */
}



.modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.4);
    padding-top: 60px;
}

.modal-content {
    background-color: #fefefe;
    margin: 5% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    max-width: 500px;
    border-radius: 10px;
}

.close {
    color: #aaa;
    font-size: 28px;
    font-weight: bold;
    float: right;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}


    .from-field {
            margin-bottom: 20px;
        }

        .inline-fields {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .field {
            flex: 1;
            min-width: 200px;
        }

     

        input, select, textarea {
            width: 100%;
            margin-top:5px;
            padding: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 13px;
        }
              button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 7px 13px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 12px;
        }


    .from-field{
margin-top:0px;
margin-bottom:10px;
}

.task .table1 tr{
margin-bottom:20px;
background-color:black;

}
.table  td,th{
width:300px;
padding:10px 5px;
font-size:13px;
 
  
  }

/* Style the dropdown container */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown content (hidden by default) */
.dropdown-content {
  display: none;
  position: absolute;
  right: 0;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
  z-index: 1;
  border-radius: 5px;
}

/* Dropdown links */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color on hover */
.dropdown-content a:hover {
  background-color: #f1f1f1;
}

/* Show the dropdown content when clicked */
.dropdown:hover .dropdown-content {
  display: block;
}
/* Container for the merit boxes */
.merit-box {
  display: flex;  /* Use flexbox for the layout */
  flex-wrap: wrap;  /* Allows the items to wrap onto the next line if they don't fit */
  gap: 10px;  /* Adds spacing between the boxes */
  justify-content: flex-start;  /* Align the items to the left */
  padding: 0px;
  margin-bottom:20px;
}

/* Each box */

  .merit-box .boxx-lead {
font-size:13px;
color:rgb(83, 83, 83);
  border: 1px solid #f9f9f9 ;
  padding: 0px 0px 10px 0px;  /* Adds padding inside the box */
  width: calc(16.666% - 10px);  /* Each box takes up 1/6 of the container */
  text-align: center;  /* Centers the text inside the box */
  background-color: #f9f9f9;  /* Light background for better readability */
  border-radius: 8px;  /* Rounds the corners of the boxes */
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);  /* Adds a subtle shadow around the boxes */
}
 .merit-box .boxx-lead .lead-no{
font-size:28px;

padding:0px;
margin:10px 0 10px 0;
}
.merit-box .boxx-lead i{
font-size:11px;
padding-bottom:10px;
}

.tasks-wrapper{
padding-left:100px;


}
.customer_button1 {
  position: fixed;  /* Fixes the position relative to the viewport */
  bottom: 20px;  /* Adjusts the space from the bottom of the page */
  right: 20px;  /* Adjusts the space from the right side of the page */
  z-index: 1000;  /* Ensures the button is above other content */
}
 
/* General Style for the filter options */
.filter-options {
    display: flex;
    flex-wrap: wrap; /* Allow fields to wrap to the next line if necessary */
    gap: 20px;
    background-color: #f8f9fa;
    padding: 10px 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 100%;
}

/* Style for each filter field */
.filter-field {
    flex: 1 0 20%; /* Ensure each filter field takes up approximately 30% of the container width */
    max-width: 20%; /* Max width of 30% ensures 3 fields per row */
    display: flex;
    flex-direction: column;
}

/* Label styles */
.filter-field label {
    font-size: 14px;
    font-weight: 600;
    color: #495057;
    margin-bottom: 5px;
    white-space: nowrap; /* Prevent labels from breaking into multiple lines */
}
.search-buttton{
margin:25px;
}
/* Input styles */
.filter-field input {
    padding: 8px 10px;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 14px;
    width: 100%; /* Ensure input takes full width of the container */
    margin-bottom: 5px;
    box-sizing: border-box;
}

/* Button styles */
.filter-field button {
    background-color: #007bff;
    color: white;
    font-size: 16px;
    font-weight: 600;
    padding: 10px 20px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    transition: background-color 0.3s;
    align-self: flex-start;
    width: 100%; /* Make button take full width of the field */
}

.kk .search-button {
    
    color: #535353;
    font-size: 16px;
   
    background-color:white;
    text-align:left;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    
    align-self: flex-start;
   /* Make button take full width of the field */
}

.filter-field button:hover {
    background-color: #0056b3;
}

/* Mobile Responsiveness */
@media (max-width: 768px) {
    .filter-options {
        flex-direction: column;
        padding: 15px;
    }

    .filter-field {
        flex: 1 0 100%; /* Make fields stack vertically on smaller screens */
        max-width: 100%;
    }
}
 th {
    cursor: pointer;
    text-align:left;
  }

.right-bar {
  width: 200px;
  border-left: 1px solid #e3e7f7;
  display: flex;
  flex-direction: column;
}
  .task-box {
  position: relative;
  border-radius: 12px;
  width: 100%;
  margin: 15px 0;
  padding: 16px;
  cursor: pointer;
  box-shadow: 2px 2px 4px 0px #ebebeb;
}
  .right-content {
  padding: 10px 15px;
  overflow-y: auto;
  flex: 1;
}

</style>

";

?>
<?php
           $status = "OK"; //initial status
$errormsg="";
           if(ISSET($_POST['save'])){
$customer_name = mysqli_real_escape_string($con,$_POST['customer_name']);
$email = mysqli_real_escape_string($con,$_POST['email']);
$number = mysqli_real_escape_string($con,$_POST['number']);
$enquiry_date = mysqli_real_escape_string($con,$_POST['enquiry_date']);
$source = mysqli_real_escape_string($con,$_POST['source']);
$enquiry = mysqli_real_escape_string($con,$_POST['enquiry']);
$other_source = mysqli_real_escape_string($con,$_POST['other_source']);
$other_enquiry = mysqli_real_escape_string($con,$_POST['other_enquiry']);







if($status=="OK")
{
$qb=mysqli_query($con,"INSERT INTO customer_detail (customer_name,email,number,enquiry_date,source,enquiry,other_source,other_enquiry) VALUES ('$customer_name', '$email', '$number','$enquiry_date', '$source','$enquiry', '$other_source','$other_enquiry')");


		if($qb){
		    	$errormsg= "

                  <script language='javascript'>
                        window.location = 'index.php';
                    </script>
 "; //printing error if found in validation

		}
	}

        elseif ($status!=="OK") {
            $errormsg= "
<div class='alert alert-danger alert-dismissible alert-outline fade show'>
                     ".$msg." <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button> </div>"; //printing error if found in validation


    }
    else{
			$errormsg= "
      <div class='alert alert-danger alert-dismissible alert-outline fade show'>
                 Some Technical Glitch Is There. Please Try Again Later Or Ask Admin For Help.
                 <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                 </div>"; //printing error if found in validation


		}
           }
           ?>

<div class="page-content">
<div id="newLeadModal" class="">
    <div class="modal-content">
       <a href="index.php"> <span class="close" onclick="closeModal()">&times;</span></a>
        <h2>Create New Lead</h2>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            print $errormsg;
        }
        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="from-field">
                <div class="inline-fields">
                    <div class="field">
                        <label for="customer_name">Client Name:</label>
                        <input type="text" id="customer_name" name="customer_name" required>
                    </div>
                    <div class="field">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                </div>
            </div>

            <div class="from-field">
                <div class="inline-fields">
                    <div class="field">
                        <label for="number">Phone Number:</label>
                        <input type="text" id="number" name="number" required>
                    </div>
                    <div class="field">
                        <label for="enquiry_date">Enquiry Date</label>
                        <input type="date" id="enquiry_date" name="enquiry_date" required>
                    </div>
                </div>
            </div>

            <div class="from-field">
                <div class="inline-fields">
                    <div class="field">
                        <label for="enquiry">Enquiry</label>
                        <select id="enquiry" name="enquiry" required>
                            <option value="Book">Book</option>
                            <option value="Book Chapter">Book Chapter</option>
                            <option value="Edit Book">Edit Book</option>
                            <option value="Other">Other</option> <!-- "Other" option added -->
                        </select>
                    </div>

                    <div class="field">
                        <label for="source">Lead Source:</label>
                        <select id="source" name="source" required>
                            <option value="Google">Google</option>
                            <option value="Justdail">Justdail</option>
                            <option value="Indiamart">Indiamart</option>
                            <option value="Website">Website</option>
                            <option value="Reference">Reference</option>
                            <option value="Ads">Ads</option>
                            <option value="Other">Other</option> <!-- "Other" option added -->
                        </select>
                    </div>
                </div>
            </div>
            <div class="from-field">
            <div class="inline-fields">
            <!-- Field for "Other" options to appear -->
            <div class="field" id="otherEnquiryField" style="display:none;">
                <label for="other_enquiry">Other Enquiry:</label>
                <input type="text" id="other_enquiry" name="other_enquiry">
            </div>

            <div class="field" id="otherSourceField" style="display:none;">
                <label for="other_source">Other Source:</label>
                <input type="text" id="other_source" name="other_source">
            </div>
            </div>
            </div>

            <div>
                <button type="submit" name="save">Submit</button>
            </div>
        </form>
    </div>
</div>

<script>
// JavaScript to ensure elements are displayed properly when "Other" is selected
window.onload = function() {
    // For "Enquiry" field
    var enquiryDropdown = document.getElementById('enquiry');
    var otherEnquiryField = document.getElementById('otherEnquiryField');
    
    // If the value is "Other", show the additional field
    enquiryDropdown.addEventListener('change', function() {
        var enquiryValue = this.value;
        if (enquiryValue === 'Other') {
            otherEnquiryField.style.display = 'block'; // Show the "Other" enquiry field
        } else {
            otherEnquiryField.style.display = 'none'; // Hide the "Other" enquiry field
        }
    });

    // For "Source" field
    var sourceDropdown = document.getElementById('source');
    var otherSourceField = document.getElementById('otherSourceField');
    
    // If the value is "Other", show the additional field
    sourceDropdown.addEventListener('change', function() {
        var sourceValue = this.value;
        if (sourceValue === 'Other') {
            otherSourceField.style.display = 'block'; // Show the "Other" source field
        } else {
            otherSourceField.style.display = 'none'; // Hide the "Other" source field
        }
    });
}
</script>




</div>
<?php require "include/leftsider.php"?>

<?php require "include/footer.php"?>
