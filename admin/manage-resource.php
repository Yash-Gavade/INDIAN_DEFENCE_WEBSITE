<?php 
    require_once "include/header.php";
?>


<?php 
    require_once "include/header.php";
?>

<?php 
 
//  database connection
require_once "../connection.php";

$sql = "SELECT * FROM RESOURCES";
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
    <div class='text-center pb-2'><h4>Manage resources</h4></div>
    <table style="width:100%" class="table-hover text-center ">
    <tr class="bg-dark">
       <th>Sl.no</th>
        <th>Employee Id</th>
        <th>RNAME</th>
        <th>RRNO</th>
        <th>RDEP</th>
        <th>RLOCATION</th> 

    </tr>
    <?php 
    
    if( mysqli_num_rows($result) > 0){
        while( $rows = mysqli_fetch_assoc($result) ){
            $id = $rows["id"];
            $RNAME= $rows["RNAME"];
            $RRNO= $rows["RRNO"];
            $RDEP= $rows["RDEP"];
            $RLOCATION= $rows["RLOCATION"];

            if($RNAME == "" ){
                $RNAME = "Not Defined";
            } 

            if($RRNO == "" ){
                $RRNO = "Not Defined";
            } 


            if($RLOCATION == "" ){
                $RLOCATION = "Not Defined";
            
            } 
            
            if($RDEP== "" ){
                $RDEP= "Not Defined";
            }   
 
            ?>
        <tr>
        <td><?php echo "{$i}."; ?></td>
        <td><?php echo $id; ?></td>
        <td> <?php echo $RRNO ; ?></td>
        <td> <?php echo $RNAME ; ?></td>
        <td> <?php echo $RLOCATION ; ?></td>
        <td><?php echo $RDEP; ?></td>
              

    <?php 
            $i++;
            }
        }else{
            echo "<script>
            $(document).ready( function(){
                $('#showModal').modal('show');
                $('#linkBtn').attr('href', 'add-resources.php');
                $('#linkBtn').text('Add resources');
                $('#addMsg').text('No resources Found!');
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

