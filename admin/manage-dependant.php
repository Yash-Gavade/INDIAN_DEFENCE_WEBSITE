<?php 
    require_once "include/header.php";
?>


<?php 
    require_once "include/header.php";
?>

<?php 
 
//  database connection
require_once "../connection.php";

$sql = "SELECT * FROM DEPENDANT";
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
    <div class='text-center pb-2'><h4>Manage Dependant</h4></div>
    <table style="width:100%" class="table-hover text-center ">
    <tr class="bg-dark">

        <th>Employee Id</th>
        <th>DNAME</th>
        <th>DSSN</th>
        <th>DSNAME</th>
        <th>DEP_NUMBER</th> 
        <th>DEP_PHONE</th>
        <th>DEP_LOCATION</th>
        <th>DEP_DOB</th>
        <th>DEP_RELATION </th>

    </tr>
    <?php 
    
    if( mysqli_num_rows($result) > 0){
        while( $rows = mysqli_fetch_assoc($result) ){
            $id = $rows["id"];
            $DNAME= $rows["DNAME"];
            $DSSN= $rows["DSSN"];
            $DSNAME= $rows["DSNAME"];
            $DEP_NUMBER= $rows["DEP_NUMBER"];
            $DEP_PHONE = $rows["DEP_PHONE"];
            $DEP_LOCATION = $rows["DEP_LOCATION"];
            $DEP_DOB = $rows["DEP_DOB"];
            $DEP_RELATION = $rows["DEP_RELATION"];

            if($DNAME == "" ){
                $DNAME = "Not Defined";
            } 

            if($DSSN == "" ){
                $DSSN = "Not Defined";
            } 

            if($DEP_LOCATION == "" ){
                $DEP_LOCATION = "Not Defined";
            } 

            if($DEP_DOB == "" ){
                $DEP_DOB = "Not Defined";

            }

            if($DEP_RELATION== "" ){
                $DEP_RELATION= "Not Defined";
            }   
 
            ?>
        <tr>

        <td><?php echo $id; ?></td>
        <td> <?php echo $DNAME ; ?></td>
        <td> <?php echo $DSSN ; ?></td>
        <td> <?php echo $DSNAME ; ?></td>
        <td><?php echo $DEP_NUMBER; ?></td>
        <td> <?php echo $DEP_PHONE ; ?></td>
        <td><?php echo $DEP_LOCATION; ?></td>
        <td><?php echo $DEP_DOB; ?></td>
        <td><?php echo $DEP_RELATION; ?></td>
      

    <?php 
            $i++;
            }
        }else{
            echo "<script>
            $(document).ready( function(){
                $('#showModal').modal('show');
                $('#linkBtn').attr('href', 'add-dependant.php');
                $('#linkBtn').text('Add dependant');
                $('#addMsg').text('No dependant Found!');
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