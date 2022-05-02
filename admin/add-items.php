<?php 
    require_once "include/header.php";
?>

<?php  
      $idErr= $SSNOErr =  $RNOErr  = $nameErr  = $emailErr =  $dobErr =  $RANKErr =  $genderErr  = $LOCATIONErr =  $salaryErr = "";
       $id= $SSNO=$RNO= $name = $email = $dob = $RANK = $gender = $LOCATION = $salary = "";

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

            if( empty($_REQUEST["IDEPTNAME"]) ){
                $idErr = "<p style='color:red'> * IDEPTNAME is required</p>";
            }else {
                $id = $_REQUEST["id"];
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
            }else{
                $email = $_REQUEST["email"];
            }




            if( !empty($id) && !empty($SSNO) && !empty($RNO) && !empty($name) && !empty($email) && !empty($dob) && !empty($RANK)&& !empty($gender) && !empty($pass) && !empty($LOCATION) && !empty($salary) ){

                // database connection
                require_once "../connection.php";

                $sql_select_query = "SELECT email FROM SOLDIERS WHERE email = '$email' ";
                $r = mysqli_query($conn , $sql_select_query);
                if(mysqli_num_rows($r) > 0 ){
        
                    while($rows = mysqli_fetch_assoc($r) ){

                        $id = $rows["id"];
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
                    $emailErr = "<p style='color:red'> * Email Already Register</p>";
                } else{

                    $sql_select_query = "SELECT email FROM SOLDIERS WHERE email = '$email' ";
                    $r = mysqli_query($conn , $sql_select_query);
    
                    if( mysqli_num_rows($r) > 0 ){
                        $emailErr = "<p style='color:red'> * Email Already Register</p>";
                    } else{
                       
                        $sql = "INSERT INTO  SOLDIERS( id ,SSNO , RNO , name , email , dob, gender ,RANK,LOCATION, salary ) VALUES(  '$SSNO' , '$RNO' , '$name' , '$email'  , '$dob' ,'$RANK' '$gender' ,'$LOCATION', '$salary' )  ";
                        $result = mysqli_query($conn , $sql);
                        if($result){
                            $id= $SSNO=$RNO= $name = $email = $dob = $RANK = $gender  = $LOCATION = $salary = "";

                        echo "<script>
                        $(document).ready( function(){
                            $('#showModal').modal('show');
                            $('#modalHead').hide();
                            $('#linkBtn').attr('href', 'manage-items.php');
                            $('#linkBtn').text('View Soldiers');
                            $('#addMsg').text('Soldiers Added Successfully!');
                            $('#closeBtn').text('Add More?');
                        })
                     </script>
                     ";
                    }
                    
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
                                    <h4 class="text-center">Add New Soldier Details</h4>
                                <form method="POST" action=" <?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                            
                                <div class="form-group">
                                    <label >id :</label>
                                    <input type="text" class="form-control" value="<?php echo $id; ?>"  name="id" >
                                    <?php echo $idErr; ?>
                                </div>

                                <div class="form-group">
                                    <label >SSNO :</label>
                                    <input type="text" class="form-control" value="<?php echo $SSNO; ?>"  name="SSNO" >
                                    <?php echo $SSNOErr; ?>
                                </div>

                                <div class="form-group">
                                    <label >RNO :</label>
                                    <input type="text" class="form-control" value="<?php echo $RNO; ?>"  name="RNO" >
                                    <?php echo $RNOErr; ?>
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
