<?php require "include/header.php"?>
<?php require "include/sidebar.php"?>
<?php

$todo=  mysqli_real_escape_string($con,$_GET['id']);
?>

<?php 
print"
<style>
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

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .modal-content h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .modal-content .close {
          margin-right:auto;
            top: 10px;
            right: 10px;
            font-size: 14px;
            font-weight: bold;
            color: #333;
            cursor: pointer;
        }

        /* Form Styling */
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

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #555;
        }

        input, select, textarea {
            width: 100%;
            padding: 7px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 13px;
        }

        textarea {
         
            height: 50px;
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

        button:hover {
            background-color: #0056b3;
        }

        /* Responsive Design */
        @media (max-width: 600px) {
            .inline-fields {
                flex-direction: column;
            }

            .modal-content {
                width: 95%;
            }
        }

        /* Hidden Section Styling */
        #follow-update-section {
            display: none;
        }

           .scrollable-container {
        max-height: 400px; /* Set the height of the scrollable area */
        overflow-y: auto; /* Enable vertical scroll when content overflows */
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
  width: 230px;
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
					 $query="SELECT * FROM  customer_detail where id='$todo' ";
 $result = mysqli_query($con,$query);
$i=0;
while($row = mysqli_fetch_array($result))
{
	$id="$row[id]";
	$customer_name="$row[customer_name]";
    $email="$row[email]";
    $number="$row[number]";
    $status="$row[status]";
    $enquiry_date="$row[enquiry_date]";
    $source="$row[source]";
    $enquiry="$row[enquiry]";
    $status="$row[status]";
    $follow_update="$row[follow_update]";
    $remark="$row[remark]";
    $calling_date="$row[calling_date]";
    $payment="$row[payment]";
    $reference="$row[reference]";




  
}
  ?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve customer details from POST data
    $customer_name = mysqli_real_escape_string($con, $_POST['customer_name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $number = mysqli_real_escape_string($con, $_POST['number']);
    $enquiry = mysqli_real_escape_string($con, $_POST['enquiry']);
    $enquiry_date = mysqli_real_escape_string($con, $_POST['enquiry_date']);
    $source = mysqli_real_escape_string($con, $_POST['source']);
    $status = mysqli_real_escape_string($con, $_POST['status']);
    $payment = mysqli_real_escape_string($con, $_POST['payment']);
    $reference = mysqli_real_escape_string($con, $_POST['reference']);
 

    
    // Get the dynamic follow-up data (array of values from the form)
    $follow_updates = $_POST['follow_update'];
    $remarks = $_POST['remark'];
    $payment_dates = $_POST['payment_date'];
    $payment_amounts = $_POST['payment_amount'];

    // Start updating the customer details table
    $qb = mysqli_query($con, "UPDATE customer_detail SET customer_name='$customer_name', email='$email', number='$number', enquiry='$enquiry', enquiry_date='$enquiry_date', source='$source', status='$status', calling_date='$calling_date',payment='$payment',reference='$reference'   WHERE id='$todo'");

    if ($qb) {
        // Now handle the follow-up sections (if any) - check if columns exist and add them if not
        foreach ($follow_updates as $index => $follow_update) {
            $remark = $remarks[$index];
            $column_name = 'follow_update_' . $index;
            $remark_column = 'remark_' . $index;

            // Check if the column exists in the database for follow-up
            $check_column_query = mysqli_query($con, "SHOW COLUMNS FROM customer_detail LIKE '$column_name'");
            if (mysqli_num_rows($check_column_query) == 0) {
                // If column doesn't exist, create the column
                $alter_column_query = mysqli_query($con, "ALTER TABLE customer_detail ADD COLUMN `$column_name` DATE");
            }

            $check_remark_column_query = mysqli_query($con, "SHOW COLUMNS FROM customer_detail LIKE '$remark_column'");
            if (mysqli_num_rows($check_remark_column_query) == 0) {
                // If the remark column doesn't exist, create it
                $alter_remark_column_query = mysqli_query($con, "ALTER TABLE customer_detail ADD COLUMN `$remark_column` TEXT");
            }

            // Now insert or update the values in the dynamically created columns
            $update_follow_up_query = mysqli_query($con, "UPDATE customer_detail SET `$column_name`='$follow_update',last_followupdate='$follow_update', `$remark_column`='$remark' WHERE id='$todo'");
        }
         // Handle the dynamic payment sections (if any)
    foreach ($payment_dates as $index => $payment_date) {
        $payment_amount = $payment_amounts[$index];
        $payment_date_column = 'payment_date_' . $index;
        $payment_amount_column = 'payment_amount_' . $index;

        // Check if the column for payment date exists
        $check_payment_date_query = mysqli_query($con, "SHOW COLUMNS FROM customer_detail LIKE '$payment_date_column'");
        if (mysqli_num_rows($check_payment_date_query) == 0) {
            // If column doesn't exist, create it
            $alter_payment_date_query = mysqli_query($con, "ALTER TABLE customer_detail ADD COLUMN `$payment_date_column` DATE");
        }

        // Check if the column for payment amount exists
        $check_payment_amount_query = mysqli_query($con, "SHOW COLUMNS FROM customer_detail LIKE '$payment_amount_column'");
        if (mysqli_num_rows($check_payment_amount_query) == 0) {
            // If column doesn't exist, create it
            $alter_payment_amount_query = mysqli_query($con, "ALTER TABLE customer_detail ADD COLUMN `$payment_amount_column` DECIMAL(10, 2)");
        }

        // Update the values in the dynamically created columns
        $update_payment_query = mysqli_query($con, "UPDATE customer_detail SET `$payment_date_column`='$payment_date', `$payment_amount_column`='$payment_amount' WHERE id='$todo'");
    }


        // Provide success feedback
        $errormsg = "<div class='alert alert-success alert-dismissible alert-outline fade show'>
                        Page Updated successfully.
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                     </div>
                       <script language='javascript'>
                        window.location = 'customer.php';
                    </script>
                     ";
    }
}
?>


<div class="page-content" >
    <div class="header">Customer</div>


    <!---------------------------------------------------EDIT CLIENT FROM ---------------------------------------->

  

    <div id="editLeadModal">
    <div class="modal-content">
        <a href="index.php" style="text-decoration:none;"><i class="fa-solid fa-angles-left" style="color: black;"></i><span class="close" onclick="closePopup()"> Back</span> </a>
        <h2>Edit Lead</h2>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            print $errormsg;
        }
        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="scrollable-container">
                <div class="from-field">
                    <div class="inline-fields">
                        <div class="field">
                            <label for="customer_name">Client Name:</label>
                            <input type="text" id="customer_name" name="customer_name" value="<?php print $customer_name ?>" required>
                        </div>
                        <div class="field">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" value="<?php print $email ?>" required>
                        </div>
                    </div>
                </div>

                <div class="from-field">
                    <div class="inline-fields">
                        <div class="field">
                            <label for="number">Phone Number:</label>
                            <input type="text" id="number" name="number" value="<?php print $number ?>" required>
                        </div>
                        <div class="field">
                            <label for="enquiry_date">Enquiry Date:</label>
                            <input type="date" id="enquiry_date" name="enquiry_date" value="<?php print $enquiry_date ?>" required>
                        </div>
                    </div>
                </div>

                <div class="from-field">
                    <div class="inline-fields">
                        <div class="field">
                            <label for="enquiry">Enquiry:</label>
                            <select id="enquiry" name="enquiry">
                                <option value="Book" <?php echo ($enquiry == 'Book') ? 'selected' : ''; ?>>Book</option>
                                <option value="Book Chapter" <?php echo ($enquiry == 'Book Chapter') ? 'selected' : ''; ?>>Book Chapter</option>
                                <option value="Edit Book" <?php echo ($enquiry == 'Edit Book') ? 'selected' : ''; ?>>Edit Book</option>
                            </select>
                        </div>
                        <div class="field">
    <label for="source">Lead Source:</label>
    <select id="source" name="source" onchange="toggleReferenceInput()">
        <option value="Google" <?php echo ($source == 'Google') ? 'selected' : ''; ?>>Google</option>
        <option value="Justdial" <?php echo ($source == 'Justdial') ? 'selected' : ''; ?>>Justdial</option>
        <option value="Indiamart" <?php echo ($source == 'Indiamart') ? 'selected' : ''; ?>>Indiamart</option>
        <option value="Website" <?php echo ($source == 'Website') ? 'selected' : ''; ?>>Website</option>
        <option value="Reference" <?php echo ($source == 'Reference') ? 'selected' : ''; ?>>Reference</option>
        <option value="Ads" <?php echo ($source == 'Ads') ? 'selected' : ''; ?>>Ads</option>
    </select>
</div>

<!-- Hidden input field for Reference -->
<div class="field" id="reference-field" style="display: none;">
    <label for="reference">Reference Details:</label>
    <input type="text" id="reference" name="reference" placeholder="Enter Reference Details" value="<?php print $reference ?>">
</div>
                    </div>
                </div>

              
                <div class="from-field">
                    <div class="inline-fields">
                        <div class="field">
                            <label for="status">Status:</label>
                            <select id="status" name="status" onchange="toggleInstallmentFields()">
                                <option value="Converted" <?php echo ($status == 'Converted') ? 'selected' : ''; ?>>Converted</option>
                                <option value="On Going" <?php echo ($status == 'On Going') ? 'selected' : ''; ?>>On Going</option>
                                <option value="Not Converted" <?php echo ($status == 'Not Converted') ? 'selected' : ''; ?>>Not Converted</option>
                            </select>
                        </div>
                        <div class="field">
                            <label for="calling_date">Calling Date:</label>
                            <input type="date" id="calling_date" name="calling_date" value="<?php print $calling_date ?>">
                        </div>
                    </div>
                </div>

                <div class="from-field" >
                    <div class="inline-fields">
                        <div class="field">
                            <label for="payment">Payment: </label>
                            <input type="text" id="payment" name="payment" value="<?php print $payment ?>" >

                        </div>
                        <div class="field">
                            <button type="button" onclick="addPaymentSection()">Add Payment</button>
                        </div>
                     
                    </div>
                </div>
           

<div id="payment-sections">
    <?php
    // Fetch customer details
    $query = "SELECT * FROM customer_detail WHERE id='$todo'";
    $result = mysqli_query($con, $query);
    if ($result) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    } else {
        echo "Error in query: " . mysqli_error($con);
    }
    
    // Iterate over the existing payment data if present
    $payment_index = 0; // Start index for payments
    foreach ($row as $key => $value) {
        if (strpos($key, 'payment_date_') === 0 && !is_null($value)) {
            // Extract the index from the column name
            $payment_index = str_replace('payment_date_', '', $key);

            // Get the corresponding payment amount field
            $payment_key = 'payment_amount_' . $payment_index;
            $payment_value = isset($row[$payment_key]) ? $row[$payment_key] : '';

            // Add form fields for the payment amount and date
            echo '
            <div class="from-field">
                <div class="inline-fields">
                    <div class="field">
                        <label for="payment_date_' . $payment_index . '">Payment Date:</label>
                        <input type="date" id="payment_date_' . $payment_index . '" name="payment_date[' . $payment_index . ']" value="' . htmlspecialchars($value) . '">
                    </div>
                    <div class="field">
                        <label for="payment_amount_' . $payment_index . '">Payment Amount:</label>
                        <input type="number" id="payment_amount_' . $payment_index . '" name="payment_amount[' . $payment_index . ']" value="' . htmlspecialchars($payment_value) . '">
                    </div>
                </div>
            </div>';
        }
    }
    ?>
</div>


  
                <div class="from-field">
                    <div class="field">
                        <button type="button" onclick="addFollowUpSection()">+</button>
                    </div>
                </div>
                <div id="additional-sections">
    <?php
    $query = "SELECT * FROM customer_detail WHERE id='$todo'";
    $result = mysqli_query($con, $query);
    if ($result) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    } else {
        echo "Error in query: " . mysqli_error($con);
    }
    // Iterate over the existing follow-up data if present
    $follow_up_index = 0; // Start index for follow-ups
    foreach ($row as $key => $value) {
        if (strpos($key, 'follow_update_') === 0 && !is_null($value)) {
            // Extract the index from the column name
            $follow_up_index = str_replace('follow_update_', '', $key);

            // Get the corresponding remark field
            $remark_key = 'remark_' . $follow_up_index;
            $remark_value = isset($row[$remark_key]) ? $row[$remark_key] : '';

            // Add form fields for the follow-up date and remark
            echo '
            <div class="from-field">
                <div class="inline-fields">
                    <div class="field">
                        <label for="follow_update_' . $follow_up_index . '">Follow Update:</label>
                        <input type="date" id="follow_update_' . $follow_up_index . '" name="follow_update[' . $follow_up_index . ']" value="' . htmlspecialchars($value) . '">
                    </div>
                    <div class="field">
                        <label for="remark_' . $follow_up_index . '">Remark:</label>
                        <textarea id="remark_' . $follow_up_index . '" name="remark[' . $follow_up_index . ']">' . htmlspecialchars($remark_value) . '</textarea>
                    </div>
                </div>
            </div>';
        }
    }
    ?>
</div>
                <div>
                    <button type="submit" name="save">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>



   
   

</div>







<!----------------------------------------------------TODAY APPOINTMENT ------------------------------------------------>


 


<!----------------------------------------------------TODAY APPOINTMENT END ------------------------------------------------>







  <?php include "include/leftsider.php" ?>


</div>







<script>
function addFollowUpSection() {
    const container = document.getElementById("additional-sections");

    const newSection = document.createElement("div");
    newSection.classList.add("from-field");
    const sectionIndex = container.children.length; // Get the number of sections added

    newSection.innerHTML = `
        <div class="inline-fields">
            <div class="field">
                <label for="follow_update_${sectionIndex}">Follow Update:</label>
                <input type="date" id="follow_update_${sectionIndex}" name="follow_update[${sectionIndex}]">
            </div>
            <div class="field">
                <label for="remark_${sectionIndex}">Remark:</label>
                <textarea id="remark_${sectionIndex}" name="remark[${sectionIndex}]"></textarea>
            </div>
        </div>
    `;

    container.appendChild(newSection);
}

</script>

<script>

function addPaymentSection() {
    const container = document.getElementById("payment-sections");

    const newSection = document.createElement("div");
    newSection.classList.add("from-field");
    const sectionIndex = container.children.length; // Get the number of sections added

    newSection.innerHTML = `
        <div class="inline-fields">
            <div class="field">
                <label for="payment_date_${sectionIndex}">Payment Date:</label>
                <input type="date" id="payment_date_${sectionIndex}" name="payment_date[${sectionIndex}]">
            </div>
            <div class="field">
                <label for="payment_amount_${sectionIndex}">Payment Amount:</label>
                <input type="number" id="payment_amount_${sectionIndex}" name="payment_amount[${sectionIndex}]">
            </div>
        </div>
    `;

    container.appendChild(newSection);
}

</script>

<script>
    // Function to show/hide the Reference input field based on the selected source
    function toggleReferenceInput() {
        var source = document.getElementById("source").value;
        var referenceField = document.getElementById("reference-field");
        
        if (source === "Reference") {
            referenceField.style.display = "block"; // Show the input field
        } else {
            referenceField.style.display = "none"; // Hide the input field
        }
    }

    // Call the function on page load in case the value is already set to "Reference"
    window.onload = function() {
        toggleReferenceInput();
    };
</script>

<?php require "include/footer.php"?>
