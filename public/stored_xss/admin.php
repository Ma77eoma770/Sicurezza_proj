<?php
$file_commenti = '/var/www/htmltxt/commenti.txt';
?>
<!DOCTYPE html>
<html lang="it">
<head>
  <link rel="stylesheet" href="style.css">
  <meta charset="UTF-8">
  <title>Admin Panel - Moderazione</title>
  <style>
      .login-box { border: 2px solid #ccc; padding: 20px; background: #fff; width: 300px; margin-bottom: 30px;}
  </style>
</head>
<body>
  <h1>Admin Page</h1>

  <!-- finto login -->
  <div class="login-box">
      <h3>Login</h3>
      <p>Inserisci le credenziali.</p>
      <form action="#" method="get" onsubmit="event.preventDefault(); alert('Login simulato effettuato.');">
          <label>Admin Username:</label><br>
          <input type="text" name="admin_user"><br><br>
          
          <label>Admin Password:</label><br>
          <input type="password" name="admin_pass"><br><br>
          
          <button type="submit">Accedi</button>
      </form>
  </div>


   <!-- credo irrealistico ma è solo un esempio quindi è fine ig-->
  <h2>Ultimi commenti in attesa di moderazione:</h2>
  <div>
     <?php
        if (file_exists($file_commenti)){
            readfile($file_commenti);
        }
     ?>
  </div>
</body>
</html>