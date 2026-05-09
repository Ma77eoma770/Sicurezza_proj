<?php
// Definiamo dove salvare i commenti. 
// Usiamo la cartella speciale con i permessi giusti creata nel Dockerfile.
$file_commenti = '/var/www/htmltxt/comments.txt';

// Se il modulo è stato inviato (metodo POST)
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username']) && isset($_POST['messaggio'])) {
    
    // Prendiamo i dati inseriti dall'utente
    $nome = trim($_POST['username']);
    $messaggio = trim($_POST['messaggio']); 
    
    if (!empty($nome) && !empty($messaggio)) {
        
        // 1. SANIFICHIAMO IL NOME (Buona pratica, previene XSS nel nome)
        // Converte caratteri come < e > in &lt; e &gt;
        $nome_sicuro = htmlspecialchars($nome, ENT_QUOTES, 'UTF-8');
        
        // 2. NON SANIFICHIAMO IL MESSAGGIO (VULNERABILITÀ INTENZIONALE)
        // Se c'è uno <script> qui, finirà dritto nel file!
        $record = "<div class='comment'><strong>" . $nome_sicuro . "</strong> <br>" . $messaggio . "</div>\n";
        
        // 3. Salva nel file di testo
        file_put_contents($file_commenti, $record, FILE_APPEND | LOCK_EX);
    }
    
    // Ricarichiamo la pagina per evitare l'invio doppio dei moduli se l'utente preme F5
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Forum Finanza: ETF Monetari</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 0 auto; padding: 20px; }
        .post { background-color: #f4f4f9; padding: 15px; border-radius: 5px; margin-bottom: 20px; }
        .comment-section { margin-top: 30px; border-top: 2px solid #ccc; padding-top: 20px; }
        .comment { background-color: #e9ecef; padding: 10px; margin-bottom: 10px; border-left: 4px solid #007bff; }
        textarea { width: 100%; height: 80px; margin-bottom: 10px; }
        button { padding: 10px 15px; background-color: #007bff; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>

    <!-- Intestazione del Forum -->
    <h1>Investimenti & Finanza Personale 📈</h1>

    <!-- Post Principale -->
    <div class="post">
        <h2>Cosa sono gli ETF Monetari? L'esempio di XEON</h2>
        <p><strong>Autore:</strong> Admin | <strong>Data:</strong> 
            <?php echo date("d/m/Y"); ?>
        </p>
        <p>Gli ETF monetari sono strumenti che investono in titoli di debito a brevissimo termine. Sono ottimi per parcheggiare la liquidità. Un esempio famoso è <strong>XEON</strong>, che replica il tasso di interesse a breve termine dell'Eurozona (ESTR).</p>
        <p>Cosa ne pensate? Usate XEON o preferite i conti deposito?</p>
    </div>

    <!-- Sezione Inserimento Commenti -->
    <div class="comment-section">
        <h3>Lascia un commento</h3>
        <!-- Il modulo invia i dati alla pagina stessa tramite POST -->
        <form action="index.php" method="POST">
            <label for="username">Il tuo nome:</label><br>
            <input type="text" id="username" name="username" required><br><br>
            
            <label for="messaggio">Il tuo commento:</label><br>
            <textarea id="messaggio" name="messaggio" required></textarea><br>
            
            <button type="submit">Pubblica Commento</button>
        </form>
    </div>

    <!-- Sezione di visualizzazione dei commenti -->
    <div style="margin-top: 40px;">
        <h3>Commenti degli utenti:</h3>
        
        <?php
        // Mostriamo i commenti leggendoli direttamente dal file di testo
        // Poiché il messaggio non è stato sanificato durante il salvataggio,
        // qualsiasi codice HTML o JavaScript inserito verrà eseguito dal browser
        if (file_exists($file_commenti) && filesize($file_commenti) > 0) {
            readfile($file_commenti);
        } else {
            echo "<p>Nessun commento ancora. Scrivi la tua prima opinione!</p>";
        }
        ?>
    </div>

</body>
</html>