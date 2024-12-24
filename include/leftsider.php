
<div class="right-bar">
    <div class="top-part">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
        class="feather feather-users">
        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
        <circle cx="9" cy="7" r="4" />
        <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
        <path d="M16 3.13a4 4 0 0 1 0 7.75" /></svg>
     
    </div>
    <h3 class="" style="margin-left:20px;">Today Schedule</h3>
    <div class="right-content">
    <?php
                         $q="SELECT * FROM  customer_detail ORDER BY id DESC";

                          $color="yellow";
                          $count=1;
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
                            if($count%2==0){
                              $color="yellow";
                            }
                            else if($count%3==0){
                              $color="blue";
                            }
                            else{
                              $color="green";
                            }
                            print"
                            
                               <div class='task-box $color'>
          <div class='task-details'>
            <div class='time ' style='display:inline;'>Today</div>    
            <div class='dropdown' style='margin-left:120px;'>
                <i class='fa-solid fa-ellipsis-vertical' style='padding:5px;cursor: pointer;' onclick='toggleDropdown(event)'></i>
                <div class='dropdown-content'>
                  <a href='#' onclick=''>View</a>
                  <a href='editclientdetail.php?id=$id' onclick='openPopup()'>Edit</a>

                </div>
              </div>
            <div class='task-name' style='font-size:12px;'>$customer_name</div>
          </div>
          <div class='more-info'></div>
          <div class='task-members'>
            <i class='fa-solid fa-phone' style='display: inline; margin-right: 5px;font-size:14px;'></i>
            <div style='display: inline; margin: 0px;color:gray; font-size:15px'> $number</div>
          </div>
        </div>";
        $count++;
                          }};?>

  
     
    
    </div>
  </div>




