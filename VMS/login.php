<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Visitor Portal - IIITN</title>
  <style>
    * {
      box-sizing: border-box;
    }
    body {
      margin: 30px;
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(to right, #cbd9f2, #e0ecff);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .container {
      width: 1000px;
      height: 800px;
      background: #fff;
      border-radius: 20px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.1);
      display: flex;
      overflow: hidden;
      transition: transform 0.3s ease;
    }
    .container:hover {
      transform: scale(1.01);
    }
    .left-panel, .right-panel {
      transition: background 0.3s ease, color 0.3s ease;
    }
    .left-panel {
      width: 50%;
      background: linear-gradient(to top right, #4b1ea7, #6a56f1);
      color: rgb(255, 255, 255);
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      padding: 40px;
      border-top-right-radius: 130px;
      border-bottom-right-radius: 130px;
    }
    .left-panel h2 {
      font-size: 40px;
      margin-bottom: 10px;
    }
    .left-panel p {
      font-size: 15px;
      text-align: center;
      margin-bottom: 30px;
    }
    .left-panel button {
      background: white;
      color: #4b1ea7;
      border: none;
      padding: 12px 30px;
      font-size: 20px;
      border-radius: 30px;
      cursor: pointer;
      font-weight: bold;
      transition: all 0.3s ease;
    }
    .left-panel button:hover {
      background: #e0e0ff;
      transform: translateY(-3px);
      box-shadow: 0 4px 12px rgba(0,0,0,0.2);
    }

    .right-panel {
      width: 50%;
      padding: 40px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      background: #ffffff;
    }
    .right-panel h1 {
      color: #3c2f8c;
      font-size: 40px;
      margin-bottom: 20px;
    }
    .right-panel form {
      display: flex;
      flex-direction: column;
    }
    .right-panel label {
      font-size: 18px;
      margin-bottom: 8px;
      color: #333;
    }
    .right-panel input[type="text"], 
    .right-panel input[type="password"] {
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 16px;
    }
    .right-panel button {
      margin-top: 20px;
      background: #4b1ea7;
      color: rgb(255, 255, 255);
      padding: 12px 30px;
      border: none;
      border-radius: 30px;
      cursor: pointer;
      font-size: 20px;
      font-weight: bold;
      width: fit-content;
      transition: all 0.3s ease;
    }
    .right-panel button:hover {
      background: #32227b;
      transform: translateY(-3px);
      box-shadow: 0 4px 12px rgba(0,0,0,0.2);
    }
  </style>
</head> 

<body>
<?php    
$role = $_GET['role'] ?? 'unknown'; 
?>
<?php
if ($role == 'student') {
    echo '<div class="container">';

    echo '<div class="left-panel">';
    echo '<h2>Student Dashboard</h2>';
    echo '<p>Enter your personal details to use all of site features</p>';
    echo '</div>';

    echo '<div class="right-panel">';
    echo '<h1>Student Login</h1>';
    echo '<form action="login_submit.php" method="POST">';
    echo '<input type="hidden" name="role" value="student" />';
    echo '<label for="username">User  Name</label>';
    echo '<input type="text" id="name" name="name" required />';

    echo '<label for="password">Password</label>';
    echo '<input type="password" id="password" name="password" required />';

    echo '<button type="submit">Login</button>';
    echo '</form>';

    echo '<button onclick="history.back()" style="margin-top: 20px; background: #ccc; color: #333; padding: 10px 20px; border: none; border-radius: 8px; cursor: pointer; font-size: 16px;">Back</button>';
    echo '</div>'; 

    echo '</div>';
}


elseif ($role == 'visitor') {
    echo '<div class="container">';

    echo '<div class="left-panel">';
    echo '<h2>Visitor Dashboard</h2>';
    echo '<p>Enter your personal details to use all of site features</p>';
    echo '</div>'; 

    echo '<div class="right-panel">';
    echo '<h1>Visitor Login</h1>';
    echo '<form action="login_submit.php" method="POST">';
    echo '<input type="hidden" name="role" value="visitor" />';
    echo '<label for="username">User  Name</label>';
    echo '<input type="text" id="name" name="name" required />';

    echo '<label for="password">Password</label>';
    echo '<input type="password" id="password" name="password" required />';

    echo '<button type="submit">Login</button>';
    echo '</form>'; 

    echo '<button onclick="history.back()" style="margin-top: 20px; background: #ccc; color: #333; padding: 10px 20px; border: none; border-radius: 8px; cursor: pointer; font-size: 16px;">Back</button>';
    echo '</div>';

    echo '</div>'; 
} elseif ($role == 'staff') {
    echo '<div class="container">';

    echo '<div class="left-panel">';
    echo '<h2>Staff Dashboard</h2>';
    echo '<p>Enter your personal details to use all of site features</p>';
    echo '</div>'; 

    echo '<div class="right-panel">';
    echo '<h1>Staff Login</h1>';
    echo '<form action="login_submit.php" method="POST">';
    echo '<input type="hidden" name="role" value="staff" />';
    echo '<label for="username">User  Name</label>';
    echo '<input type="text" id="name" name="name" required />';

    echo '<label for="password">Password</label>';
    echo '<input type="password" id="password" name="password" required />';

    echo '<button type="submit">Login</button>';
    echo '</form>'; 

    echo '<button onclick="history.back()" style="margin-top: 20px; background: #ccc; color: #333; padding: 10px 20px; border: none; border-radius: 8px; cursor: pointer; font-size: 16px;">Back</button>';
    echo '</div>';

    echo '</div>';
}elseif ($role == 'admin') {
  echo '<div class="container">';

  echo '<div class="left-panel">';
  echo '<h2>ADMIN Dashboard</h2>';
  echo '<p>Enter your personal details to use all of site features</p>';
  echo '</div>'; 

  echo '<div class="right-panel">';
  echo '<h1>ADMIN Login</h1>';
  echo '<form action="login_submit.php" method="POST">';
  echo '<input type="hidden" name="role" value="admin" />';
  echo '<label for="username">User  Name</label>';
  echo '<input type="text" id="name" name="name" required />';

  echo '<label for="password">Password</label>';
  echo '<input type="password" id="password" name="password" required />';

  echo '<button type="submit">Login</button>';
  echo '</form>'; 

  echo '<button onclick="history.back()" style="margin-top: 20px; background: #ccc; color: #333; padding: 10px 20px; border: none; border-radius: 8px; cursor: pointer; font-size: 16px;">Back</button>';
  echo '</div>';

  echo '</div>';}
?>
   
</body>
</html>