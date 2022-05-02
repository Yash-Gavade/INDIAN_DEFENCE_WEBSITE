<?php 
    require_once "include/header.php";
?>


<?php 
    require_once "include/header.php";
?>

<?php 
 
//  database connection
require_once "../connection.php";

$sql = "SELECT * FROM ITEMS";
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
    <div class='text-center pb-2'><h4>Manage Items</h4></div>
    <table style="width:100%" class="table-hover text-center ">
    <tr class="bg-dark">

        <th>Employee Id</th>
        <th>IDEPTNAME</th>
        <th>INAME</th>
        <th>IDNO</th>
        <th>ILOCATION</th> 
        <th>IRNUM</th>
        <th>IQUATY</th>

    </tr>
    <?php 
    
    if( mysqli_num_rows($result) > 0){
        while( $rows = mysqli_fetch_assoc($result) ){
            $id = $rows["id"];
            $IDEPTNAME= $rows["IDEPTNAME"];
            $INAME= $rows["INAME"];
            $IDNO= $rows["IDNO"];
            $ILOCATION= $rows["ILOCATION"];
            $IRNUM = $rows["IRNUM"];
            $IQUATY = $rows["IQUATY"];


            if($IDEPTNAME == "" ){
                $IDEPTNAME = "Not Defined";
            } 

            if($INAME == "" ){
                $INAME = "Not Defined";
            } 

            if($IDNO == "" ){
                $IDNO = "Not Defined";
            } 

            if($ILOCATION == "" ){
                $ILOCATION = "Not Defined";

            }

            if($IRNUM == "" ){
                $IRNUM = "Not Defined";
            } 
            if($IQUATY== "" ){
                $IQUATY= "Not Defined";
            }   
 
            ?>
        <tr>

        <td><?php echo $id; ?></td>
        <td> <?php echo $IDEPTNAME ; ?></td>
        <td><?php echo $INAME; ?></td>
        <td><?php echo $IDNO; ?></td>
        <td><?php echo $IRNUM; ?></td>
        <td> <?php echo $ILOCATION ; ?></td>
        <td><?php echo $IQUATY; ?></td>

              

    <?php 
            $i++;
            }
        }else{
            echo "<script>
            $(document).ready( function(){
                $('#showModal').modal('show');
                $('#linkBtn').attr('href', 'add-items.php');
                $('#linkBtn').text('Add items');
                $('#addMsg').text('No items Found!');
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
