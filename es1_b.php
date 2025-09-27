<?php 

// --- DATI CLIENTE --- 
$nome = $_GET['nome']; 
$cognome = $_GET['cognome']; 
$ragione = $_GET['ragione']; 
$indirizzo = $_GET['indirizzo']; 
$piva = $_GET['piva']; 
$telefono = $_GET['telefono']; 

// --- DATI PRODOTTO --- 
$descrizione = $_GET['descrizione']; 
$codice = $_GET['codice']; 
$giacenza = $_GET['giacenza']; 
$prezzo_unitario = $_GET['prezzo_unitario']; 
$iva_percentuale = $_GET['iva']; 

// --- ORDINE --- 
$quantita = $_GET['quantita']; 
$sconto = $_GET['sconto']; 

// Calcoli 
$totale_netto = $prezzo_unitario * $quantita; 

// senza IVA 
$iva_valore = ($totale_netto * $iva_percentuale) / 100; 
$totale_ivato = $totale_netto + $iva_valore;

// Applico lo sconto sul totale ivato 
$valore_sconto = ($totale_ivato * $sconto) / 100; $totale_finale = $totale_ivato - $valore_sconto; 

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fattura</title>
</head>
<body>
    <h2>Riepilogo Ordine</h2>
    <h3>Dati Cliente</h3>
    <?php
        echo "Nome: $nome $cognome<br>";
        echo "Ragione Sociale: $ragione<br>";
        echo "Indirizzo: $indirizzo<br>";
        echo "P.IVA: $piva<br>";
        echo "Telefono: $telefono<br>";
    ?>

    <h3>Dati Prodotto</h3>
    <?php
        echo "Descrizione: $descrizione<br>";
        echo "Codice: $codice<br>";
        echo "Giacenza: $giacenza<br>";
        echo "Prezzo Unitario: € $prezzo_unitario<br>";
        echo "IVA: $iva_percentuale %<br>";
    ?>

    <h3>Dettagli Ordine</h3>
    <?php
        echo "Quantità: $quantita<br>";
        echo "Prezzo Totale (senza IVA): € $totale_netto<br>";
        echo "IVA: € $iva_valore<br>";
        echo "Prezzo Totale (con IVA): € $totale_ivato<br>";
        echo "Sconto applicato: $sconto % (-€ $valore_sconto)<br>";
        echo "<strong>Prezzo Finale da pagare: € $totale_finale</strong><br>";
    ?>

</body>
</html>
