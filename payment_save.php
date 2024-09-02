<?php 
session_start();
include('includes/dbcon.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'php_mail/autoload.php';
	$id = $_SESSION['id'];
	$mode = $_POST['mode'];

		$run=mysqli_query($con,"UPDATE reservation SET modeofpayment='$mode',r_status='pending' where rid='$id'")or die(mysqli_error($con)); 
    if($run){
      $query = mysqli_query($con, "SELECT * FROM reservation natural join combo WHERE rid='$id'");
      $row=mysqli_fetch_array($query);
        $rcode=$row['r_code'];
        $first=$row['r_first'];
        $last=$row['r_last'];
        $contact=$row['r_contact'];
        $address=$row['r_address'];
        $email=$row['r_email'];
        $date=$row['r_date'];
        $venue=$row['r_venue'];
        $balance=$row['balance'];
        $payable=$row['payable'];
        $ocassion=$row['r_ocassion'];
        // $team=$row['team_name'];
        $status=$row['r_status'];
        $motif=$row['r_motif'];
        $time=$row['r_time'];
        $time=$row['r_time'];
        $type=$row['r_type'];
        $cid=$row['combo_id'];
        $combo=$row['combo_name'];
      $mail = new PHPMailer(TRUE);     
      $mail->setFrom('chethanp430@gmail.com', 'Unique Catering Service');
      $mail->addAddress($email);
      $mail->Subject = 'Catering Details';
     
      
      $message = '<html><body>';
      $message .= '<h4>Get Your Order Details!!!</h4>';
      $message .="<p>Reservation Code:".$rcode."</p><br />";
      $message .= "<p>Event Date:". $date."</p>";
      $message .= "<p>Event Time :". $time."</p>";
      $message .= "<p>Venue:". $venue."</p>";
      $message .= "<p>Motif:". $motif."</p>";
      $message .= "<p>Ocassion:". $ocassion."</p>";
      $message .= "<p>Total Payable:". $payable."</p>";
      $message .= "<p>Package:". $combo."</p>";
      
      $message .= "</body></html>";
      $mail->Body =  $message;
      $mail->SMTPOptions = array(
          'ssl'=>array(
          'verify_peer' =>false,
          'verify_peer_name' =>false,
          'allow_self_signed'=>true
  
          )
      );
      $mail->IsHTML(true); 
      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = TRUE;
      $mail->SMTPSecure = 'tls';
      $mail->Username = 'chethanp430@gmail.com';
      $mail->Password = 'oblviqxdswbffjcv';
      $mail->Port = 587;
      $mail->SMTPDebug = 0;
      if($mail->send()){
        echo "<script>
         	alert('Check Your Email Inbox for the details');		
        </script>";
              
      }
      else{
        echo "<script>
         alert('Failed to send email');	
     </script>";
       	
      }
  
     
      echo "<script>document.location='summary.php'</script>";   
	
  } 


  //   ini_set( 'display_errors', 1 );
    
  //   error_reporting( E_ALL );
    
  //   $from = "chethanp430@gmail.com";
    
  //   $to = $email;
    
  //   $subject = "Reservation Details";
    
  //   $message = "Dear $first $last. Below are your reservation details to Unique Catering<br>
  //   	Reservation Code: $rcode
  //   	Event Date: $date
  //   	Event Time: $time
  //   	Venue: $venue
  //   	Motif: $motif
  //   	Ocassion: $ocassion
  //   	Total Payable: $payable
  //   	Package: $combo
    	
  //   ";
    
  //   $headers = "From:" . $from;
    
  //   mail($to,$subject,$message, $headers);
    
  //   echo "<script>
	// 	alert('Check Your Email Inbox for the details');		
	// </script>";
			
	// 		echo "<script>document.location='summary.php'</script>";   
	
?>