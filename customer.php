<?php require "include/header.php"?>
<?php require "include/sidebar.php"?>
<?php require "db.php" ?>


<?php 
print"
<style>

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
.table  td{
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
   if($values!=NULL && $status=="On Going"){
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
  



    <!---------------------------------------------------- CLIENT DATA TABLE ------------------------------------------>




    <div class="content-categories">
        <div class="label-wrapper">
            <input class="nav-item" name="nav" type="radio" id="opt-1" checked onclick="filterTasks('all')">
            <label class="category" for="opt-1">New</label>
        </div>
        <div class="label-wrapper">
        <input class="nav-item" name="nav" type="radio" id="opt-5" onclick="filterTasks('followup')">
        <label class="category" for="opt-5">Follow Up</label>
        </div>
        <div class="label-wrapper">
            <input class="nav-item" name="nav" type="radio" id="opt-2"  onclick="filterTasks('on-hold')">
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

    <div class="tasks-wrapper" id="tasks-all">
    <div class="task">
    <table class="table ">
        
    
             
                 
                    
                    <tr style="color:rgb(51,107,193);" >
                        <td ><span class='label-text' ><b>Name</b></span></td>
                        <td><span class='label-text' ><b>Source</b></span></td>
                        <td><span class='label-text' ><b>Number</b></span></td>
                        <td ><span class='label-text' ><b>Enquiry</b></span></td>
                        <td ><span class='label-text' ><b>Status</b></span></td>
                        <td></td>
                    </tr>
                   
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
                          if($status=="New"){
                            echo "
                                <tr>
                                   <td><span class='label-text' >$customer_name</span></td>
            <td><span class='label-text'>$source</span></td>
            <td><span class='label-text'>$number</span></td>
            <td ><span class='label-text'>$enquiry</span></td>
            <td  ><span class='tag progress '>New</span></td>
            <td>
              <div class='dropdown'>
                <i class='fa-solid fa-ellipsis-vertical' style='padding:5px;cursor: pointer;' onclick='toggleDropdown(event)'></i>
                <div class='dropdown-content'>
                  <a href='#' onclick=''>View</a>
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
      <div class="tasks-wrapper" id="tasks-on-hold" style="display: none;">
        
      <div class="task">
    <table class="table ">
        
    
             
                 
                    
                    <tr style="color:rgb(51,107,193);">
                        <td ><span class='label-text' ><b>Name</b></span></td>
                        <td><span class='label-text' ><b>Source</b></span></td>
                        <td><span class='label-text' ><b>Number</b></span></td>
                        <td ><span class='label-text' ><b>Enquiry</b></span></td>
                        <td ><span class='label-text' ><b>Last FollowUp </b></span></td>
                        <td ><span class='label-text' ><b>Next FollowUp </b></span></td>
                        <td ><span class='label-text' ><b>Status</b></span></td>
                        <td></td>
                    </tr>
                   
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
                  <a href='#' onclick=''>View</a>
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
       <div class="tasks-wrapper" id="tasks-approved" style="display: none;">
       <div class="task">
    <table class="table ">
        
    
             
                 
                    
                    <tr style="color:rgb(51,107,193);" >
                        <td ><span class='label-text' ><b>Name</b></span></td>
                        <td><span class='label-text' ><b>Source</b></span></td>
                        <td><span class='label-text' ><b>Number</b></span></td>
                        <td ><span class='label-text' ><b>Enquiry</b></span></td>
                        <td ><span class='label-text' ><b>Remaining Payment</b></span></td>
                        <td ><span class='label-text' ><b>Assign To</b></span></td>
                        <td ><span class='label-text' ><b>Status</b></span></td>
                        <td></td>
                    </tr>
                   
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
                                   <td><span class='label-text' >$customer_name</span></td>
            <td><span class='label-text'>$source</span></td>
            <td><span class='label-text'>$number</span></td>
            <td ><span class='label-text'>$enquiry</span></td>";
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
                  <a href='#' onclick=''>View</a>
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
        <div class="tasks-wrapper" id="tasks-rejected" style="display: none;">
        <div class="task">
    <table class="table ">
        
    
             
                 
                    
                    <tr style="color:rgb(51,107,193);" >
                        <td ><span class='label-text' ><b>Name</b></span></td>
                        <td><span class='label-text' ><b>Source</b></span></td>
                        <td><span class='label-text' ><b>Number</b></span></td>
                        <td ><span class='label-text' ><b>Enquiry</b></span></td>
                        <td ><span class='label-text' ><b>Status</b></span></td>
                        <td></td>
                    </tr>
                   
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
                          if($status=="Not Converted"){
                            echo "
                                <tr>
                                   <td><span class='label-text' >$customer_name</span></td>
            <td><span class='label-text'>$source</span></td>
            <td><span class='label-text'>$number</span></td>
            <td ><span class='label-text'>$enquiry</span></td>
            <td  ><span class='tag reject '>Not Converted</span></td>
              <td>
              <div class='dropdown'>
                <i class='fa-solid fa-ellipsis-vertical' style='padding:5px;cursor: pointer;' onclick='toggleDropdown(event)'></i>
                <div class='dropdown-content'>
                  <a href='#' onclick=''>View</a>
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
    <div class="tasks-wrapper" id="tasks-followup" style="display: none;">
       <div class="task">
    <table class="table ">
        
    
             
                 
                    
    <tr style="color:rgb(51,107,193);">
                        <td ><span class='label-text' ><b>Name</b></span></td>
                        <td><span class='label-text' ><b>Source</b></span></td>
                        <td><span class='label-text' ><b>Number</b></span></td>
                        <td ><span class='label-text' ><b>Enquiry</b></span></td>
                        <td ><span class='label-text' ><b>Last FollowUp </b></span></td>
                        <td ><span class='label-text' ><b>Next FollowUp </b></span></td>
                        <td ><span class='label-text' ><b>Status</b></span></td>
                        <td></td>
                    </tr>
                   
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
                          $today_date = date('Y-m-d');
                          if($status=="On Going" && $values == $today_date){
                            echo "
                                <tr>
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
                  <a href='#' onclick=''>View</a>
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









</div>


<script src="assest/js/addclient.js"></script>
<script src="assest/js/datatable.js"></script>
<script src="assest/js/editandviewclient.js"></script>


<?php require "include/footer.php"?>
