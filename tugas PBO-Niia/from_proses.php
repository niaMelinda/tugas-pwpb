<?php
 session_start();

    $username = $_POST['username'];
    $password = $_POST['password'];
    


 $koneksi = new PDO('mysql:host=localhost;dbname=sekolah_md','root','');

 $query = $koneksi->query("select * from user where username='$username' AND password='$password'");
 $data = $query->fetch();
 if($query->rowCount() > 0){
      if($data['role']=="admin"){
      $_SESSION['username'] = $username;
      header("Location:index.php");
   }
   else if($data['role']=="user"){
      $_SESSION['username'] = $username;
      header("Location:userindex.php");
  }
}else{
  header("Location:form.php");
}