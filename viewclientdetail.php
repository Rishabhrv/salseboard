<?php require "include/header.php"?>
<?php require "include/sidebar.php"?>
<?php require "db.php";
$todo=  mysqli_real_escape_string($con,$_GET['id']);
?>
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
table  td,th{
width:400px;
padding:20px 21px;
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
  .page-content{
  overflow-y: auto;

}

</style>

";

?>
<div class="page-content">
<?php
// Assuming your database connection is already established
$query = "SELECT * FROM customer_detail WHERE id='$todo'";
$result = mysqli_query($con, $query);
$i = 0;

while($row = mysqli_fetch_array($result)) {
    $id = $row['id'];
    $customer_name = $row['customer_name'];
    $email = $row['email'];
    $number = $row['number'];
    $status = $row['status'];
    $enquiry_date = $row['enquiry_date'];
    $source = $row['source'];
    $enquiry = $row['enquiry'];
    $follow_update = $row['follow_update'];
    $remark = $row['remark'];
    $calling_date = $row['calling_date'];
    $payment = $row['payment'];
    $reference = $row['reference'];
}
?>

<!-- HTML Table to Display Data -->
<table  border="1">
    <tbody >
     
        <tr>
            <td><b>Customer Name</b></td>
            <td colspan="3"><?php echo $customer_name; ?></td>
        </tr>
        <tr>
            <td><b>Email</b></td>
            <td><?php echo $email; ?></td>
            <td><b>Phone Number</b></td>
            <td><?php echo $number; ?></td>
        </tr>
        <tr>
            <td><b>Status</b></td>
            <td><?php echo $status; ?></td>
            <td><b>Enquiry Date</b></td>
            <td><?php echo $enquiry_date; ?></td>
        </tr>
        <tr>
            <td><b>Source</b></td>
            <td><?php echo $source; ?></td>
            <td><b>Enquiry</b></td>
            <td><?php echo $enquiry; ?></td>
        </tr>
        </tbody>
        </table>

        <h3>Follow Up</h3>
        <table  border="1">
    <tbody >
        <tr>
            <th><b>Follow-up Date</b></th>
            <th><b>Remarks</b></th>
        </tr>
     
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
            print "
       
             <tr>
            <td>$value</td>
            <td>$remark_value </td>
        </tr>
            ";
        }
    }
    ?>
       
     
        <tr>
        
        </tr>
    </tbody>
</table>

<h2>Payment </h2>
<table  border="1">
    <tbody >
        <tr>
        <th><b>payment Date</b></th>
        <th><b>Payment Status</b></th>
        </tr>
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
            print"
          
               <tr>
           
            <td>$value</td>
          
            <td>$payment_value</td>
        </tr>";
        }
    }
    ?>
        </tbody>
        </table>
</div>

<?php include "include/leftsider.php" ?>
<?php require "include/footer.php"?>
