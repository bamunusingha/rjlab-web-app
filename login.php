<?php
	
        include_once 'phpcode/config.php';
        include_once 'phpcode/helperclasses/loginHelper.php';
        include_once 'phpcode/secureSession.php';

        sec_session_start();
        
        $user = R::dispense('user');
        $user=R::load('user',1);
        
        if (($_SERVER['REQUEST_METHOD'] == 'POST')){
            if((!empty($_POST['email']))&&(!empty($_POST['password']))){
                if(LoginHelper::login($user,$_POST['email'],$_POST['password'])){
                    //then save user to the session and redirect to admin page
                    $_SESSION['username']=$user->userName;
                    $_SESSION['userEmail']=$user->email;
                   
                    redirect('admin.php');
                    
                }
            }
        }
        include "header.php";
        
?>

 <div class="section" id="loginForm">
            <div class="container" >
                <div class="row">
                <div class="col-md-12">
                <h1 class="headerfont text-center">LOGIN HERE</h1>
                <form role="form" id="LoginForm" action="login.php" method="post" class="albDesc">
                            <div class="form-group">
                                <label class="control-label" for="exampleInputEmail1">Email address</label>
                                <input class="form-control" id="exampleInputEmail1"
                                placeholder="Enter email" type="email" name="email">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="exampleInputPassword1">Password</label>
                                <input class="form-control" id="exampleInputPassword1"
                                placeholder="Password" type="password" name="password">
                            </div>
                            <button type="submit" class="btn btn-default">Login</button>
                        </form>
                </div>
                </div>
              
            </div>
        </div>

<script type="text/javascript">
$(document).ready(function() {
    $('#LoginForm').formValidation({
        message: 'This value is not valid',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {           
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
           
           password: {
                validators: {
                    notEmpty: {
                        message: 'The password is required'
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