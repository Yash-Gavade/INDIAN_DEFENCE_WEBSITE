<?php 
    require_once "include/header.php";
?>


<?php 
    require_once "include/header.php";
?>

<?php 
 
//  database connection
require_once "../connection.php";

$sql = "SELECT * FROM DEPARTMENT";
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
    <div class='text-center pb-2'><h4>Manage Department</h4></div>
    <table style="width:100%" class="table-hover text-center ">
    <tr class="bg-dark">
        <th>Sl.no</th>
        <th>Employee Id</th>
        <th>DRNO</th>
        <th>DNAME</th> 
        <th>DNO</th>
        <th>DLOCATION</th>

    <?php 
    
    if( mysqli_num_rows($result) > 0){
        while( $rows = mysqli_fetch_assoc($result) ){
            $id = $rows["id"];
            $DRNO= $rows["DRNO"];
            $DNAME= $rows["DNAME"];
            $DNO = $rows["DNO"];
            $DLOCATION = $rows["DLOCATION"];


            if($DRNO == "" ){
                $DRNO = "Not Defined";
            } 

            if($DNO == "" ){
                $DNO = "Not Defined";
            } 

            if($DLOCATION == "" ){
                $DLOCATION = "Not Defined";
            }   
 
            ?>
        <tr>
        <td><?php echo "{$i}."; ?></td>
        <td><?php echo $id; ?></td>
        <td> <?php echo $DRNO ; ?></td>
        <td><?php echo $DNAME; ?></td>
        <td> <?php echo $DNO ; ?></td>
        <td><?php echo $DLOCATION; ?></td>

    <?php 
            $i++;
            }
        }else{
            echo "<script>
            $(document).ready( function(){
                $('#showModal').modal('show');
                $('#linkBtn').attr('href', 'add-department.php');
                $('#linkBtn').text('Add department');
                $('#addMsg').text('No department Found!');
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