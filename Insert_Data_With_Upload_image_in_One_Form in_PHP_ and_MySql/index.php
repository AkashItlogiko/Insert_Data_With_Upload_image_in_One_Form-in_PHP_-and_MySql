<!-- 
https://youtu.be/5lOi8DMCNXg?si=y1c0S5XBOYERqqIU -->

<?php

 $connected = mysqli_connect('localhost','root','','phptestDB');

if(isset($_POST['submit'])){
 $firstname = $_POST['firstname'];
 $lastname = $_POST['lastname'];
 $email = $_POST['email'];

//super globel veribal $_FILES diya amra ay file ka recived korbo .

$imagename = $_FILES['image']['name'];
$tmpname = $_FILES['image']['tmp_name'];
$upload = 'images/'.$imagename;


$sql = "INSERT INTO student(firstname,lastname,email,image)
VALUES (' $firstname','$lastname','$email','$imagename')";

if(mysqli_query($connected,$sql) == TRUE){
  move_uploaded_file($tmpname,$upload);
 echo "Insert";

}else{
echo "Not Insert";
}

}

?>
<html>
<head>
  <style>
.img{width:50px;
height: auto;
}
  </style>
</head>
<body>

<form action="index.php" method="POST" enctype="multipart/form-data">

First Name :<br>
<input type="text" name="firstname"><br><br>
Last Name :<br>
<input type="text" name="lastname"><br><br>
Email:<br>
<input type="text" name="email"><br><br>
Picture :<br>
<input type="file" name="image"><br><br>
<input type="submit" name="submit" value="Insert">

</form>

<?php

$sql = "SELECT * FROM student ORDER BY id DESC LIMIT 3";
$data = mysqli_query( $connected,$sql);
echo "<table border=10> <tr></tr>";

while($row = mysqli_fetch_assoc($data )){

$firstname = $row['firstname'];
$lastname = $row['lastname'];
$email = $row['email'];
$image = $row['image'];


echo  "<tr><td>$firstname</td><td>$lastname</td><td>$email</td>";
echo "<td><img src='/Insert_Data_With_Upload_image_in_One_Form in_PHP_ and_MySql/images/$image'class='img'></td></tr>";

}
?>

</table>

</body>
</html>


