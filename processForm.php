<?php
 	$postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    
    @$name = $request->name;
    @$number = $request->number;
    @$email = $request->email;
	@$bookingDate = $request->bookingDate;
	@$pax = $request->pax;
    @$message = $request->message;
    file_put_contents('php://stderr', print_r($email, TRUE));
    
    $header = "From:info@crescentlawn.in \r\n";
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-type: text/html\r\n";
    
    if ( $name != '' && $email != '' && $number != '' && $message != '' ) {
    	$mailTo = 'info@crescentlawn.in';
        $subject = 'New Inquiry from ' . $name ;
        $body = 'From: ' . $name . "\n<br/>";
        $body .= 'Contact Number: ' . $number . "\n<br/>";
        $body .= 'Email: ' . $email . "\n<br/>";
		$body .= 'Booking Date: ' . $bookingDate . "\n<br/>";
		$body .= 'PAX: ' . $pax . "\n<br/>";
        $body .= "Message:\n" . $message . "\n\n";

        ini_set('SMTP','sg3plcpnl0230.prod.sin3.secureserver.net');
		#Please specify an SMTP Number 25 and 8889 are valid SMTP Ports.
		ini_set('smtp_port','465');
		#Please specify the return address to use
		ini_set('sendmail_from', 'info@crescentlawn.in');
        
        $success = mail( $mailTo, $subject, $body , $header);
        if ( $success ) {
           $result = 'Thank You for contacting us ! Have a nice day !';
        }else {
        	$result = 'Error occurs please try after sometimes';
        }
    }else{
    	$result = 'Please provide correct emailId!';
    }
    #file_put_contents('php://stderr', print_r($result, TRUE));
    echo $result;
?>