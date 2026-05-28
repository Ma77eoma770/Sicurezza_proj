<?php

// Estrazione dell'header User-Agent senza sanificazione
$userAgent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : 'Nessun User-Agent fornito';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header XSS Vulnerability</title>
</head>

<body>
    <!-- Contenitore che definisce dove il contenuto viene inserito -->
    <div class="container">
        <h1>Vulnerabilità Header XSS</h1>
        <p>Benvenuto!</p>

        <!-- Stampa dell'header non sanificato, vulnerabile a XSS -->
        <p>Il tuo browser (User-Agent) è: <strong><?php echo $userAgent; ?></strong></p>

        <p><em>Prova ad alterare l'header User-Agent inserendo uno script (es. &lt;script&gt;alert(1)&lt;/script&gt;)
                per verificare la vulnerabilità.</em></p>
        
        <br>
        <a href="index.php"><button>Torna alla Home</button></a>
    </div>
</body>

</html>