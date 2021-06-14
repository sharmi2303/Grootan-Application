<?php
if (isset($_POST['submit'])) {
    if (isset($_POST['firstname']) && isset($_POST['lastname']) &&
        isset($_POST['email']) && isset($_POST['sex']) && isset($_POST['DOBmonth']) &&
        isset($_POST['DOBday']) && isset($_POST['DOByear']) && isset($_POST['streetnumber']) && isset($_POST['city'])
        && isset($_POST['state']) && isset($_POST['pincode'])) {
        
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $sex = $_POST['sex'];
        $DOBmonth = $_POST['DOBmonth'];
        $DOBday = $_POST['DOBday'];
        $DOByear = $_POST['DOByear'];
        $streetnumber=$_POST['streetnumber'];
        $city=$_POST['city'];
        $state=$_POST['state'];
        $pincode=$_POST['pincode'];


        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "grootan";
        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);
        if ($conn->connect_error) {
            die('Could not connect to the database.');
        }
        else {
            $Select = "SELECT email FROM register WHERE email = ? LIMIT 1";
            $Insert = "INSERT INTO register(firstname,lastname,email,sex,DOBmonth,DOBday,DOByear,streetnumber,city,state,pincode)
             values(?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = $conn->prepare($Select);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->bind_result($resultEmail);
            $stmt->store_result();
            $stmt->fetch();
            $rnum = $stmt->num_rows;
            if ($rnum == 0) {
                $stmt->close();
                $stmt = $conn->prepare($Insert);
                $stmt->bind_param("sssssiiissi",$firstname, $lastname, $email,$sex,$DOBmonth,$DOBday,$DOByear,$streetnumber,$city,$state,$pincode);
                if ($stmt->execute()) {
                    echo "New record inserted sucessfully.";
                }
                else {
                    echo $stmt->error;
                }
            }
            else {
                echo "Someone already registers using this email.";
            }
            $stmt->close();
            $conn->close();
        }
    }
    else {
        echo "All field are required.";
        die();
    }
}
else {
    echo "Submit button is not set";
}
?>