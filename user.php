<!DOCTYPE html>
<html>
<head>
<style>
    h1{
         display: inline-block;

  margin: 90px 550px;

    }
.button {
  background-color: #027ad6; /* Green */
  border: none;
  color: white;
  padding: 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 600px;
  cursor: pointer;
}


.button4 {border-radius: 12px;}
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #027ad6;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style></head></html>
<?php


    $id=$_GET['user_id'] ;
    echo"$id";
$db = mysqli_connect('localhost', 'root', 'root', 'gapp','3306');
  $sq2=mysqli_query($db, "SELECT name FROM user where user_id='$id'");
    $rows2=array();
    while ($posts = mysqli_fetch_assoc($sq2)) {
      $rows2[]=$posts;
    }
    echo "<p style='color:#027ad6;font:120px;text-align:center'>JSON Data</p> <br>";
    print json_encode($rows2);

   echo '<table border="1" style="width:100%;">
        <tr>
         <th>User id</th>
            <th>Name</th>
            
        </tr>';
        if(count($rows2)>0){
      $sn=1;
      foreach($rows2 as $data1){ 
  echo "<tr>
          <td > ".$id."</td> 
          
         <td >".$data1['name']."</td>
          
            <td><a href='uedit.php?user_id=".$id."'>Edit</a></td>
   </tr>";
        $sn++;}}
        else{
           echo "<tr>
        <td colspan='7'>No Data Found</td>
       </tr>"; 
}
  echo "</table>";echo"<a href='index.html'>
<button class='button button4' >Go to homepge</button></button></a>";?>