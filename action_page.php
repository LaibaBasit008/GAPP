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
if(isset($_POST['d'])){
    



     $db = mysqli_connect('localhost', 'root', 'root', 'gapp','3306');
     $did=$_POST['did'];
     $name=$_POST['name'];
     $teams=$_POST['teams'];
     $inCharge=$_POST['inc'];
     $sq7="INSERT INTO department (department_id,name,teams,inCharge) VALUES ('$did','$name','$teams','$inCharge')";
    $result=mysqli_query($db,$sq7);
    if($result){
    $jsondata = file_get_contents('teamlist.json');
     $data_array = json_decode($jsondata, true);

    $data_array[]=array('department_id'=>$did, 'name'=>$name,'teams'=>$teams,'inCharge'=>$inCharge);
$a= json_encode($data_array);
   

file_put_contents('teamlist.json', $a);
echo "<p style='color:#027ad6;font:120px;text-align:center'>Data Inserted</p> <br>";
echo "<p style='color:#027ad6;font:120px;text-align:center'>JSON Data</p> <br>";
print json_encode($a);
    }
}

    if(isset($_POST['t'])){
    



     $db = mysqli_connect('localhost', 'root', 'root', 'gapp','3306');
     $did=$_POST['tid'];
     $name=$_POST['name'];
     $teams=$_POST['teams'];
     
     $sq7="INSERT INTO team (Team_id,people,teamLead) VALUES ('$did','$name','$teams')";
    mysqli_query($db,$sq7);
    $jsondata = file_get_contents('teaminfo.json');
     $data_array = json_decode($jsondata, true);

  $data_array[]=array('Team_id'=>$did, 'people'=>$name,'teamLead'=>$teams);
$a= json_encode($data_array);
   print json_encode($a);


file_put_contents('teaminfo.json', $a);
echo "<p style='color:#027ad6;font:120px;text-align:center'>Data Inserted</p> <br>";
echo "<p style='color:#027ad6;font:120px;text-align:center'>JSON Data</p> <br>";
print json_encode($data_array);
    }
    if(isset($_POST['u'])){
    



     $db = mysqli_connect('localhost', 'root', 'root', 'gapp','3306');
     $did=$_POST['uid'];
 $name=$_POST['name'];
     
     $sq7="INSERT INTO user (user_id,name) VALUES ('$did','$name')";
    mysqli_query($db,$sq7);
    $jsondata = file_get_contents('userinfo.json');
     $data_array = json_decode($jsondata, true);

 $data_array[]=array('user_id'=>$did, 'name'=>$name);
$a= json_encode($data_array);
   print json_encode($a);

file_put_contents('userinfo.json', $a);

echo "<p style='color:#027ad6;font:120px;text-align:center'>Data Inserted</p> <br>";
echo "<p style='color:#027ad6;font:120px;text-align:center'>JSON Data</p> <br>";
print json_encode($data_array);

    }
    echo"<a href='index.html'>
<button class='button button4' >Go to homepge</button></button></a>";?>