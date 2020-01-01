<!DOCTYPE html>
<html>
<head>
 <title>View user</title>
 <style>
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
#header 
{
    background-color: grey;
    padding: 25px;
    
}
     #ul1
{
list-style-type:none;
margin:0;
padding:0;
overflow:hidden;
background-color:mediumseagreen;
}
.li1
{ 
float:left;
padding: 25px 25px;
display:block;
color:white;
border-right:1px solid white;
}
.li1:hover
{
background-color:black;
}
 </style>
</head>
<body>
    <div id="header"><img src="img\logo_small.png" style="padding:5px; height:50%; background: linear-gradient(to top, rgba(254, 254, 254, 0.4), rgba(250, 250, 250, 0));;">
    <font color="orange" size="26">SPARKS CREDIT MANAGEMENT</font>
    </div>
    <div> 
        <ul id="ul1">
   <li class="li1"> <span><a href="Home.php" ><i class="icon-home icon-large"></i> Home</a></span>
                    </li>
                   <li class="li1">
                        <span><a href="tsfd.php"><i class=" icon-th-large icon-large"></i> View User</a></span>
                    </li>
<li class="li1">
                        <span><a href="TC.php"><i class="icon-shopping-cart icon-large"></i> Tranfer Credit</a></span>
                    </li>  
                    <li class="li1">
                        <span><a href="about.php"><i class="icon-info-sign icon-large"></i> About US</a></span>
                    </li>

                   <li class="li1">
                        <span><a href="contact.php"><i class="icon-phone-sign icon-large"></i> Contact US</a></span>
                    </li>
                   
  
        </ul></div>
 <div><table>
 <tr>
  <th>UserID</th> 
  <th>Name</th>
  <th>Email</th> 
  <th>Current Credit</th> 
 </tr>
 <?php
$conn = mysqli_connect("localhost", "id8990160_root", "mauu1998", "id8990160_tsf");
  // Check connection
  if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
  } 
  $sql = "SELECT * FROM USER";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
   // output data of each row
   while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["uid"]. "</td><td>" . $row["name"] . "</td><td>"
. $row["email"] . "</td><td>" . $row["cucd"] ."</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
    </div>
</body>
</html>