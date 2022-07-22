<?php
  
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "weather";

    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db);

    if(isset($_POST['log'])){
        $uname = $_POST['Uname'];
        $password = $_POST['Pass'];

        $sql = "SELECT * FROM login WHERE username = '$uname' AND password = '$password' ";
        $result = mysqli_query($conn,$sql);
        if(isset($result)){
            echo "working";
            if(mysqli_num_rows($result)>0){
                $row = mysqli_fetch_array($result);
            }
            else{
                echo "Technical issue";
            }
        }
        else{
            echo "not working";

        }

        if($row['username'] == $uname && $row['password'] == $password){
            echo "<script>window.location='index.html'</script>";
        }
        else{
            echo "<script>alert('Check your credentials')</script>";
            echo "<script>location.replace('main.html') </script>";
        }
    }
    if(isset($_POST['lo'])){
      $emailid = $_POST['Uname'];
      $password = $_POST['Pass'];
      $repassword= $_POST['rePass'];
      if($password==$repassword){
        $sq="INSERT INTO login(username,password) values ('$emailid','$password')";
        $res=mysqli_query($conn,$sq);
        if(isset($res)){

          echo "<script> alert ('Account ccreated Successfully'); window.location='  main.html'; </script> ";
        }
        else{
          echo "<script> alert ('Not created contact admin'); </script> ";
        }
      }
      else {
        echo " <script> alert ('Re-password is wrong'); </script>";
      }

    }
?>