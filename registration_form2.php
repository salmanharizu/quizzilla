<html>
<head>
<!-- <div id="mainbody">
    <title>Register New User Form</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1"> -->
<?php
include ("header.php");
include ("topnav.php");
?>
</head>  
<body>
    <!-- <img class="wave" src="img/wave.png">
    <div class="container">
        <div class="img">
            <img src="img/cute_godzilla.png">
        </div>
        <div class="login-content"> -->
        <main class="flex-shrink-0">
        <div class="container">
            <div class="card p-5 my-5">
                <h1 class="p-5 bg-dark text-white rounded">Register for Student</h1>
                <br>
                <form class="needs-validation" action="user_process.php" method="POST">
            <div class="row g-3">
                        <div class="col-md-12">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Full Name" value=""
                                autocomplete="off" onkeyup="this.value = this.value.toUpperCase();" maxlength="50"
                                required>
                            <div class="invalid-feedback">
                                Full Name is required.
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email Format Below" value=""
                            autocomplete="off" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" autocomplete="off" maxlength="50"
                                required>
                            <div class="invalid-feedback">
                                Valid Email is required.
                            </div>
                            <span class="text-muted">Format: abc123@gmail.com (Note: This email is for student access)</span>
                        </div>
                        <div class="col-md-12">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password Format Below" value=""
                            autocomplete="off" pattern=".{8,18}" maxlength="50"
                                required>
                            <div class="invalid-feedback">
                            Valid Password 8-18 characters is required.
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="school" class="form-label">School</label>
                            <input type="text" class="form-control" id="school" school="school" placeholder="School" value=""
                                autocomplete="off" onkeyup="this.value = this.value.toUpperCase();" maxlength="50"
                                required>
                            <div class="invalid-feedback">
                                School is required.
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="class" class="form-label">Class</label>
                            <input type="text" class="form-control" id="class" name="class" placeholder="Class" value=""
                                autocomplete="off" onkeyup="this.value = this.value.toUpperCase();" maxlength="50"
                                required>
                            <div class="invalid-feedback">
                                Class is required.
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="email_parents" class="form-label">Email Parents</label>
                            <input type="text" class="form-control" id="email_parents" name="email_parents" placeholder="Email Format Below" value=""
                                autocomplete="off" onkeyup="this.value = this.value.toUpperCase();" maxlength="50"
                                required>
                            <div class="invalid-feedback">
                                Email Parents is required.
                            </div>
                            <span class="text-muted">Format: abc123@gmail.com (Note: This email is for notify the student's performance)</span>
                        </div>
                        <div class="my-4">
                        <button type="submit" id="registerBtn" name="registerBtn" class="btn btn btn-outline-dark btn-md" value="Register">Register</button>
                        </div>
            </div>
            </form>
            </div>
        </div>
        </main>
        <script src="/docs/5.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>

    <script src="form-validation.js"></script>
    <?php
include ("footer.php");
?>
</body>
</html>
            <!-- <form action="user_process2.php" method="POST">
                <img src="img/avatar1.svg">
                <h2 class="title">Register New User</h2>
						<div class="input-div one">
							<div class="i">
								<i class="fas fa-user"></i>
						</div>
					<div class="div">
							<h5>Name</h5>
							<input type="text" class="input" name="name" required>
					</div>
                </div>
                    <div class="input-div one">
						<div class="i">
							<i class="fas fa-user"></i>
						</div>
						<div class="div">
							<h5>Email</h5>
							<input type="text" class="input" name="email" required>
						</div>
					</div>
                <div class="input-div pass">
					<div class="i"> 
						<i class="fas fa-lock"></i>
					</div>
					<div class="div">
						<h5>Password</h5>
						<input type="password" class="input" name="password" 
						pattern=".{8,18}" title="8-18 characters only" required> 
					</div>
                </div>
				<div class="input-div one">
                             <div class="i">
                              <i class="fas fa-user"></i>
                      </div>
                      <div class="div">
                              <h5>School</h5>
                              <input type="text" class="input" name="school" required>
                      </div>
                </div>
				<div class="input-div one">
                             <div class="i">
                              <i class="fas fa-user"></i>
                      </div>
                      <div class="div">
                              <h5>Class</h5>
                              <input type="text" class="input" name="class" required>
                      </div>
                </div>
				<div class="input-div one">
                             <div class="i">
                              <i class="fas fa-user"></i>
                      </div>
                      <div class="div">
                              <h5>Email Parents</h5>
                              <input type="text" class="input" name="email_parents" required>
                      </div>
                </div>
                
                <h3><a href="index.php">Back</a></h3>
                <input type="submit" name="registerBtn" class="btn" value="Register">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html> -->