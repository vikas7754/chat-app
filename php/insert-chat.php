<?php 
    session_start();
    date_default_timezone_set('Asia/Kolkata');
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $outgoing_id = $_SESSION['unique_id'];
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);
        if(!empty($message)){
            $date = date("h:i:s");
            $sql = mysqli_query($conn, "INSERT INTO `messages`(`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`, `date`)
                                        VALUES (NULL,{$incoming_id}, {$outgoing_id}, '{$message}','$date')") or die();
        }
    }else{
        header("location: ../login.php");
    }
    
?>