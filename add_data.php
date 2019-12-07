<?php
    include_once('db_connect.php');
    $query = "INSERT INTO data (";
    for($i=1;$i<=197;$i++){
        $query .= " Column_".$i;
        if($i!=197)
            $query .= ",";
    }
    $query .= ") VALUES(";
    
    for($i=1;$i<=197;$i++){
        $col = $_POST["column_".$i];
        $col = mysqli_real_escape_string($conn1,$col);
        if($col==''){
            $query .= "NULL";
        }    
        else{
            $query .= "'".$col."'";
        }    
        if($i!=197)
            $query .= ",";
    }
    $query .= ");";       
    //echo $query;
    $result = mysqli_query($conn1, $query);
    if (!empty($result)) {
        $type = "Success";
        $message = "Data Imported into the Database";
    } 
    else {
        $type = "Error";
        $message = "Problem in Uploading Data"; 
    }
    $output="
    <link rel='stylesheet' type='text/css' href='css/style.css'> 
    <link rel='stylesheet' type='text/css' href='css/theme.css'>
    <style>div {
        position:relative;
        height: 100%;
        width:100%;
        align:center;
    }
    
    div img {
        position:absolute;
        top:0;
        left:0;
        right:0;
        bottom:0;
        margin:auto;
    }
    .btn-submit {
        outline: none;
        font-size: 18px;
        font-weight: normal;
        padding: 5px 10px;
        border-radius:4px;
      }
      .btn-submit:hover,.btn-submit:focus {
        border-radius: 4px;
        border:none;
      }
    </style>";
    if($type=="Success")
        $output.='<div><img src="images/tick.png" width="200" height="200"><br/>';
    else
        $output.='<div><img src="images/cross.png" width="200" height="200"><br/>';    
    $output.= "<h2 align='center' style='padding-top:410;'>".$type." - ".$message."</h2>";
    $output .= "<h2 align='center'>Redirecting in 3 seconds</h2></div>";
    header("Refresh: 3; url= index.html");
    echo $output;
    mysqli_close($conn1);
?>