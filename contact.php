<?php

	include_once('header.php');
// Define variables and set to empty values
$nameErr = $emailErr = $messageErr = $phoneErr="";
$name = $email = $message =$phone= "";
$result = '';
// Function to sanitize input data
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function insertIntoDatabase($name, $phone, $email, $message)
{
   require_once 'db.php';

    $name = $conn->real_escape_string($name);
    $phone = $conn->real_escape_string($phone);
    $email = $conn->real_escape_string($email);
    $message = $conn->real_escape_string($message);

    $sql = "INSERT INTO contact_submissions (name, phone, email, message) VALUES ('$name', '$phone', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        $result = 'We received your query. We will contact you shortly.';
    } else {
        $result = 'Error: ' . $sql . '<br>' . $conn->error;
    }

    $conn->close();
}
// Function to log form submissions
function logFormSubmission($data) {
  $logFile = 'contact_form.txt';
  $logEntry = date("Y-m-d H:i:s") . " - " . $data . "\n";
  file_put_contents($logFile, $logEntry, FILE_APPEND | LOCK_EX);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Validate name
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
  }
  if (empty($_POST["phone"])) {
    $phoneErr = "Phone Number is required";
  } else {
    $phone = test_input($_POST["phone"]);
  }

  // Validate email
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

  // Validate message
  if (empty($_POST["message"])) {
    $messageErr = "Message is required";
  } else {
    $message = test_input($_POST["message"]);
  }

  // If there are no validation errors, send email and log form submission
  if (empty($nameErr) && empty($emailErr) && empty($messageErr) && empty($phoneErr)) {
    // Send email (you need to configure the mail settings)
    $to = "rkopenmail@gmail.com";
    $subject = "Contact Form Submission";
    $headers = "From: $email\r\n";

    
    try {
    mail($to, $subject, $message, $headers);
    $result = 'Email sent successfully.';
} catch (Exception $e) {
    $result = 'Error sending email: ' . $e->getMessage();
}
    insertIntoDatabase($name, $phone, $email, $message);
    // Log form submission
    $logData = "Name: $name, Phone: $phone,Email: $email, Message: $message";
    logFormSubmission($logData);
	$result = 'We received your query. We will contact you shortly.';

    // You can redirect the user to a thank you page or display a success message
    // header("Location: thank_you.php");
    // exit();
  }
}
?>

  <!--====== SIDEBAR PART ENDS ======-->

  <!-- Start header Area -->
  <section id="hero-area" class="header-area header-image  header-eight p-0">
	<img src="assets/images/contact.svg" />
    <div class="container">
      <div class="row align-items-center">
	  
       
        <div class="col-lg-6 col-md-12 col-12">
          <div class="header-image">
            
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End header Area -->

  <!--====== ABOUT FIVE PART START ======-->

  
  <!-- ===== service-area start ===== -->
  <section id="services" class="services-area services-eight">
    <!--======  Start Section Title Five ======-->
	<div class="container pb-5">
	<h2 class="fw-bold" style="font-size:40px;">Contact Us</h2>
	<hr class="bbred" style="max-width:126px;">
	</div>
    
    <!--======  End Section Title Five ======-->
    <div class="container whitebg contactcontainer p-5" style="border-radius:15px;">
       <div class="row">
           	<div class="col-md-12 ">
	   <h2 class="pb-1">Get in touch</h2>
	   <p class="pt-2 pb-3">If you have any questions, would like to collaborate on something amazing, or simply want to share your love for gifts, please don't hesitate to reach out to us. In addition to creating awesome gifts, we absolutely enjoy engaging in conversations!</p>
	   </div>
				<div class="col-md-6 ">
				 <form  method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" style="min-height: 50px;width: 70%;
    border-radius: 10px;" name="name" required>
						<span class="error"><?php echo $nameErr;?></span>
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone number</label>
                        <input type="phone" class="form-control" style="min-height: 50px;width: 70%;
    border-radius: 10px;" id="phone" name="phone" required>
						<span class="error"><?php echo $phoneErr;?></span>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" style="min-height: 50px;width: 70%;
    border-radius: 10px;" id="email" name="email" required>
						<span class="error"><?php echo $emailErr;?></span>
                    </div>

                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" style="min-height: 50px;width: 70%;
    border-radius: 10px;" id="message" name="message" rows="4" required></textarea>
						<span class="error"><?php echo $messageErr;?></span>
                    </div>
						<div class="button">
                    <button type="submit" class="btn btn-primary" style="    text-transform: capitalize;
    font-size: 20px;
    width: 126px;
    height: 50px;
    border-radius: 10px;">Send</button>
					</div>
					<p class="text-success p-2"><?php echo $result; ?></p>
                </form>
				</div>
				<div class="col-md-6">
				<h3 class="pb-4">For customer queries</h3>
				<p class="pb-2"><a class="text-dark pr-2" href="mailto:impressivegiftshop@gmail.com"><img src="assets/images/micon.png" width="31" height="31" class="vector" alt="Brand Logo Images" style="
    margin-right: 15px;
">impressivegiftshop@gmail.com</a></p>
				
				<p class="pt-3"><a class="text-dark" href="tel:+919514715045"><img src="assets/images/wicon.png" width="31" height="31" class="vector" alt="Brand Logo Images" style="
    margin-right: 15px;
">+91 95147 15045</a></p>
				<img src="assets/images/aboutimage1.png" class="aboutimage" style="margin-left: -90px" height="480">
				</div>
			</div>
		</div>
  </section>
  <!-- ===== service-area end ===== -->
<?php
	include_once('footer.php');
?>