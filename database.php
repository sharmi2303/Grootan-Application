<!DOCTYPE html>
<html>
<head>
<title>Table with database</title>
<style>
    body{
        background:url("images/bg4.png");
        background-repeat: no-repeat;
        background-size: 100%;
    }
table {
border-collapse: collapse;
width: 100%;
color: #588c7e;
font-family: monospace;
font-size: 25px;
text-align: left;
}
th {
background-color: #588c7e;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
</style>
</head>
<body>
<table>
<h1 style = "text-align:center";>OTHER GROOTANS</h1>
<div style="margin-left:30px;margin-right:30px;">
<tr>
<th>Id</th>
<th>First Name</th>
<th>Last Name</th>
<th>Email ID</th>
<th>Gender</th>
<th>City</th>
<th>State</th>
<th>Pin Code</th>
</tr>
</div> 
<?php
$conn = mysqli_connect("localhost", "root", "", "grootan");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT id,firstname,lastname,email,sex,city,state,pincode FROM register";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["id"]. "</td><td>" . $row["firstname"] . "</td><td>"
. $row["lastname"]. "</td> <td>" . $row["email"]. "</td> <td>" . $row["sex"]. "</td> <td>" 
. $row["city"]. "</td> <td>" . $row["state"]. "</td> <td>" . $row["pincode"]. "</td> </tr>" ;
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
</body>
</html>