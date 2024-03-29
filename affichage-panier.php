<?php
    include('connexion.php');

    $listePanier = $_SESSION['panier']->getListeProduits();
    $listeAffichage;
    $id;
    $nombreAchat;
    foreach ($listePanier as $key => $value){

        try {

            $reponse = $db->prepare( "CALL chercher_produit(:id)" );
            $reponse->execute( array('id' => $key) );
    
            if( $ligne = $reponse -> fetch() ){
                
                $listeAffichage[] = new affichageProduit( $ligne['no'], $value, $ligne['nom'], $ligne['prix'], $ligne['image'], $ligne['qte'], $ligne['description']  );

            }
        }
        catch(Exception $e) {
    
            die('Erreur : '.$e->getMessage());
        }
    
        //fermer appel 
        $reponse->closeCursor();
    }
    
    // affichage des erreurs si le cas
    if( isset($listeErreurs)){
        foreach($listeErreurs as $erreur){
            echo '<p class="redErreurPanier">' . $erreur . ' : dépassait la quantité en inventaire</p>';
        }
    }
    // affichage du panier
?>
<div id="divTablePanier">
        <a href="panier.php?action=viderPanier" id="viderPanier">Vider le panier</a>
        <form action="panier.php?action=update" method="POST">
        <table id="tablePanier">
            <tr class="gras">
                <td>Produit</td>
                <td class="colonnePrixTotal">Prix</td> 
                <td id="tablePanierQuantite">Quantité</td>
                <td class="colonnePrixTotal">Total</td>
            </tr>
<?php
    $sousTotal = 0;
    foreach ( $listeAffichage as $item){

        $id = $item->getID();
        $nom = $item->getNom();
        $nombreDemande = $item->getNombreDemande();
        $prix = $item->getPrix();
        $image = $item->getNomImage();
        $totalDuProduit = $prix * $nombreDemande;
        $sousTotal = $sousTotal + $totalDuProduit;

        echo '<tr>
                <td> <a href="panier.php?action=enleverItem&item=' . $id . '"><img src="images/enlever-panier.png" alt="icon d\'un x rouge"></a> <a href="produit.php?id=' . $id . '"><img src="images/vente/' . $image . '-mini.jpg" alt="' . $nom . '" />' . $nom .  '</a></td>
                <td>' . $prix . '$</td>
                <td><input type="text" class="txtQuantitePanier" id="' . $id . '" name="'. $id . '" value="' . $nombreDemande . '"/></td>
                <td>'.  $totalDuProduit . '$</td>
            </tr>';
    }
    $grandTotal = $sousTotal + 10;
?>
        </table>
        <input type="submit" class="btnSubmitPagePanier" value="Mettre à jour le panier">
    </form>
</div>
<div id="divTotalPanier">
    <h4>Total du panier</h4>
    
    <?php 
        if ( !isset($_SESSION['user']) )
        {
            $_SESSION['lastPage'] = 'paiement.php';
            echo '<form action="login.php" method="POST">';
        }
        else
        {
            echo '<form action="paiement.php" method="POST">';
        }
    ?>
        <table id="tableTotalPanier">
            <tr> <td>Sous-total</td><td class="colonneSoustotalPanier"><?php echo $sousTotal; ?> $</td> </tr>
            <tr> <td>Expédition</td><td class="colonneSoustotalPanier">10$</td> </tr>
            <tr> <td>Total</td><td class="colonneSoustotalPanier"><?php echo $grandTotal ; ?> $</td> </tr>
        </table>
            <input type="submit" class="btnSubmitPagePanier" value="Procéder au paiement">
    </form>
</div>
<?php
    // fin affichage
    //fermer base de données 
    $db = null;
?>