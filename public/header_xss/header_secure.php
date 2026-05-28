<?php

// Estrazione dell'header User-Agent con sanificazione
$userAgent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : 'Nessun User-Agent fornito';
// Sanificazione tramite htmlspecialchars
$userAgentSicuro = htmlspecialchars($userAgent, ENT_QUOTES, 'UTF-8');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header XSS Vulnerability - Sicuro</title>
</head>

<body>
    <!-- Contenitore che definisce dove il contenuto viene inserito -->
    <div class="container">
        <h1>Header XSS Mitigato</h1>
        <p>Benvenuto!</p>

        <!-- Stampa dell'header sanificato, protetto da XSS -->
        <p>Il tuo browser (User-Agent) è: <strong><?php echo $userAgentSicuro; ?></strong></p>

        <p><em>Prova ad alterare l'header User-Agent inserendo uno script (es. &lt;script&gt;alert(1)&lt;/script&gt;).
                Noterai che in questa versione lo script non viene eseguito!</em></p>
        
        <br>
        <a href="index.php"><button>Torna alla Home</button></a>
    </div>
</body>

</html>
