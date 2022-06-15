<html>
<head>
<div id="mainbody">
    <title>Register New User Form</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>  
<body>
    <img class="wave" src="img/wave.png">
    <div class="container">
        <div class="img">
            <img src="img/cute godzilla.png">
        </div>
        <div class="login-content">
            <form action="user_process2.php" method="POST">
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
</html>