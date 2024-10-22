<?php

$conn = mysqli_connect("localhost", "root", "", "rx_axis");
         
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        }
         
        // Taking all 5 values from the form data(input)
        $patient_name =  $_REQUEST['Patient Name'];
        $email = $_REQUEST['email'];
        $password =  $_REQUEST['password'];
         
        // Performing insert query execution
        // here our table name is college
        $sql = "INSERT INTO Patients  VALUES ('$patient_name', 
            '$email','$password')";
         
        if(mysqli_query($conn, $sql)){
            echo "<script>alert('data stored in a database successfully.'); </script>" ;
            header("Location: login.html");
 
        } else{
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
                
                exit();
                
        }
         
        // Close connection
        mysqli_close($conn);
  ?>
     