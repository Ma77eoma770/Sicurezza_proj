<?php
$file_commenti = '/var/www/htmltxt/commenti.txt';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // TO DO: Magari una volta finito il tutto i commenti li elimino, e spiego nella relazione

    // ricordiamo trim leva spazi prima e dopo
    $nome = trim($_POST['username']);
    $commento = trim($_POST['messaggio']);

    // controllo perchè a quanto pare si può aggirare required di html
    if (!empty($nome) && !empty($commento)) {

        $nome_sicuro = htmlspecialchars($nome, ENT_QUOTES, 'UTF-8');
        //sanifico il nome ma non il commento

        $record = "<div class='comment'><strong>" . $nome_sicuro . "</strong><br>" . $commento . "</div>\n";
        file_put_contents($file_commenti, $record, FILE_APPEND);

        // dice al browser di tornare alla pagina principale
        header("Location: index.php");
        exit;
    }

}
?>


<!DOCTYPE html>
<html lang="it">
<head>
  <link rel="stylesheet" href="style.css">
  <meta charset="UTF-8">
  <title>CryptoChads:</title>
</head>
<body>

  <h1>Coin rivoluzionarie</h1>

  <!-- post -->
  <div class="post">
    <h2>CatCoin, to the moon? 🐱🚀</h2>
    <p><strong>Autore:</strong> Caolo Polletti | <strong>Data:</strong> 12/05/2025</p>
    <p>
      Il suo arrivo ha creato un' hype mai visto prima nel mondo della finanza.
      Creato da un gruppo anonimo di informatici di Reggio Calabria, CatCoin promette di 
      rivoluzionare per sempre il mondo della finanza. Transizioni anonime e instantanee e completamente
      green! Un vero prodigio!  
    </p>
    <p>Cosa ne pensate? All in o starete fermi a guardare?</p>
  </div>

  <!-- form commenti -->
  <div class="comment-section">
    <h3>Lascia un commento</h3>
    <form action="index.php" method="POST">

      <label for="username">Nome:</label><br>
      <input type="text" id="username" name="username" required><br><br>

      <label for="messaggio">Commento:</label><br>
      <textarea id="messaggio" name="messaggio" required></textarea><br>

      <button type="submit">Pubblica Commento</button>

    </form>
  </div>

  <!-- commenti -->
  <div style="margin-top: 40px;">
    <h3>Commenti:</h3>
    <div class="comment">
      <strong>Mr.ROPE</strong><br>
      Grande Caolo!

    </div>
    <div class="comment">
      <strong>LucaToTheMoon</strong><br>
      🚀🚀🚀🚀🚀
    </div>

    <!-- commenti real inseriti dal form -->
     <?php
        if (file_exists($file_commenti)){
            readfile($file_commenti);
        }
     ?>
  </div>

</body>
</html>