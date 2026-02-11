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

    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(to right, #cbd9f2, #e0ecff);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .container {
      width: 1000px;
      height: 650px;
      background: #fff;
      border-radius: 20px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      display: flex;
      overflow: hidden;
      transition: transform 0.3s ease;
    }

    .container:hover {
      transform: scale(1.01);
    }

    .left-panel,
    .right-panel {
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
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
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

    .right-panel ul {
      list-style: disc;
      padding-left: 20px;
      color: #333;
      font-size: 20px;
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
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
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
    echo '<button onclick="history.back()" style=" background: #cdcc; color: #333; padding: 10px 20px; border: none; border-radius: 8px; cursor: pointer; font-size: 16px;">Back</button>';
    echo '<div class="left-panel">';
    echo '<h2>Student Dashboard</h2>';
    echo '<p>Enter your personal details to use all of site features</p>';
    echo '<button onclick="location.href=\'login.php?role=student\'">SIGN IN</button>';
    echo '</div>'; // Closing left-panel div
    echo '<div class="right-panel">'; 
    echo '<h1>Welcome To IIITN</h1>';  
    echo '<ul>';
    echo '<li>Register if you are a first time visitor</li>';
    echo '<li>Sign in if you have visited earlier</li>';
    echo '</ul>';
    echo '<button onclick="location.href=\'register.php?role=student\'">SIGN UP</button>'; 
    echo '</div>'; // Closing right-panel div
    echo '</div>'; // Closing container div
}


       elseif ($role == 'visitor') {
        echo '<div class="container">';
        echo '<button onclick="history.back()" style=" background: #cdcc; color: #333; padding: 10px 20px; border: none; border-radius: 8px; cursor: pointer; font-size: 16px;">Back</button>';
    echo '<div class="left-panel">';
    echo '<h2>Visitor Dashboard</h2>';
    echo '<p>Enter your personal details to use all of site features</p>';
    echo '<button onclick="location.href=\'login.php?role=visitor\'">SIGN IN</button>';
    echo '</div>'; // Closing left-panel div
    echo '<div class="right-panel">'; 
    echo '<h1>Welcome To IIITN</h1>';  
    echo '<ul>';
    echo '<li>Register if you are a first time visitor</li>';
    echo '<li>Sign in if you have visited earlier</li>';
    echo '</ul>';
    echo '<button onclick="location.href=\'register.php?role=visitor\'">SIGN UP</button>'; 
    echo '</div>'; // Closing right-panel div
    echo '</div>'; // Closing container div
      } elseif ($role == 'staff') {
        echo '<div class="container">';
        echo '<button onclick="history.back()" style=" background: #cdcc; color: #333; padding: 10px 20px; border: none; border-radius: 8px; cursor: pointer; font-size: 16px;">Back</button>';
    echo '<div class="left-panel">';
    echo '<h2>Staff Dashboard</h2>';
    echo '<p>Enter your personal details to use all of site features</p>';
    echo '<button onclick="location.href=\'login.php?role=staff\'">SIGN IN</button>';
    echo '</div>'; // Closing left-panel div
    echo '<div class="right-panel">'; 
    echo '<h1>Welcome To IIITN</h1>';  
    echo '<ul>';
    echo '<li>Register if you are a first time visitor</li>';
    echo '<li>Sign in if you have visited earlier</li>';
    echo '</ul>';
    echo '<button onclick="location.href=\'register.php?role=staff\'">SIGN UP</button>'; 
    echo '</div>'; // Closing right-panel div
    echo '</div>'; // Closing container div
      }elseif ($role == 'admin'){
        echo '<div class="container">';
        echo '<button onclick="history.back()" style=" background: #cdcc; color: #333; padding: 10px 20px; border: none; border-radius: 8px; cursor: pointer; font-size: 16px;">Back</button>';
    echo '<div class="left-panel">';
    echo '<h2>ADMIN Dashboard</h2>';
    echo '<p>Enter your personal details to use all of site features</p>';
    echo '<button onclick="location.href=\'login.php?role=admin\'">SIGN IN</button>';
    echo '</div>'; // Closing left-panel div
    echo '<div class="right-panel">'; 
    echo '<h1>Welcome To IIITN</h1>';  
    echo '<ul>';
    echo '<li>Register if you are a first time visitor</li>';
    echo '<li>Sign in if you have visited earlier</li>';
    echo '</ul>';
    echo '<button onclick="location.href=\'register.php?role=admin\'">SIGN UP</button>'; 
    echo '</div>'; // Closing right-panel div
    echo '</div>'; // Closing container div
      } ?>



</body>

</html>