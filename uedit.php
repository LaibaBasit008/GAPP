<?php 
 $db = mysqli_connect('localhost', 'root', 'root', 'gapp','3306');
    $id = $_GET['user_id'];

    $record = mysqli_query($db, "SELECT * FROM user WHERE user_id=$id");

  
      $n = mysqli_fetch_array($record);
      $name = $n['name'];
     
    
  ?>
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
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="ajax-script.js"></script><script type="text/javascript">
    $(document).on('click','#showData',function(e){
      $.ajax({    
        type: "GET",
        url: "indexs.php",             
        dataType: "html",                  
        success: function(data){                    
            $("#table-container").html(data); 
           
        }
    });
});
</script>
</head>
<body>

<h1>Edit User</h1>
<div>
  <form action=""  method="post">
    <label for="fname">User</label>

    <label for="lname">Name</label>
    <input type="text" id="lname" name="name" value="<?php echo $name;?>">

  
    <input type="submit" name="upd" >
  </form>
</div>

</body>
</html><?php
if (isset($_POST['upd'])) {
  $db = mysqli_connect('localhost', 'root', 'root', 'gapp','3306');
  $id = $_GET['user_id'];
  $name = $_POST['name'];

   $n="UPDATE user SET name='$name' WHERE user_id='$id'";
   mysqli_query($db,$n);
echo "<p style='color:#027ad6;font:120px;text-align:center'>Data Updated</p> <br>";
  $data = file_get_contents('userinfo.json');


// decode json to array
$json_arr = json_decode($data, true);

foreach ($json_arr as $key => $value) {
    if ($value["user_id"] == $id) {
        $json_arr[$key]['name'] =$name;

    }}

echo "<p style='color:#027ad6;font:120px;text-align:center'>JSON Data</p> <br>";
// encode array to json and save to file
file_put_contents('userinfo.json', json_encode($json_arr));
print json_encode($json_arr);

echo"<a href='index.html'><button class='button button4' >Go to homepge</button></button></a>";
}?>