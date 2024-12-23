<?php require "include/header.php"?>
<?php require "include/sidebar.php"?>
<?php

$todo=  mysqli_real_escape_string($con,$_GET['id']);
?>

<?php 
print"
<style>

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

  
}
  ?>


<div class="page-content" >
    <div class="header">Customer</div>


    <!---------------------------------------------------EDIT CLIENT FROM ---------------------------------------->

  

    <div id="editLeadModal">
    <div class="modal-content">
        <a href="customer.php" style="text-decoration:none;"><i class="fa-solid fa-angles-left" style="color: black;"></i><span class="close" onclick="closePopup()"> Back</span> </a>
        <h2>Edit Lead</h2>
    
            <div class="scrollable-container">
                <div class="from-field">
                    <div class="inline-fields">
                        <div class="field">
                           <h1>Client Name: </h1>
                           <h5><?php print $customer_name ?></h5>
                        </div>
                        <div class="field">
                        <h1>Email: </h1>
                        <h5><?php print $email ?></h5>
                            <label for="email"></label>
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
                            <select id="source" name="source">
                                <option value="Google" <?php echo ($source == 'Google') ? 'selected' : ''; ?>>Google</option>
                                <option value="Justdial" <?php echo ($source == 'Justdial') ? 'selected' : ''; ?>>Justdial</option>
                                <option value="Indiamart" <?php echo ($source == 'Indiamart') ? 'selected' : ''; ?>>Indiamart</option>
                                <option value="Website" <?php echo ($source == 'Website') ? 'selected' : ''; ?>>Website</option>
                                <option value="Reference" <?php echo ($source == 'Reference') ? 'selected' : ''; ?>>Reference</option>
                                <option value="Ads" <?php echo ($source == 'Ads') ? 'selected' : ''; ?>>Ads</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="from-field">
                    <div class="inline-fields">
                        <div class="field">
                            <label for="status">Status:</label>
                            <select id="status" name="status" onchange="toggleFields()">
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
            
            </div>
        
    </div>
</div>



   
   

</div>







<!----------------------------------------------------TODAY APPOINTMENT ------------------------------------------------>


  <div class="right-bar">
    <div class="top-part">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
        class="feather feather-users">
        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
        <circle cx="9" cy="7" r="4" />
        <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
        <path d="M16 3.13a4 4 0 0 1 0 7.75" /></svg>
      <div class="count">6</div>
    </div>
    <div class="header" style="font-size: 15px;margin-left:20px;">Today Schedule</div>
    <div class="right-content">
      <div class="task-box yellow">
        <div class="description-task">
          <div class="time">08:00 - 09:00 AM</div>
          <div class="task-name">Client Name</div>
        </div>
        <div class="more-button"></div>
        <div class="members">
        <i class="fa-solid fa-phone" style="display: inline; margin-right: 5px;font-size:14px;"></i>
        <div style="display: inline; margin: 0px;color:gray; font-size:15px">7821921978</div>
        
        </div>
      </div>
      <div class="task-box green">
        <div class="description-task">
          <div class="time">08:00 - 09:00 AM</div>
          <div class="task-name">Client Name</div>
        </div>
        <div class="more-button"></div>
        <div class="members">
        <i class="fa-solid fa-phone" style="display: inline; margin-right: 5px;font-size:14px;"></i>
        <div style="display: inline; margin: 0px;color:gray; font-size:15px">7821921978</div>
        
        </div>
      </div>
      <div class="task-box blue">
        <div class="description-task">
          <div class="time">08:00 - 09:00 AM</div>
          <div class="task-name">Client Name</div>
        </div>
        <div class="more-button"></div>
        <div class="members">
        <i class="fa-solid fa-phone" style="display: inline; margin-right: 5px;font-size:14px;"></i>
        <div style="display: inline; margin: 0px;color:gray; font-size:15px">7821921978</div>
        
        </div>
      </div>
      
      
     
   
    
     
   
    </div>
  </div>



<!----------------------------------------------------TODAY APPOINTMENT END ------------------------------------------------>










</div>









<?php require "include/footer.php"?>
