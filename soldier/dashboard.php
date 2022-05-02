<?php 
require_once "include/header.php";
?>
<?php

        // database connection
        require_once "../connection.php";

         
        $i = 1;
        
        // applied leaves--------------------------------------------------------------------------------------------
        $total_accepted = $total_pending = $total_canceled = $total_applied = 0;
        $leave = "SELECT * FROM Sol_leave WHERE email = '$_SESSION[email_emp]' ";
        $result = mysqli_query($conn , $leave);

        if( mysqli_num_rows($result) > 0 ){

            $total_applied = mysqli_num_rows($result);

            while( $leave_info = mysqli_fetch_assoc($result) ){
                $status = $leave_info["status"];

                if( $status == "pending" ){
                    $total_pending += 1;
                }elseif( $status == "Accepted" ){
                    $total_accepted += 1;
                }elseif( $status = "Canceled"){
                    $total_canceled += 1;
                }
            }
        }else{
            $total_accepted = $total_pending = $total_canceled = $total_applied = 0;
        }



        // leave status--------------------------------------------------------------------------------------------------------------
        $currentDay = date( 'Y-m-d', strtotime("today") );

        $last_leave_status = "No leave appliyed";
        $upcoming_leave_status = "";

        // for last leave status
        $check_leave = "SELECT * FROM Sol_leave WHERE email = '$_SESSION[email_emp]' ";
        $s = mysqli_query($conn , $check_leave);
        if( mysqli_num_rows($s) > 0 ){
            while( $info = mysqli_fetch_assoc($s) ){
               $last_leave_status =  $info["status"] ;
            }
    }


    // for next leave date
    $check_ = "SELECT * FROM Sol_leave WHERE email = '$_SESSION[email_emp]' ORDER BY start_date ASC ";
    $e = mysqli_query($conn , $check_); 
    if( mysqli_num_rows($e) > 0 ){
        while( $info = mysqli_fetch_assoc($e) ){
            $date = $info["start_date"] ;
            $last_leave =  $info["status"] ;
           if ( $date > $currentDay && $last_leave == "Accepted" ){
               $upcoming_leave_status = date('jS F', strtotime($date) ) ;
               break;
           }
        }
}

        $select_emp = "SELECT * FROM SOLDIERS";
        $total_emp = mysqli_query($conn , $select_emp);

  
        $select_Dep = "SELECT * FROM DEPARTMENT";
        $total_Dep = mysqli_query($conn , $select_Dep);
 
        $select_Res = "SELECT * FROM RESOURCES";
        $total_Res = mysqli_query($conn , $select_Res);
 
        $select_wep = "SELECT * FROM WEAPONS";
        $total_wep = mysqli_query($conn , $select_wep);
 
        $select_item = "SELECT * FROM ITEMS";
        $total_item = mysqli_query($conn , $select_item);
 
        $select_dep = "SELECT * FROM DEPENDANT";
        $total_dep = mysqli_query($conn , $select_dep);     

        $sql_highest_salary =  "SELECT * FROM SOLDIERS ORDER BY salary DESC";
        $emp_ = mysqli_query($conn , $sql_highest_salary);



?>

<div class="container">

    <div class="row mt-5">
        <div class="col-4">
            <div class="card shadow " style="width: 18rem;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-center"> <b>Leave Status</b> </li>
                    <li class="list-group-item">Upcoming Leave on :  <?php echo  $upcoming_leave_status ; ?>  </li>
                    <li class="list-group-item">Last Leave's Status :  <?php echo ucwords($last_leave_status) ;  ?> </li>
                </ul>
            </div>
        </div>
        <div class="col-4">
            <div class="card shadow " style="width: 18rem;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-center"> <b>Applied leaves</b> </li>
                    <li class="list-group-item">Total Accepted  : <?php echo $total_accepted;  ?> </li>
                    <li class="list-group-item">Total Canceled  : <?php echo $total_canceled; ?> </li>
                    <li class="list-group-item">Total Pending  : <?php echo $total_pending; ?> </li>
                    <li class="list-group-item">Total Applied  : <?php echo $total_applied; ?> </li>
                </ul>
            </div>
        </div>
        <div class="col-4">
            <div class="card shadow " style="width: 18rem;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-center"> <b>Soldiers</b>  </li>
                    <li class="list-group-item">Total Soldiers : <?php echo mysqli_num_rows($total_emp); ?></li>
                    <li class="list-group-item text-center"><a href="view-soldier.php"> <b>View All Soldiers</b></a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row mt-5 bg-white shadow "> 
    <div class="col-12">
            <div class=" text-center my-3 "> <h4>Soldiers Leadership Board</h4> </div>
            <table class="table  table-hover">
            <thead>
            <tr class="bg-dark">
            <th scope="col">SSNO</th>
            <th scope="col">RNO</th>
            <th scope="col">name</th>
            <th scope="col">email</th>
            <th scope="col">dob</th>
            <th scope="col">RANK</th>
            <th scope="col">gender</th>
            <th scope="col">password</th>
            <th scope="col">LOCATION</th>

            </tr>
        </thead>
        <tbody>

        <?php while( $emp_info = mysqli_fetch_assoc($emp_) ){
                    $emp_SSNO = $emp_info["SSNO"];
                    $emp_RNO = $emp_info["RNO"];
                    $emp_Name = $emp_info["name"];
                    $emp_email = $emp_info["email"];
                    $emp_dob = $emp_info["dob"];
                    $emp_RANK = $emp_info["RANK"];
                    $emp_gender = $emp_info["gender"];
                    $emp_password = $emp_info["password"];
                    $emp_LOCATION = $emp_info["LOCATION"];     

                    ?>
            <tr>

            <th ><?php echo $emp_SSNO; ?></th>
            <td><?php echo $emp_RNO; ?></td>
            <td><?php echo $emp_Name; ?></td>
            <td><?php echo $emp_email ?></td>
            <td><?php echo $emp_dob ?></td>
            <td><?php echo $emp_RANK; ?></td>
            <td><?php echo $emp_gender ?></td>
            <td><?php echo $emp_password ?></td>
            <td><?php echo $emp_LOCATION; ?></td>

            </tr>

          <?php  
          $i++; 
                } 
            ?>
        </tbody>
        </table>
    </div>
    </div>
</div>

<?php 
require_once "include/footer.php";
?>