


<?php 

  
  function departinfo($data){

    $id=$_GET['department_id'] ;
    echo"$id";
$db = mysqli_connect('localhost', 'root', 'root', 'gapp','3306');
  $sq2=mysqli_query($db, "SELECT inCharge, teams FROM department where department_id='$id'");
    $rows2=array();
    while ($posts = mysqli_fetch_assoc($sq2)) {
      $rows2[]=$posts;
    }
    echo "<p style='color:#027ad6;font:120px;text-align:center'>JSON Data</p> <br>";
    print json_encode($rows2);
    file_put_contents('teamlist.json', json_encode($rows2));
   echo '<table border="1" style="width:100%;">
        <tr>
        <th>Department</th>
            <th>Team</th>
            <th>Incharge</th>
        </tr>';
        if(count($rows2)>0){
      $sn=1;
      foreach($rows2 as $data1){ 
  echo "<tr>
          <td>".$id."</td>
          <td ><a class='btn' href=' team.php?Team_id=".$data1['teams']."'> ".$data1['teams']."</a></td>
         <td ><a class='btn' href=' user.php?user_id=".$data1['inCharge']."'>".$data1['inCharge']."</a></td>
          
          <td><a href='dedit.php?department_id=".$id."'>Edit</a></td>
   </tr>";
        $sn++;}}
        else{
           echo "<tr>
        <td colspan='7'>No Data Found</td>
       </tr>"; 
}
  echo "</table>";}

  // initialize variables
    function fetch_data(){
 $db = mysqli_connect('localhost', 'root', 'root', 'gapp','3306');
    $sq1=mysqli_query($db, "SELECT name, department_id FROM department");
    $rows1=array();
    while ($posts = mysqli_fetch_assoc($sq1)) {
      $rows1[]=$posts;
    }
    echo "<p style='color:#027ad6;font:120px;text-align:center'>JSON Data</p> <br>";
    print json_encode($rows1);

return $rows1;}



$fetchData= fetch_data();
show_data($fetchData);
function show_data($fetchData){
 echo '<table border="1"  style="width:100%;">
        <tr>
            <th>Name</th>

        </tr>';
        if(count($fetchData)>0){
      $sn=1;
      foreach($fetchData as $data){ 
  echo "<tr>
          
          <td><a class='btn' href=' indexs.php?department_id=".$data['department_id']."'>".$data['name']."</a></td>
         
          
          
   </tr>";
        $sn++;}}
        else{
           echo "<tr>
        <td colspan='7'>No Data Found</td>
       </tr>"; 
}
  echo "</table>";
  if($_GET['department_id']){
    departinfo($_GET['department_id']);
  }
}



?>