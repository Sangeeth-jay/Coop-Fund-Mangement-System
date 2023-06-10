<?php
    require('connection.php');

    $acid=$_REQUEST['acid'];

    $sql="select * from coopfund.society where AC_office_idAC_office='$acid';";
    $result=mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
            echo'
            
            <center><table border="1" width="90%" style="margin-left: 15px;">
                    <tr>
                        <td width="15%">'.$row['Society_ID'].'</td>
                        <td width="85%">'.$row['Society_name'].'</td>
                    </tr>
            </table> </center>';

        }
    }

?>