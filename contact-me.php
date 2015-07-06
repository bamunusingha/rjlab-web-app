<?php
	require_once 'phpcode/config.php';
	require("PHPMailer_5.2.0/class.phpmailer.php");
	include "header.php";
     
?>

 

        <div class="section" id="profile">
            <div class="container">
                <div class="row">
                <h1 class="headerfont text-center">PROFILE</h1>
                    <div class="col-md-4">
                        <img src="images/propic.jpg"
                        class="img-responsive img-thumbnail img-circle">
                    </div>
                    <div class="col-md-8">
                        
                        <h3 class="headerfont albDesc">BEST SOLUTION IS THE SIMPLEST IDEA!</h3>
                        <p class="albDesc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo
                            ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis
                            dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies
                            nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.
                            Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In
                            enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum
                            felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus
                            elementum semper nisinec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.
                            Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In
                            enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum
                            felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus
                            elementum semper nisi.</p>
                    </div>
                </div>
               
            </div>
        </div>


        <div class="section" id="">
            <div id="google_map"></div>
        </div>


        <div class="section" id="specialNeedForm">
            <div class="container">
                <div class="row">
                <h1 class="headerfont text-center">TELL WHAT YOU REALY NEED</h1><br/>
                   <div class="col-sm-8 col-sm-offset-2">
                

                <form id="defaultForm" method="post" class="form-horizontal albDesc" action="">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Full name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="fullName" placeholder="Full name" />
                        </div>
                        
                    </div>

                   

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Email address</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="email" placeholder="yourname@mail.com"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Contact Number</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="cnumber" placeholder="0111111111"/>
                        </div>
                    </div>
                    
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Message</label>
                        <div class="col-sm-8">
                            
                            <textarea class="form-control" name="message"></textarea>
                        </div>
                    </div>
                    

                    <div class="form-group">
                        <label class="col-sm-3 control-label" id="captchaOperation"></label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="captcha" />
                        </div>
                    </div>

                    
                    


                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3">
                            <button type="submit" class="btn btn-default" name="signup" value="Sign up">Submit</button>
                        </div>
                    </div>
                </form>
                
                
                <?php
                	  if (($_SERVER['REQUEST_METHOD'] == 'POST')){
            			if((!empty($_POST['email']))&&(!empty($_POST['message']))&&(!empty($_POST['fullName']))){
            				//send the email
            					$mail = new PHPMailer();
 
								$mail->IsSMTP();                                      // set mailer to use SMTP
								$mail->Host = "smtp.youngcrew.lk";  // specify main and backup server
								$mail->SMTPAuth = true;     // turn on SMTP authentication
								$mail->Username = "admin@youngcrew.lk";  // SMTP username
								$mail->Password = "Kasun0714309008"; // SMTP password
								
								$mail->From = "admin@youngcrew.lk";
								$mail->FromName = "Vishgraphy form submition";
								
								$mail->AddAddress("vishgraphy@gmail.com");                  // name is optional
								
								
								$mail->WordWrap = 50;                                 // set word wrap to 50 characters
								
								$mail->IsHTML(true);                                  // set email format to HTML
								
								$mail->Subject = "Forem Submition";
								$mail->Body    = '
									<table class="table table-striped">
										<tr><th>Full name</th><td>'.$_POST['fullName'].'</td></tr>
										<tr><th>Email address</th><td>'.$_POST['email'].'</td></tr>
										<tr><th>Contact Number</th><td>'.$_POST['cnumber'].'</td></tr>
										<tr><th>Message</th><td>'.$_POST['message'].'</td></tr>										
									</table>
								';
								
								
								if(!$mail->Send())
								{
								   echo "<span class='text-danger '>Message could not be sent. <p>";
								   echo "Mailer Error: " . $mail->ErrorInfo.'</p><br/>Contact vishgraphy </span>';
								   exit;
								}
								
								echo '<span class="text-success ">Message has been sent.You will be inform further instruction within 24hours.Thank you!<span>';
            			}   
					  
					  }         
                ?>
                
                
                
            </div>
               
            </div>
        </div>

		


<script type="text/javascript">
$(document).ready(function() {
    // Generate a simple captcha
    function randomNumber(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
    };
    $('#captchaOperation').html([randomNumber(1, 100), '+', randomNumber(1, 200), '='].join(' '));

    $('#defaultForm').formValidation({
        message: 'This value is not valid',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            fullName: {
                row: '.col-sm-8',
                validators: {
                    notEmpty: {
                        message: 'The Full name is required'
                    }
                }
            },
            
            
            email: {
                validators: {
                    notEmpty: {
                        message: 'The email address is required'
                    },
                    emailAddress: {
                        message: 'The input is not a valid email address'
                    }
                }
            },
            
           cnumber: {
                validators: {
                    
                    stringLength: {
                        max: 10,
                        min: 10,
                        message: 'Telephone number must contain 10 digits'
                    }
                }
            },
            
           message: {
                validators: {
                    notEmpty: {
                        message: 'The message is required'
                    },
                    stringLength: {
                        max: 300,
                        message: 'The message must be less than 300 characters'
                    }
                }
            },

            captcha: {
                validators: {
                    callback: {
                        message: 'Wrong answer',
                        callback: function(value, validator, $field) {
                            var items = $('#captchaOperation').html().split(' '), sum = parseInt(items[0]) + parseInt(items[2]);
                            return value == sum;
                        }
                    }
                }
            }
        }
    });
});
</script>
<?php
	include "footer.php";
?>