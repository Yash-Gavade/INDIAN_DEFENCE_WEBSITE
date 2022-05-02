<?php 
    require_once "include/header.php";
?>

<?php 
    require_once "include/header.php";
?>
    
    <?php
    require_once "include/header.php";
?>


<?php  


         $id = $_GET["id"];
        require_once "../connection.php";

        $sql = "SELECT * FROM SOLDIERS WHERE id = $id ";
        $result = mysqli_query($conn , $sql);

        if(mysqli_num_rows($result) > 0 ){
        
            while($rows = mysqli_fetch_assoc($result) ){
                $SSNO = $rows["SSNO"];
                $RNO = $rows["RNO"];
                $name = $rows["name"];
                $email = $rows["email"];
                $dob = $rows["dob"];
                $RANK = $rows["RANK"];
                $gender = $rows["gender"];
                $LOCATION = $rows["LOCATION"];     
                $salary = $rows["salary"];

            }
        }
        $SSNOErr =  $RNOErr  = $nameErr  = $emailErr =  $dobErr =  $RANKErr =  $genderErr = $LOCATIONErr =  $salaryErr = "";

      

        if( $_SERVER["REQUEST_METHOD"] == "POST" ){

            if( empty($_REQUEST["gender"]) ){
                $gender ="";
            }else {
                $gender = $_REQUEST["gender"];
            }


            if( empty($_REQUEST["dob"]) ){
                $dob = "";
            }else {
                $dob = $_REQUEST["dob"];
            }

            
            if( empty($_REQUEST["SSNO"]) ){
                $SSNOErr = "<p style='color:red'> * SSNO is required</p>";
            }else {
                $SSNO = $_REQUEST["SSNO"];
            }

            if( empty($_REQUEST["RNO"]) ){
                $RNOErr = "<p style='color:red'> * RNO is required</p>";
            }else {
                $RNO = $_REQUEST["RNO"];
            }


            if( empty($_REQUEST["name"]) ){
                $nameErr = "<p style='color:red'> * Name is required</p>";
                $name = "";
            }else {
                $name = $_REQUEST["name"];
            }

            if( empty($_REQUEST["salary"]) ){
                $salaryErr = "<p style='color:red'> * Salary is required</p>";
                $salary = "";
            }else {
                $salary = $_REQUEST["salary"];
            }

            if( empty($_REQUEST["LOCATION"]) ){
                $LOCATIONErr = "<p style='color:red'> * LOCATION is required</p>";
            }else {
                $LOCATION = $_REQUEST["LOCATION"];
            }

            if( empty($_REQUEST["email"]) ){
                $emailErr = "<p style='color:red'> * Email is required</p> ";
                $email = "";
            }else{
                $email = $_REQUEST["email"];
            }




           if( !empty($SSNO) && !empty($RNO) && !empty($name) && !empty($email) && !empty($dob) && !empty($RANK)&& !empty($gender) && !empty($pass) && !empty($LOCATION) && !empty($salary) ){

                // database connection
                // require_once "../connection.php";

                $sql_select_query = "SELECT email FROM SOLDIERS WHERE email = '$email' ";
                $r = mysqli_query($conn , $sql_select_query);

                if( mysqli_num_rows($r) > 0 ){
                    $emailErr = "<p style='color:red'> * Email Already Register</p>";
                } else{
                   
                    $sql = "UPDATE SOLDIERS( SSNO , RNO , name , email , dob, gender ,RANK ,LOCATION, salary ) VALUES(  '$SSNO' , '$RNO' , '$name' , '$email'  , '$dob' ,'$RANK' '$gender' ,'$LOCATION', '$salary' )  ";
                    $result = mysqli_query($conn , $sql);
                    if($result){

                        echo "<script>
                        $(document).ready( function(){
                            $('#showModal').modal('show');
                            $('#modalHead').hide();
                            $('#linkBtn').attr('href', 'manage-soldier.php');
                            $('#linkBtn').text('View Soldiers');
                            $('#addMsg').text('Profile Edit Successfully!');
                            $('#closeBtn').text('Edit Again?');
                        })
                     </script>
                     ";
                    }
                    
                }

            }
        }

?>



<div style=""> 
<div class="login-form-bg h-100">
        <div class="container  h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-4 shadow">                       
                                    <h4 class="text-center">Edit Soldier's profile</h4>
                                <form method="POST" action=" <?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                            

                                <div class="form-group">
                                    <label >SSNO :</label>
                                    <input type="text" class="form-control" value="<?php echo $SSNO; ?>"  name="SSNO" >
                                  
                                </div>

                                <div class="form-group">
                                    <label >RNO :</label>
                                    <input type="text" class="form-control" value="<?php echo $RNO; ?>"  name="RNO" >
                                   
                                </div>
                            
                                <div class="form-group">
                                    <label >Name :</label>
                                    <input type="text" class="form-control" value="<?php echo $name; ?>"  name="name" >
                                   <?php echo $nameErr; ?>
                                </div>


                                <div class="form-group">
                                    <label >Email :</label>
                                    <input type="email" class="form-control" value="<?php echo $email; ?>"  name="email" >     
                                    <?php echo $emailErr; ?>
                                </div>

                                <div class="form-group">
                                    <label >Date-of-Birth :</label>
                                    <input type="date" class="form-control" value="<?php echo $dob; ?>" name="dob" >  
                                   
                                </div>


                                <div class="form-group">
                                    <label >RANK :</label>
                                    <input type="text" class="form-control" value="<?php echo $RANK; ?>"  name="RANK" >
                                  
                                </div>



                                <div class="form-group form-check form-check-inline">
                                    <label class="form-check-label" >Gender :</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" <?php if($gender == "Male" ){ echo "checked"; } ?>  value="Male"  selected>
                                    <label class="form-check-label" >Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" <?php if($gender == "Female" ){ echo "checked"; } ?>  value="Female">
                                    <label class="form-check-label" >Female</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" <?php if($gender == "Other" ){ echo "checked"; } ?>  value="Other">
                                    <label class="form-check-label" >Other</label>
                                </div>

                                <br> 
                                
                                <div class="form-group form-check form-check-inline">
                                    <label class="form-check-label" >LOCATION :</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="LOCATION" <?php if($LOCATION == "KASHMIR" ){ echo "checked"; } ?>  value="KASHMIR"  selected>
                                    <label class="form-check-label" >KASHMIR</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="LOCATION" <?php if($LOCATION == "DELHI" ){ echo "checked"; } ?>  value="DELHI">
                                    <label class="form-check-label" >DELHI</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="LOCATION" <?php if($LOCATION == "GOA" ){ echo "checked"; } ?>  value="GOA"  selected>
                                    <label class="form-check-label" >GOA</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="LOCATION" <?php if($LOCATION == "JAMMU" ){ echo "checked"; } ?>  value="JAMMU">
                                    <label class="form-check-label" >JAMMU</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="LOCATION" <?php if($LOCATION == "ORISSA" ){ echo "checked"; } ?>  value="ORISSA">
                                    <label class="form-check-label" >ORISSA</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="LOCATION" <?php if($LOCATION == "PUNE" ){ echo "checked"; } ?>  value="PUNE">
                                    <label class="form-check-label" >PUNE</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="LOCATION" <?php if($LOCATION == "Other" ){ echo "checked"; } ?>  value="Other">
                                    <label class="form-check-label" >Other</label>
                                </div>
                               
                                <br>

                                <button type="submit" class="btn btn-primary btn-block">Add</button>
                                  </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
    require_once "include/footer.php";
?>


