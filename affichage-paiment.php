<?php
    include('connexion.php');

    $listePanier = $_SESSION['panier']->getListeProduits();
    $listeAffichage;
    $id;
    $nombreAchat;
    foreach ($listePanier as $key => $value){

        $id = $key;
        $nombreAchat = $value;
        try {

            $reponse = $db->prepare( "CALL chercher_produit(:id)" );
            $reponse->execute( array('id' => $id) );
    
            if( $ligne = $reponse -> fetch() ){
                
                $listeAffichage[] = new affichageProduit( $ligne['no'], $nombreAchat, $ligne['nom'], $ligne['prix'], $ligne['image'], $ligne['qte'], $ligne['description']  );

            }
        }
        catch(Exception $e) {
    
            die('Erreur : '.$e->getMessage());
        }
    
        //fermer appel 
        $reponse->closeCursor();
    }
    
    //affichage
?>
<div id="divTablePanier">

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
                            <td> <a href="produit.php?id=' . $id . '"><img src="images/vente/' . $image . '-mini.jpg" alt="' . $nom . '" />' . $nom .  '</a></td>
                            <td>' . $prix . '$</td>
                            <td><span class="txtQuantitePanier" id="' . $id . '" name="'. $id .  '"/>' . $nombreDemande .'</td>
                            <td>'.  $totalDuProduit . '$</td>
                        </tr>';
                }
                $grandTotal = $sousTotal + 10;
            ?>
        </table>

</div>

<div id=gridFacture>
    <div id="gridItemLeft">
        <?php
            $manager = new PersonneDao($db);
            $client = $manager->get($_SESSION['user']);
            ?>
            <h4>Adresse de livraison</h4>
            <table id="tableAdresse">
            <tr> <td><?php echo $client->getPrenom().' ' .$client->getNom() ?></td> </tr>
            <tr> <td><?php echo $client->getAdresse() ?></td> </tr>
            <tr> <td><?php echo $client->getVille().', ' .$client->getProvince() ?></td> </tr>
            </table>
    </div>
    <div id="gridItemRight">

            <h4>Total du panier</h4>
            <table align="right" id="tableTotalPanier">
                <tr> <td>Sous-total</td><td class="colonneSoustotalPanier"><?php echo $sousTotal; ?> $</td> </tr>
                <tr> <td>Expédition</td><td class="colonneSoustotalPanier">10$</td> </tr>
                <tr> <td>Total</td><td class="colonneSoustotalPanier"><?php echo $grandTotal ; ?> $</td> </tr>
            </table>
        <div class="paiement">
            <form action="paiement.php" method="POST">   
                <label  for="selPaiement">Paiement :</label>
                <select id="selPaiement" name="selPaiement">
                    <option >Visa</option>
                    <option >Mastercard</option>		
                    <option >American Express</option>
                    <option >Paypal</option>
                </select>
                <input type="submit" class="btnSubmitPagePanier" value="Confirmer la commande">
            </form>
        </div>

    </div>
</div>
<?php
    // fin affichage
    //fermer base de données 
    $db = null;
?>


<!-- 
 - Commandes
 - Items commandes
-->