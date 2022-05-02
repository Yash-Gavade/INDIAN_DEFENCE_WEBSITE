<?php 
require_once "include/header.php";
?>
<?php

        // database connection
        require_once "../connection.php";

         $currentDay = date( 'Y-m-d', strtotime("today") );
         $tomarrow = date( 'Y-m-d', strtotime("+1 day") );

         $today_leave = 0;
         $tomarrow_leave = 0;
         $this_week = 0;
         $next_week = 0;
            $i = 1;
        // total admin
        $select_admins = "SELECT * FROM admin";
        $total_admins = mysqli_query($conn , $select_admins);

        // total employee
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
        
        // employee on leave
        $emp_leave  ="SELECT * FROM Sol_leave";
        $total_leaves = mysqli_query($conn , $emp_leave);

        if( mysqli_num_rows($total_leaves) > 0 ){
            while( $leave = mysqli_fetch_assoc($total_leaves) ){
                $leave = $leave["start_date"];

                //daywise
                if($currentDay == $leave){
                    $today_leave += 1;
                }elseif($tomarrow == $leave){
                   $tomarrow_leave += 1;
                }


            }
        }else {
            echo "no leave found";
        }


        // highest paid employee
        $sql_highest_salary =  "SELECT * FROM SOLDIERS ORDER BY salary DESC";
        $emp_ = mysqli_query($conn , $sql_highest_salary);



?>

<div class="container">

    <div class="row mt-5">
        <div class="col-4">
            <div class="card shadow " style="width: 18rem;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-center">Admins</li>
                    <li class="list-group-item">Total Admin : <?php echo mysqli_num_rows($total_admins); ?> </li>
                    <li class="list-group-item text-center"><a href="manage-admin.php"><b>View All Admins</b></a></li>
                </ul>
            </div>
        </div>

        <div class="col-4">
            <div class="card shadow " style="width: 18rem;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-center">Department</li>
                    <li class="list-group-item"> Department : <?php echo mysqli_num_rows($total_Dep); ?></li>
                    <li class="list-group-item text-center"><a href="manage-department.php"> <b>View All Departments</b></a></li>
                </ul>
            </div>
        </div>


        
        <div class="col-4">
            <div class="card shadow " style="width: 18rem;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-center">Resources</li>
                    <li class="list-group-item">Resources : <?php echo mysqli_num_rows($total_Res); ?></li>
                    <li class="list-group-item text-center"><a href="manage-resource.php"> <b>View All Resources</b></a></li>
                </ul>
            </div>
        </div>

        <div class="col-4">
            <div class="card shadow " style="width: 18rem;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-center">Items </li>
                    <li class="list-group-item">Items : <?php echo mysqli_num_rows($total_item); ?></li>
                    <li class="list-group-item text-center"><a href="manage-items.php"> <b>View All Items</b></a></li>
                </ul>
            </div>
        </div>


        <div class="col-4">
            <div class="card shadow " style="width: 18rem;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-center">Weapons</li>
                    <li class="list-group-item">Weapons : <?php echo mysqli_num_rows($total_wep); ?></li>
                    <li class="list-group-item text-center"><a href="manage-weapon.php"> <b>View All Weapons</b></a></li>
                </ul>
            </div>
        </div>


        <div class="col-4">
            <div class="card shadow " style="width: 18rem;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-center">Dependant</li>
                    <li class="list-group-item">Dependant : <?php echo mysqli_num_rows($total_dep); ?></li>
                    <li class="list-group-item text-center"><a href="manage-dependant.php"> <b>View All Dependants</b></a></li>
                </ul>
            </div>
        </div>



        <div class="col-4">
            <div class="card shadow " style="width: 18rem;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-center">Soldier</li>
                    <li class="list-group-item">Total Soldier : <?php echo mysqli_num_rows($total_emp); ?></li>
                    <li class="list-group-item text-center"><a href="manage-soldier.php"> <b>View All Soldier</b></a></li>
                </ul>
            </div>
        </div>
        <div class="col-4">
            <div class="card shadow " style="width: 18rem;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-center">Soldier on  Leave (Daywise)</li>
                    <li class="list-group-item">Today :  <?php echo $today_leave; ?>  </li>
                    <li class="list-group-item">Tomarrow :  <?php echo $tomarrow_leave; ?> </li>
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
            <th scope="col">salary</th>
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
                    $emp_salary = $emp_info["salary"];    
                   
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
            <td><?php echo $emp_salary; ?></td>
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