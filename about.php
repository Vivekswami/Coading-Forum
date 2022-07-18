<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>iDiscuss - Coading Froum</title>
  </head>
  <body>
    <?php include 'partials/_header.php';?>

    <div class="form-container">
		<form name="frmContact" id="" frmContact"" method="post" action=""
			enctype="multipart/form-data" onsubmit="return validateContactForm()">

			<div class="input-row">
				<label style="padding-top: 20px;">Name</label> <span
					id="userName-info" class="info"></span><br /> <input type="text"
					class="input-field" name="userName" id="userName" />
			</div>
			<div class="input-row">
				<label>Email</label> <span id="userEmail-info" class="info"></span><br />
				<input type="text" class="input-field" name="userEmail"
					id="userEmail" />
			</div>
			<div class="input-row">
				<label>Subject</label> <span id="subject-info" class="info"></span><br />
				<input type="text" class="input-field" name="subject" id="subject" />
			</div>
			<div class="input-row">
				<label>Message</label> <span id="userMessage-info" class="info"></span><br />
				<textarea name="content" id="content" class="input-field" cols="60"
					rows="6"></textarea>
			</div>
			<div>
				<input type="submit" name="send" class="btn-submit" value="Send" />

				<div id="statusMessage"> 
                        <?php
                        if (! empty($message)) {
                            ?>
                            <p class='<?php echo $type; ?>Message'><?php echo $message; ?></p>
                        <?php
                        }
                        ?>
                    </div>
			</div>
		</form>
	</div>
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"
        type="text/javascript"></script>
    <script type="text/javascript">
        function validateContactForm() {
            var valid = true;

            $(".info").html("");
            $(".input-field").css('border', '#e0dfdf 1px solid');
            var userName = $("#userName").val();
            var userEmail = $("#userEmail").val();
            var subject = $("#subject").val();
            var content = $("#content").val();
            
            if (userName == "") {
                $("#userName-info").html("Required.");
                $("#userName").css('border', '#e66262 1px solid');
                valid = false;
            }
            if (userEmail == "") {
                $("#userEmail-info").html("Required.");
                $("#userEmail").css('border', '#e66262 1px solid');
                valid = false;
            }
            if (!userEmail.match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/))
            {
                $("#userEmail-info").html("Invalid Email Address.");
                $("#userEmail").css('border', '#e66262 1px solid');
                valid = false;
            }

            if (subject == "") {
                $("#subject-info").html("Required.");
                $("#subject").css('border', '#e66262 1px solid');
                valid = false;
            }
            if (content == "") {
                $("#userMessage-info").html("Required.");
                $("#content").css('border', '#e66262 1px solid');
                valid = false;
            }
            return valid;
        }
</script>


    <?php
        if (! empty($_POST["send"])) {
            $name = $_POST["userName"];
            $email = $_POST["userEmail"];
            $subject = $_POST["subject"];
            $content = $_POST["content"];
            $conn = mysqli_connect("localhost", "root", "", "idiscuss") or die("Connection Error: " . mysqli_error($conn));
            $stmt = $conn->prepare("INSERT INTO `contact info` (`user_name`, `user_email`, `subject`, `content`) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss",$name, $email, $subject, $content);
            $stmt->execute();
            $message = "Your contact information is saved successfully.";
            $type = "success";
            $stmt->close();
            $conn->close();
            }
                require_once "about.php";
    ?>
    <!--Section: Contact v.2-->
    <section class="mb-4">

    <!--Section heading-->
    <h2 class="h1-responsive font-weight-bold text-center my-4">Contact us</h2>
    <!--Section description-->
    <p class="text-center w-responsive mx-auto mb-5">Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within
        a matter of hours to help you.</p>


    <p class="text-center">San Francisco, CA 94126, USA</p>
    <p class="text-center">+ 01 234 567 89</p>
    <p class="text-center">contact@iDiscuss.com</p>
            
        
    </div>

    <?php include 'partials/_footer.php';?>



   

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>