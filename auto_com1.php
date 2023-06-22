<?php
include_once("db.php");
$name=$_SESSION['name'];
$username=$_SESSION['uname'];
$email=$_SESSION['email'];  

$sql="SELECT * FROM `community_db` ORDER BY `id` ASC";
$result=$con->query($sql);
$n=1;
while($row=$result->fetch_assoc())
{
       if($row['status']=='1')
       {//already admin
               if($row['sender']==$name)//you send this message
               echo"
               <li class='self'>
               <div class='msg'>
                   <div class='user'>".$name."<span class='range admin'>Admin</span></div>
                   <p>".$row['chatt']."</p>
                   <time>".$row['date']."</time>
               </div>
               </li>";
               else
               echo"            
               <li class='other'>
               <div class='msg'>
                   <div class='user'>".$row['sender']."<span class='range admin'>Admin</span></div>
                   <p>".$row['chatt']."</p>
                   <time>".$row['date']."</time>
               </div>
               </li>";
       }
       else
       {
       echo"
           <li class='other'>
           <div class='msg'>
               <div class='user'>".$row['sender']."</div>
               <p>".$row['chatt']."</p>
               <time>".$row['date']."</time>
           </div>
           </li>";
       }
}
?>