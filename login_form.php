<html>
<head>
    <title>Login Form</title>
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
            <form action="login_process.php" method="POST">
                <img src="img/avatar1.svg">
                <h2 class="title">Welcome to QUIZZILLA</h2>
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
                           <input type="password" class="input" name="password" required>
                   </div>
                </div>
                <h3><p class="Catergory">Catergory : </p></h3>
                <div class="radio">
                <label class="radio">
                &nbsp;&nbsp;&nbsp;
                <input type="radio" id="teacher" name="category" value="T"> Teacher
                </label>
                <label class="radio">
                &nbsp;&nbsp;&nbsp;
                <input type="radio" id="student" name="category" value="S" required> Student
                </label>
                </div>
                
                <!-- <a href="registration_form.php">Register for Teacher</a>
                <a href="registration_form2.php">Register for Student</a> -->
                <input type="submit" class="btn" value="Login">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>