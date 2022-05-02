<?php 
    require_once "include/header.php";
?>


<?php 
    require_once "include/header.php";
?>

<?php 
 
//  database connection
require_once "../connection.php";

$sql = "SELECT * FROM SOLDIERS";
$result = mysqli_query($conn , $sql);

$i = 1;
$you = "";


?>

<style>
table, th, td {
  border: 1px solid black;
  padding: 15px;
}
table {
  border-spacing: 10px;
}
</style>

<div class="container bg-white shadow">
    <div class="py-4 mt-5"> 
    <div class='text-center pb-2'><h4>Manage Soldiers</h4></div>
    <table style="width:100%" class="table-hover text-center ">
    <tr class="bg-dark">

        <th> Id</th>
        <th>SSNO</th>
        <th>RNO</th>
        <th>Name</th>
        <th>Email</th>
        <th>Date of Birth</th> 
        <th>RANK</th>
        <th>Gender</th>
        <th>LOCATION</th>
        <th>Salary </th>
        <th>Action</th>
    </tr>
    <?php 
    
    if( mysqli_num_rows($result) > 0){
        while( $rows = mysqli_fetch_assoc($result) ){
            $id = $rows["id"];
            $SSNO= $rows["SSNO"];
            $RNO= $rows["RNO"];
            $name= $rows["name"];
            $email= $rows["email"];
            $dob = $rows["dob"];
            $RANK = $rows["RANK"];
            $gender = $rows["gender"];
            $LOCATION = $rows["LOCATION"];
            $salary = $rows["salary"];

            if($SSNO == "" ){
                $SSNO = "Not Defined";
            } 

            if($RNO == "" ){
                $RNO = "Not Defined";
            } 

            if($gender == "" ){
                $gender = "Not Defined";
            } 

            if($dob == "" ){
                $dob = "Not Defined";

            }

            if($LOCATION == "" ){
                $LOCATION = "Not Defined";
            } 
            if($salary== "" ){
                $salary= "Not Defined";
            }   
 
            ?>
        <tr>
        <td><?php echo $id; ?></td>
        <td> <?php echo $SSNO ; ?></td>
        <td> <?php echo $RNO ; ?></td>
        <td> <?php echo $name ; ?></td>
        <td><?php echo $email; ?></td>
        <td><?php echo $dob; ?></td>
        <td> <?php echo $RANK ; ?></td>
        <td><?php echo $gender; ?></td>
        <td> <?php echo $LOCATION ; ?></td>
        <td><?php echo $salary; ?></td>

        <td>  <?php 
                $edit_icon = "<a href='edit-soldier.php?id= {$id}' class='btn-sm btn-primary float-right ml-3 '> <span ><i class='fa fa-edit '></i></span> </a>";
                $delete_icon = " <a href='delete-soldier.php?id={$id}' id='bin' class='btn-sm btn-primary float-right'> <span ><i class='fa fa-trash '></i></span> </a>";
                echo $edit_icon . $delete_icon;
             ?> 
        </td>

      
    <?php 
            $i++;
            }
        }else{
            echo "<script>
            $(document).ready( function(){
                $('#showModal').modal('show');
                $('#linkBtn').attr('href', 'add-soldier.php');
                $('#linkBtn').text('Add Soldier');
                $('#addMsg').text('No Soldier Found!');
                $('#closeBtn').text('Remind Me Later!');
            })
         </script>
         ";
        }
    ?>
     </tr>
    </table>
    </div>
</div>

<?php 
    require_once "include/footer.php";
?>

<?php 
    require_once "include/footer.php";
?>