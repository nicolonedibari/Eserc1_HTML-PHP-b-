<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // --- DATI CLIENTE ---
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $ragione_sociale = $_POST['ragione_sociale'];
    $indirizzo = $_POST['indirizzo'];
    $piva = $_POST['piva'];

    // --- DATI PRODOTTO ---
    $descrizione = $_POST['descrizione'];
    $codice = $_POST['codice'];
    $giacenza = (int) $_POST['giacenza'];
    $prezzo_unitario = (float) $_POST['prezzo_unitario'];
    $quantita = (int) $_POST['quantita'];
    $percentuale = (float) $_POST['percentuale'];

    // --- CALCOLI ---
    $prezzo_totale = $prezzo_unitario * $quantita;
    $sconto = ($prezzo_totale * $percentuale) / 100;
    $prezzo_finale = $prezzo_totale - $sconto;
    ?>
    <!DOCTYPE html>
    <html lang="it">
    <head>
        <meta charset="UTF-8">
        <title>Riepilogo Cliente</title>
    </head>
    <body>
        <h1>Dati Cliente</h1>
        <p><strong>Nome:</strong> <?= $nome ?></p>
        <p><strong>Cognome:</strong> <?= $cognome ?></p>
        <p><strong>Ragione Sociale:</strong> <?= $ragione_sociale ?></p>
        <p><strong>Indirizzo:</strong> <?= $indirizzo ?></p>
        <p><strong>Partita IVA:</strong> <?= $piva ?></p>

        <h2>Dettagli Prodotto</h2>
        <p><strong>Descrizione:</strong> <?= $descrizione ?></p>
        <p><strong>Codice:</strong> <?= $codice ?></p>
        <p><strong>Giacenza:</strong> <?= $giacenza ?></p>
        <p><strong>Prezzo Unitario:</strong> €<?= number_format($prezzo_unitario, 2, ',', '.') ?></p>
        <p><strong>Quantità:</strong> <?= $quantita ?></p>
        <p><strong>Prezzo Totale:</strong> €<?= number_format($prezzo_totale, 2, ',', '.') ?></p>
        <p><strong>Sconto (<?= $percentuale ?>%):</strong> €<?= number_format($sconto, 2, ',', '.') ?></p>
        <p><strong>Prezzo Finale:</strong> €<?= number_format($prezzo_finale, 2, ',', '.') ?></p>

        <br>
        <a href="form.html">Torna al modulo</a>
    </body>
    </html>
    <?php
} else {
    echo "<p>Nessun dato inviato. Torna al <a href='form.html'>modulo</a>.</p>";
}
?>
