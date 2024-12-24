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





if($status=="OK")
{
$qb=mysqli_query($con,"INSERT INTO customer_detail (customer_name,email,number,enquiry_date,source,enquiry) VALUES ('$customer_name', '$email', '$number','$enquiry_date', '$source','$enquiry')");


		if($qb){
		    	$errormsg= "

                  <script language='javascript'>
                        window.location = 'customer.php';
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


<?php 

$q="SELECT * FROM  customer_detail ORDER BY id DESC";

$followupcount=0;
$r123 = mysqli_query($con,$q);
while ($ro = mysqli_fetch_array($r123)) {
 $id="$ro[id]";
 $status="$ro[status]";
 $today_date = date('Y-m-d');


 $query = "SELECT * FROM customer_detail WHERE id='$id'";
 $result = mysqli_query($con, $query);
 if ($result) {
     $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
 } else {
     echo "Error in query: " . mysqli_error($con);
 }
 // Iterate over the existing follow-up data if present
 $values=0;
 $lastfollowup=0;
 $follow_up_index = 0; // Start index for follow-ups
 foreach ($row as $key => $value) {
  
     if (strpos($key, 'follow_update_') === 0 && !is_null($value)) {
         // Extract the index from the column name
         
         $follow_up_index = str_replace('follow_update_', '', $key);
         $values=$value;
        
       
     }
   
  
    
   }
   if($values!=NULL && $status=="On Going" && $values == $today_date){
    $followupcount++;
   }
  
  }
?>

<?php

                         $q="SELECT * FROM  customer_detail ORDER BY id DESC";
                         $lead=0;
                         $convert=0;
                         $nonconvert=0;
                         $onhold=0;
                         $pendpay=0;
                         $followup=0;


                         $r123 = mysqli_query($con,$q);
                        while ($ro = mysqli_fetch_array($r123)) {
                          $id="$ro[id]";
                          $status="$ro[status]";
                          $payment="$ro[payment]";
                          $payment = (float)$payment;
                          $total_amount=$payment;
                          $query = "SELECT * FROM customer_detail WHERE id='$id'";
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
                                  $payment=$payment-(float)$payment_value;
                              }}

 
                      
                      
                        
                     
                          if($status=="New"){
                            $lead++;
                          }
                          else if($status=="On Going"){
                          $onhold++;
                          }
                          else if($status=="Converted"){
                            $convert++;
                            if($payment==0 && $total_amount!=0 || $payment<0 ){
                           
                            }
                           
                            else{
                              $pendpay++;
                
                            }
                          }
                          else if($status=="Not Converted"){
                            $nonconvert++;
                          }
                         



                        }?>

<div class="page-content">
<div class="merit-box">
  <div class="boxx-lead">
  <p class="lead-no"><?php print $lead?></p>
  <i class="fa-solid fa-phone" style="display: inline; margin-right: 5px;"></i>
  <p style="display: inline;">New Leads</p>
   

  </div>
  <div class="boxx-lead">
  <p class="lead-no"><?php print $convert?></p>

  <i class="fa-solid fa-rotate" style="display: inline; margin-right: 5px;"></i>
    <p style="display: inline;">Converted</p>
   

  </div>
  <div class="boxx-lead">
  <p class="lead-no"><?php print $followupcount?></p>
  <i class="fa-solid fa-calendar-days" style="display: inline; margin-right: 5px;"></i>
    <p style="display: inline;">FollowUp</p>

  </div>
  <div class="boxx-lead">
  <p class="lead-no"><?php print $onhold?></p>

  <i class="fa-solid fa-pause" style="display: inline; margin-right: 5px;"></i>
    <p style="display: inline;">On Hold</p>
  

  </div>
  <div class="boxx-lead">
  <p class="lead-no"><?php print $pendpay?></p>

  <i class="fa-solid fa-hourglass-end" style="display: inline; margin-right: 5px;"></i>
    <p style="display: inline;">Pending Payment</p>


  </div>

  <div class="boxx-lead">
  <p class="lead-no"><?php print $nonconvert?></p>

  <i class="fa-solid fa-ban" style="display: inline; margin-right: 5px;"></i>
    <p style="display: inline;">Not Converted</p>
   

  </div>

</div>



    <div class="customer_button1">
      <button class="button-86" onclick="openModal()"> +</button>
    </div>

















<!----------------------------------------------ADD CLIENT FROM------------------------------------------------------->

    <div id="newLeadModal" class="modal" >
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Create New Lead</h2>
            <?php
if($_SERVER['REQUEST_METHOD'] == 'POST')
						{
						print $errormsg;
						}
   ?>
            <form  action="" method="post" enctype="multipart/form-data" >
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
        <select id="enquiry" name="enquiry" required >
            <option value="Book">Book</option>
            <option value="Book Chapter">Book Chapter</option>
            <option value="Edit Book">Edit Book</option>
        </select>
            </div>

            <div class="field">
                <label for="source">Lead:</label>
                <select id="source" name="source" required >
                    <option value="Google">Google</option>                   
                    <option value="Justdail">Justdail</option>
                    <option value="Indaimart">Indaimart</option>
                    <option value="Website">Website</option>
                    <option value="Refernece">Refernece</option>
                    <option value="Ads">Ads</option>

                </select>            
              </div>
        </div>
    </div>

 
    
  

  
    
    <div>
        <button type="submit" name="save">Submit</button>
    </div>
</form>
        </div>
    </div>


    <!----------------------------------------------------ADD CLIENT FROM END---------------------------------------->
  


    <div class="kk" style="display: inline; ">
   <button class="search-button" onclick="toggleFilterOptions()"><i class="fa-solid fa-magnifying-glass"> </i> Search</button>
   </div> 

<div class="filter-options" id="filter-options" style=" display: none;">
<div class="filter-field">
        <label for="date-type">Select Date Type:</label>
        <select id="date-type">
            <option value="enquiry">Enquiry Date</option>
            <option value="followup">Follow-up Date</option>
            <option value="calling">Calling Date</option>
        </select>
    </div>
    <div class="filter-field">
        <label for="start-date">Start Date:</label>
        <input type="date" id="start-date">
    </div>

    <div class="filter-field">
        <label for="end-date">End Date:</label>
        <input type="date" id="end-date">
    </div>

    <div class="filter-field">
        <label for="search-name">Search by Name:</label>
        <input type="text" id="search-name" placeholder="Search by customer name">
    </div>

   


    <div class="search-buttton">
        <button onclick="applyFilters()"><i class="fa-solid fa-magnifying-glass"></i></button>
    </div>
</div>


    <!---------------------------------------------------- CLIENT DATA TABLE ------------------------------------------>


    

    <div class="content-categories" >
  
    <div class="label-wrapper">
        <input class="nav-item" name="nav" type="radio" id="opt-1" checked onclick="filterTasks('all')">
        <label class="category" for="opt-1">All</label>
    </div>
    <div class="label-wrapper">
        <input class="nav-item" name="nav" type="radio" id="opt-new" onclick="filterTasks('new')">
        <label class="category" for="opt-new">New</label>
    </div>
    <div class="label-wrapper">
        <input class="nav-item" name="nav" type="radio" id="opt-5" onclick="filterTasks('followup')">
        <label class="category" for="opt-5">Follow Up</label>
    </div>
    <div class="label-wrapper">
        <input class="nav-item" name="nav" type="radio" id="opt-2" onclick="filterTasks('on-hold')">
        <label class="category" for="opt-2">On Hold</label>
    </div>
    <div class="label-wrapper">
        <input class="nav-item" name="nav" type="radio" id="opt-3" onclick="filterTasks('approved')">
        <label class="category" for="opt-3">Converted</label>
    </div>
    <div class="label-wrapper">
        <input class="nav-item" name="nav" type="radio" id="opt-4" onclick="filterTasks('rejected')">
        <label class="category" for="opt-4">Not Converted</label>
    </div>
 
</div>


    <!-- All Tasks -->

    <div class="wrapper" id="tasks-all">
    <div class="task">
    <table class="table">
    <thead>
  <tr style="color:rgb(51,107,193);">
    <th><span class='label-text'><b>Enquiry Date </b></span><i class="fa-solid fa-up-down" onclick="sortTable(0, 'tasks-all')"></i></th>
    <th><span class='label-text'><b>Name </b></span><i class="fa-solid fa-up-down" onclick="sortTable(1, 'tasks-all')"></i></th>
    <th><span class='label-text'><b>Source </b></span><i class="fa-solid fa-up-down" onclick="sortTable(2, 'tasks-all')"></i></th>
    <th><span class='label-text'><b>Number </b></span><i class="fa-solid fa-up-down" onclick="sortTable(3, 'tasks-all')"></i></th>
    <th><span class='label-text'><b>Enquiry </b></span><i class="fa-solid fa-up-down" onclick="sortTable(4, 'tasks-all')"></i></th>
    <th><span class='label-text'><b>Last FollowUp </b></span><i class="fa-solid fa-up-down" onclick="sortTable(5, 'tasks-all')"></i></th>
    <th><span class='label-text'><b>Next FollowUp</b></span><i class="fa-solid fa-up-down" onclick="sortTable(6, 'tasks-all')"></i></th>
    <th><span class='label-text'><b>Status </b></span><i class="fa-solid fa-up-down" onclick="sortTable(7, 'tasks-all')"></i></th>
    <th></th>
  </tr>
</thead>

                   
                        <?php
                     $startDate = isset($_GET['start_date']) ? $_GET['start_date'] : '';
                     $endDate = isset($_GET['end_date']) ? $_GET['end_date'] : '';
                     $searchName = isset($_GET['search_name']) ? $_GET['search_name'] : '';
                     $dateType = isset($_GET['date_type']) ? $_GET['date_type'] : '';  // Default to 'enquiry' if no selection

                     
                     $query = "SELECT * FROM customer_detail WHERE 1=1";
                     
                     if ($startDate && $endDate) {
                      $endDate = $endDate . ' 23:59:59';  // Set time to the end of the day
                      if ($dateType === 'enquiry') {
                          $query .= " AND enquiry_date BETWEEN '$startDate' AND '$endDate'";
                      } elseif ($dateType === 'followup') {
                          $query .= " AND last_followupdate BETWEEN '$startDate' AND '$endDate'";
                      } elseif ($dateType === 'calling') {
                          $query .= " AND calling_date BETWEEN '$startDate' AND '$endDate'";
                      }
                  }
                     
                     if ($searchName) {
                      $query .= " AND (customer_name LIKE '%$searchName%' OR enquiry LIKE '%$searchName%' OR number LIKE '%$searchName%' OR source LIKE '%$searchName%')";
                  }
                     
                  
                     
                     $query .= " ORDER BY id DESC";
                     
                     $r123 = mysqli_query($con, $query);
                     
                        while ($ro = mysqli_fetch_array($r123)) {

                        $id="$ro[id]";
                          $customer_name="$ro[customer_name]";
                          $email="$ro[email]";
                          $number="$ro[number]";
                          $enquiry="$ro[enquiry]";
                          $enquiry_date="$ro[enquiry_date]";
                          $source="$ro[source]";
                        
                          $status="$ro[status]";
                          $today_date="$ro[today_date]";
                          $query = "SELECT * FROM customer_detail WHERE id='$id'";
                          $result = mysqli_query($con, $query);
                          if ($result) {
                              $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                          } else {
                              echo "Error in query: " . mysqli_error($con);
                          }
                          // Iterate over the existing follow-up data if present
                          $values=0;
                          $lastfollowup=0;
                          $follow_up_index = 0; // Start index for follow-ups
                          foreach ($row as $key => $value) {
                           
                              if (strpos($key, 'follow_update_') === 0 && !is_null($value)) {
                                  // Extract the index from the column name
                                  $lastfollowup=$values;
                                  $follow_up_index = str_replace('follow_update_', '', $key);
                                  $values=$value;
                              }
                            }
                          
                            echo "
                                <tr>
                                  <td><span class='label-text'>$enquiry_date</span></td>
                                   <td><span class='label-text' >$customer_name</span></td>
            <td><span class='label-text'>$source</span></td>
            <td><span class='label-text'>$number</span></td>
            <td ><span class='label-text'>$enquiry</span></td>
                <td><span class='label-text'>$lastfollowup</span></td>
            <td><span class='label-text'>$values</span></td>
            ";
            if($status=="New"){
              print"<td ><span class='tag progress '>New</span></td>";

            }
            else if($status=="On Going"){
              print"<td ><span class='tag hold '>On Hold</span></td>";

            }
            else if($status=="Converted"){
              print"<td ><span class='tag approved '>Converted</span></td>";

            }
            else if($status=="Not Converted"){
              print"<td ><span class='tag reject '>Not Converted</span></td>";

            }
            print"
                          

            <td>
              <div class='dropdown'>
                <i class='fa-solid fa-ellipsis-vertical' style='padding:5px;cursor: pointer;' onclick='toggleDropdown(event)'></i>
                <div class='dropdown-content'>
                  <a href='viewclientdetail.php?id=$id' onclick=''>View</a>
                  <a href='editclientdetail.php?id=$id' onclick='openPopup()'>Edit</a>
                   <a href='deleteclient.php?id=$id' onclick='return confirmDelete(this);'>Delete</a>

                </div>
              </div>
            </td>
                                </tr>
                                
                            ";
                          }
                           
                        

                        ?>
                   
                   
                    
                </table>
             
                </div>
  


   
    </div>

    <!----New Task---->
    <div class="wrapper" id="tasks-new" >
    <div class="task">
        <table class="table">
     
        <thead>
  <tr style="color:rgb(51,107,193);">
  <th><span class='label-text'><b>Enquiry Date </b></span><i class="fa-solid fa-up-down" onclick="sortTable(0, 'tasks-new')"></i></th>
    <th><span class='label-text'><b>Name </b></span><i class="fa-solid fa-up-down" onclick="sortTable(1, 'tasks-new')"></i></th>
    <th><span class='label-text'><b>Source </b></span><i class="fa-solid fa-up-down" onclick="sortTable(2, 'tasks-new')"></i></th>
    <th><span class='label-text'><b>Number </b></span><i class="fa-solid fa-up-down" onclick="sortTable(3, 'tasks-new')"></i></th>
    <th><span class='label-text'><b>Enquiry </b></span><i class="fa-solid fa-up-down" onclick="sortTable(4, 'tasks-new')"></i></th>
    <th><span class='label-text'><b>Status </b></span><i class="fa-solid fa-up-down" onclick="sortTable(5, 'tasks-new')"></i></th>
    <th></th>
  </tr>
</thead>


            <?php
                $q="SELECT * FROM  customer_detail ORDER BY id DESC";


                $r123 = mysqli_query($con,$q);

            while ($ro = mysqli_fetch_array($r123)) {
                $id = "$ro[id]";
                $customer_name = "$ro[customer_name]";
                $email = "$ro[email]";
                $number = "$ro[number]";
                $enquiry = "$ro[enquiry]";
                $source = "$ro[source]";
                $status = "$ro[status]";
                $enquiry_date="$ro[enquiry_date]";

                $today_date = "$ro[today_date]";
                if ($status == "New") {
                    echo "
                        <tr>
                             <td><span class='label-text'>$enquiry_date</span></td>
                            <td><span class='label-text'>$customer_name</span></td>
                            <td><span class='label-text'>$source</span></td>
                            <td><span class='label-text'>$number</span></td>
                            <td><span class='label-text'>$enquiry</span></td>

                            <td><span class='tag progress'>New</span></td>
                            <td>
                                <div class='dropdown'>
                                    <i class='fa-solid fa-ellipsis-vertical' style='padding:5px;cursor: pointer;' onclick='toggleDropdown(event)'></i>
                                    <div class='dropdown-content'>
                                        <a href='viewclientdetail.php?id=$id' onclick=''>View</a>
                                        <a href='editclientdetail.php?id=$id' onclick='openPopup()'>Edit</a>
                                        <a href='deleteclient.php?id=$id' onclick='return confirmDelete(this);'>Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    ";
                }
            }
            ?>
        </table>
    </div>
</div>
    

      <!-- On Hold Tasks -->
      <div class="wrapper" id="tasks-on-hold" style="display: none;">
        
      <div class="task">
    <table class="table ">
        
    
             
                 
                    
    <thead>
                <tr style="color:rgb(51,107,193);">
                    <th><span class='label-text'><b>Enquiry Date </b></span><i class="fa-solid fa-up-down" onclick="sortTable(0, 'tasks-on-hold')"></i></th>
                    <th><span class='label-text'><b>Name </b></span><i class="fa-solid fa-up-down" onclick="sortTable(1, 'tasks-on-hold')"></i></th>
                    <th><span class='label-text'><b>Source </b></span><i class="fa-solid fa-up-down" onclick="sortTable(2, 'tasks-on-hold')"></i></th>
                    <th><span class='label-text'><b>Number </b></span><i class="fa-solid fa-up-down" onclick="sortTable(3, 'tasks-on-hold')"></i></th>
                    <th><span class='label-text'><b>Enquiry </b></span><i class="fa-solid fa-up-down" onclick="sortTable(4, 'tasks-on-hold')"></i></th>
                    <th><span class='label-text'><b>Last FollowUp </b></span><i class="fa-solid fa-up-down" onclick="sortTable(5, 'tasks-on-hold')"></i></th>
                    <th><span class='label-text'><b>Next FollowUp </b></span><i class="fa-solid fa-up-down" onclick="sortTable(6, 'tasks-on-hold')"></i></th>
                    <th><span class='label-text'><b>Status </b></span><i class="fa-solid fa-up-down" onclick="sortTable(7, 'tasks-on-hold')"></i></th>
                    <th></th>
                </tr>
            </thead>
      
                   
                        <?php
                              $q="SELECT * FROM  customer_detail ORDER BY id DESC";


                              $r123 = mysqli_query($con,$q);
                        while ($ro = mysqli_fetch_array($r123)) {
                          $id="$ro[id]";

                          $query = "SELECT * FROM customer_detail WHERE id='$id'";
                          $result = mysqli_query($con, $query);
                          if ($result) {
                              $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                          } else {
                              echo "Error in query: " . mysqli_error($con);
                          }
                          // Iterate over the existing follow-up data if present
                          $values=0;
                          $lastfollowup=0;
                          $follow_up_index = 0; // Start index for follow-ups
                          foreach ($row as $key => $value) {
                           
                              if (strpos($key, 'follow_update_') === 0 && !is_null($value)) {
                                  // Extract the index from the column name
                                  $lastfollowup=$values;
                                  $follow_up_index = str_replace('follow_update_', '', $key);
                                  $values=$value;
                              }
                            }
                          $customer_name="$ro[customer_name]";
                          $email="$ro[email]";
                          $number="$ro[number]";
                          $enquiry="$ro[enquiry]";
                          $source="$ro[source]";
                          $status="$ro[status]";

                          if($status=="On Going"){
                            echo "
                                <tr>
                                            <td ><span class='label-text'>$enquiry_date</span></td>
                                   <td><span class='label-text' >$customer_name</span></td>
            <td><span class='label-text'>$source</span></td>
            <td><span class='label-text'>$number</span></td>
            <td ><span class='label-text'>$enquiry</span></td>
            <td><span class='label-text'>$lastfollowup</span></td>
            <td><span class='label-text'>$values</span></td>
            <td  ><span class='tag hold '>On Hold</span></td>
              <td>
              <div class='dropdown'>
                <i class='fa-solid fa-ellipsis-vertical' style='padding:5px;cursor: pointer;' onclick='toggleDropdown(event)'></i>
                <div class='dropdown-content'>
                  <a href='viewclientdetail.php?id=$id' onclick=''>View</a>
                  <a href='editclientdetail.php?id=$id' onclick='openPopup()'>Edit</a>
                  <a href='deleteclient.php?id=$id' onclick='return confirmDelete(this);'>Delete</a>

                </div>
              </div>
            </td>
                                </tr>
                                
                            ";
                          }
                           
                        }

                        ?>
                   
                   
                    
                </table>
             
                </div>
  
        <!-- Add more tasks as needed -->
    </div>

       <!-- Approved Tasks -->
       <div class="wrapper" id="tasks-approved" style="display: none;">
       <div class="task">
    <table class="table ">
        
    
             
    <thead>
    <tr style="color:rgb(51,107,193);">
        <th><span class='label-text'><b>Enquiry Date </b></span><i class="fa-solid fa-up-down" onclick="sortTable(0, 'tasks-approved')"></i></th> <!-- Sorting Enquiry Date -->
        <th><span class='label-text'><b>Name </b></span><i class="fa-solid fa-up-down" onclick="sortTable(1, 'tasks-approved')"></i></th> <!-- Sorting Name -->
        <th><span class='label-text'><b>Source </b></span><i class="fa-solid fa-up-down" onclick="sortTable(2, 'tasks-approved')"></i></th> <!-- Sorting Source -->
        <th><span class='label-text'><b>Number </b></span><i class="fa-solid fa-up-down" onclick="sortTable(3, 'tasks-approved')"></i></th> <!-- Sorting Number -->
        <th><span class='label-text'><b>Enquiry </b></span><i class="fa-solid fa-up-down" onclick="sortTable(4, 'tasks-approved')"></i></th> <!-- Sorting Enquiry -->
        <th><span class='label-text'><b>Remaining Payment </b></span><i class="fa-solid fa-up-down" onclick="sortTable(5, 'tasks-approved')"></i></th> <!-- Sorting Remaining Payment -->
        <th><span class='label-text'><b>Assign To </b></span><i class="fa-solid fa-up-down" onclick="sortTable(6, 'tasks-approved')"></i></th> <!-- Sorting Assign To -->
        <th><span class='label-text'><b>Status </b></span><i class="fa-solid fa-up-down" onclick="sortTable(7, 'tasks-approved')"></i></th> <!-- Sorting Status -->
        <th></th>
    </tr>
</thead>

                   
                        <?php
                         $q="SELECT * FROM  customer_detail ORDER BY id DESC";


                         $r123 = mysqli_query($con,$q);
                        while ($ro = mysqli_fetch_array($r123)) {
                          $id="$ro[id]";
                          $customer_name="$ro[customer_name]";
                          $email="$ro[email]";
                          $number="$ro[number]";
                          $enquiry="$ro[enquiry]";
                          $source="$ro[source]";
                          $status="$ro[status]";
                          $payment="$ro[payment]";
                          $enquiry_date="$ro[enquiry_date]";

                          $reference="$ro[reference]";
                          $allot_to="$ro[allot_to]";
                      
                          $payment = (float)$payment;
                          $total_amount=$payment;
                          $query = "SELECT * FROM customer_detail WHERE id='$id'";
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
                                  $payment=$payment-(float)$payment_value;
                              }}
                   
                          if($status=="Converted"){
                            echo "
                                <tr>
                                   <td ><span class='label-text'>$enquiry_date</span></td>
                                   <td><span class='label-text' >$customer_name</span></td>
            <td><span class='label-text'>$source</span></td>
            <td><span class='label-text'>$number</span></td>
            <td ><span class='label-text'>$enquiry</span></td>
          ";
            if($payment==0 && $total_amount!=0 || $payment<0 ){
              print"
               <td ><span class='label-text'>Completed</span></td>
              ";
            }
           
            else{
              print"
                          <td ><span class='label-text'>₹.$payment</span></td>

              ";

            }
            print"
                        <td ><span class='label-text'>$allot_to</span></td>

            <td  ><span class='tag approved '>Converted</span></td>
             <td>
              <div class='dropdown'>
                <i class='fa-solid fa-ellipsis-vertical' style='padding:5px;cursor: pointer;' onclick='toggleDropdown(event)'></i>
                <div class='dropdown-content'>
                  <a href='viewclientdetail.php?id=$id' onclick=''>View</a>
                  <a href='editclientdetail.php?id=$id' onclick='openPopup()'>Edit</a>
                  <a href='deleteclient.php?id=$id' onclick='return confirmDelete(this);'>Delete</a>

                </div>
              </div>
            </td>
                                </tr>
                                
                            ";
                          }
                           
                        }

                        ?>
                   
                   
                    
                </table>
             
                </div>
  
        <!-- Add more approved tasks as needed -->
    </div>


        <!-- Rejected Tasks -->
        <div class="wrapper" id="tasks-rejected" style="display: none;">
        <div class="task">
    <table class="table ">
        
    
             
                 
                    
    <thead>
    <tr style="color:rgb(51,107,193);">
        <th><span class='label-text'><b>Enquiry Date </b></span><i class="fa-solid fa-up-down" onclick="sortTable(0, 'tasks-rejected')"></i></th>
        <th><span class='label-text'><b>Name </b></span><i class="fa-solid fa-up-down" onclick="sortTable(1, 'tasks-rejected')"></i></th>
        <th><span class='label-text'><b>Source </b></span><i class="fa-solid fa-up-down" onclick="sortTable(2, 'tasks-rejected')"></i></th>
        <th><span class='label-text'><b>Number </b></span><i class="fa-solid fa-up-down" onclick="sortTable(3, 'tasks-rejected')"></i></th>
        <th><span class='label-text'><b>Enquiry </b></span><i class="fa-solid fa-up-down" onclick="sortTable(4, 'tasks-rejected')"></i></th>
       <th><span class='label-text'><b>Status </b></span><i class="fa-solid fa-up-down" onclick="sortTable(7, 'tasks-rejected')"></i></th>
        <th></th>
    </tr>
</thead>
                   
                        <?php
                         $q="SELECT * FROM  customer_detail ORDER BY id DESC";


                         $r123 = mysqli_query($con,$q);
                        while ($ro = mysqli_fetch_array($r123)) {
                          $id="$ro[id]";
                          $customer_name="$ro[customer_name]";
                          $email="$ro[email]";
                          $number="$ro[number]";
                          $enquiry="$ro[enquiry]";
                          $enquiry_date="$ro[enquiry_date]";

                          $source="$ro[source]";
                          $status="$ro[status]";
                          if($status=="Not Converted"){
                            echo "
                                <tr>
                                                        <td ><span class='label-text'>$enquiry_date</span></td>

                                   <td><span class='label-text' >$customer_name</span></td>
            <td><span class='label-text'>$source</span></td>
            <td><span class='label-text'>$number</span></td>
            <td ><span class='label-text'>$enquiry</span></td>

            <td  ><span class='tag reject '>Not Converted</span></td>
              <td>
              <div class='dropdown'>
                <i class='fa-solid fa-ellipsis-vertical' style='padding:5px;cursor: pointer;' onclick='toggleDropdown(event)'></i>
                <div class='dropdown-content'>
                  <a href='viewclientdetail.php?id=$id' onclick=''>View</a>
                  <a href='editclientdetail.php?id=$id' onclick='openPopup()'>Edit</a>
                  <a href='deleteclient.php?id=$id' onclick='return confirmDelete(this);'>Delete</a>

                </div>
              </div>
            </td>
                                </tr>
                                
                            ";
                          }
                           
                        }

                        ?>
                   
                   
                    
                </table>
             
                </div>
  
        <!-- Add more rejected tasks as needed -->
    </div>
    <div class="wrapper" id="tasks-followup" style="display: none;">
       <div class="task">
    <table class="table ">
        
    
             
                 
                    
                       
    <thead>
                <tr style="color:rgb(51,107,193);">
                    <th><span class='label-text'><b>Enquiry Date </b></span><i class="fa-solid fa-up-down" onclick="sortTable(0, 'tasks-followup')"></i></th>
                    <th><span class='label-text'><b>Name </b></span><i class="fa-solid fa-up-down" onclick="sortTable(1, 'tasks-followup')"></i></th>
                    <th><span class='label-text'><b>Source </b></span><i class="fa-solid fa-up-down" onclick="sortTable(2, 'tasks-followup')"></i></th>
                    <th><span class='label-text'><b>Number </b></span><i class="fa-solid fa-up-down" onclick="sortTable(3, 'tasks-followup')"></i></th>
                    <th><span class='label-text'><b>Enquiry </b></span><i class="fa-solid fa-up-down" onclick="sortTable(4, 'tasks-followup')"></i></th>
                    <th><span class='label-text'><b>Last FollowUp </b></span><i class="fa-solid fa-up-down" onclick="sortTable(5, 'tasks-followup')"></i></th>
                    <th><span class='label-text'><b>Next FollowUp </b></span><i class="fa-solid fa-up-down" onclick="sortTable(6, 'tasks-followup')"></i></th>
                    <th><span class='label-text'><b>Status </b></span><i class="fa-solid fa-up-down" onclick="sortTable(7, 'tasks-followup')"></i></th>
                    <th></th>
                </tr>
            </thead>
                   
                        <?php
                         $q="SELECT * FROM  customer_detail ORDER BY id DESC";


                         $r123 = mysqli_query($con,$q);
                        while ($ro = mysqli_fetch_array($r123)) {
                          $id="$ro[id]";

                          $query = "SELECT * FROM customer_detail WHERE id='$id'";
                          $result = mysqli_query($con, $query);
                          if ($result) {
                              $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                          } else {
                              echo "Error in query: " . mysqli_error($con);
                          }
                          // Iterate over the existing follow-up data if present
                          $values=0;
                          $lastfollowup=0;
                          $follow_up_index = 0; // Start index for follow-ups
                          foreach ($row as $key => $value) {
                           
                              if (strpos($key, 'follow_update_') === 0 && !is_null($value)) {
                                  // Extract the index from the column name
                                  $lastfollowup=$values;
                                  $follow_up_index = str_replace('follow_update_', '', $key);
                                  $values=$value;
                              }
                            }
                          $customer_name="$ro[customer_name]";
                          $email="$ro[email]";
                          $number="$ro[number]";
                          $enquiry="$ro[enquiry]";
                          $enquiry_date="$ro[enquiry_date]";

                          $source="$ro[source]";
                          $status="$ro[status]";
                          $today_date = date('Y-m-d');
                          if($status=="On Going" && $values == $today_date){
                            echo "
                                <tr>
                                   <td><span class='label-text' >$enquiry_date</span></td>
                                   <td><span class='label-text' >$customer_name</span></td>
            <td><span class='label-text'>$source</span></td>
            <td><span class='label-text'>$number</span></td>
            <td ><span class='label-text'>$enquiry</span></td>
            <td><span class='label-text'>$lastfollowup</span></td>
            <td><span class='label-text'>$values</span></td>
            <td  ><span class='tag hold '>On Hold</span></td>
              <td>
              <div class='dropdown'>
                <i class='fa-solid fa-ellipsis-vertical' style='padding:5px;cursor: pointer;' onclick='toggleDropdown(event)'></i>
                <div class='dropdown-content'>
                  <a href='viewclientdetail.php?id=$id' onclick=''>View</a>
                  <a href='editclientdetail.php?id=$id' onclick='openPopup()'>Edit</a>
                  <a href='deleteclient.php?id=$id' onclick='return confirmDelete(this);'>Delete</a>

                </div>
              </div>
            </td>
                                </tr>
                                
                            ";
                          }
                           
                        }

                        ?>
                   
                   
                    
                </table>
                
             
                </div>
  
        <!-- Add more approved tasks as needed -->
    </div>
   
  </div>


<!---------------------------------------------------- CLIENT DATA TABLE END---------------------------------------->















<!----------------------------------------------------TODAY APPOINTMENT ------------------------------------------------>




<!----------------------------------------------------TODAY APPOINTMENT END ------------------------------------------------>

<?php include "include/leftsider.php" ?>

</div>
<script>

  // Function to toggle the visibility of the filter options
function toggleFilterOptions() {
    var filterOptions = document.getElementById('filter-options');
    if (filterOptions.style.display === "none" || filterOptions.style.display === "") {
        filterOptions.style.display = "flex"; // Show the filter options
    } else {
        filterOptions.style.display = "none"; // Hide the filter options
    }
}


</script>
<script>
  function sortTable(n) {
    var table = document.querySelector(".table");
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
        if (n === 4) { // Assuming Enquiry Date column is at index 4
          x = new Date(x);
          y = new Date(y);
        } else if (n === 2) { // Assuming Number column is at index 2
          x = x.replace(/\D/g, ''); // Strip non-numeric characters for comparison
          y = y.replace(/\D/g, '');
          x = parseInt(x, 10);
          y = parseInt(y, 10);
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
</script>


<script>
    function applyFilters() {
    // Get the selected filter values
    var dateType = document.getElementById('date-type').value;
    var startDate = document.getElementById('start-date').value;
    var endDate = document.getElementById('end-date').value;
    var searchName = document.getElementById('search-name').value;

    // Construct the query string
    var queryString = '?date_type=' + dateType;
    if (startDate) queryString += '&start_date=' + startDate;
    if (endDate) queryString += '&end_date=' + endDate;
    if (searchName) queryString += '&search_name=' + encodeURIComponent(searchName);

    // Redirect to the same page with updated query parameters
    window.location.href = window.location.pathname + queryString;
}
</script>

<script src="assest/js/addclient.js"></script>
<script src="assest/js/datatable.js"></script>
<script src="assest/js/editandviewclient.js"></script>


<?php require "include/footer.php"?>
