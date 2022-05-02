<?php 
    require_once "include/header.php";
?>


<?php 
    require_once "include/header.php";
?>

<?php 
 
//  database connection
require_once "../connection.php";

$sql = "SELECT * FROM WEAPONS";
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
    <div class='text-center pb-2'><h4>Manage Weapons</h4></div>
    <table style="width:100%" class="table-hover text-center ">
    <tr class="bg-dark">

        <th>Employee Id</th>
        <th>WDEPTNAME</th>
        <th>WNAME</th> 
        <th>WRNO</th>
        <th>WNUMBER</th>
        <th>WLOCATION</th>
    </tr>
    <?php 
    
    if( mysqli_num_rows($result) > 0){
        while( $rows = mysqli_fetch_assoc($result) ){
            $id = $rows["id"];
            $WDEPTNAME= $rows["WDEPTNAME"];
            $WRNO= $rows["WRNO"];
            $WNAME= $rows["WNAME"];
            $WNUMBER = $rows["WNUMBER"];
            $WLOCATION = $rows["WLOCATION"];


            if($WDEPTNAME == "" ){
                $WDEPTNAME = "Not Defined";
            } 

            if($WRNO == "" ){
                $WRNO = "Not Defined";
            } 

            if($WNAME == "" ){
                $WNAME = "Not Defined";
            } 

            if($WLOCATION == "" ){
                $WLOCATION = "Not Defined";
            } 
            if($WNUMBER== "" ){
                $WNUMBER= "Not Defined";
            }   
 
            ?>
        <tr>
        <td><?php echo $id; ?></td>
        <td> <?php echo $WDEPTNAME ; ?></td>
        <td> <?php echo $WRNO ; ?></td>
        <td><?php echo $WNAME; ?></td>
        <td> <?php echo $WNUMBER ; ?></td>
        <td> <?php echo $WLOCATION ; ?></td>        

    <?php 
            $i++;
            }
        }else{
            echo "<script>
            $(document).ready( function(){
                $('#showModal').modal('show');
                $('#linkBtn').attr('href', 'add-weapon.php');
                $('#linkBtn').text('Add weapon');
                $('#addMsg').text('No weapon Found!');
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