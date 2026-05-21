<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XSS Header Lab - Traccia 3</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        .container { max-width: 600px; margin: auto; padding: 20px; border: 1px solid #ccc; border-radius: 8px; }
        .vulnerable { color: red; font-weight: bold; }
        .secure { color: green; font-weight: bold; }
        a { text-decoration: none; }
        button { padding: 10px 15px; margin: 10px 0; cursor: pointer; border: none; border-radius: 4px; background-color: #f0f0f0;}
        button:hover { background-color: #e0e0e0; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Laboratorio XSS via HTTP Header</h1>
        <p>Questo laboratorio dimostra una vulnerabilità Cross-Site Scripting (XSS) tramite l'iniezione di un payload nell'header HTTP <code>User-Agent</code>.</p>
        
        <hr>

        <h2>1. Versione Vulnerabile</h2>
        <p>In questa versione, il server legge l'header <code>User-Agent</code> e lo stampa direttamente nella pagina HTML senza alcuna sanificazione.</p>
        <a href="header.php"><button class="vulnerable">Vai a header.php (Vulnerabile)</button></a>

        <h2>2. Versione Protetta (Misure di difesa)</h2>
        <p>In questa versione, l'input dell'utente proveniente dall'header viene passato attraverso la funzione <code>htmlspecialchars()</code> prima di essere stampato. Questo neutralizza eventuali tag HTML iniettati.</p>
        <a href="header_secure.php"><button class="secure">Vai a header_secure.php (Sicuro)</button></a>
    </div>
</body>
</html>
