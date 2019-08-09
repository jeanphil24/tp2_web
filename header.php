<a href="index.html"><img id="logo" src="images/logo.png" alt="logo du site monsieur café" /></a>

<?php  
if (!isset($_SESSION['connected'])) 
{	
	echo '<a href="compte.php"><div id="dejaMembre"><p>Mon compte' . $_SESSION['connected'] .' $</p></div> </a>';
}
else
{
	echo '<a href="inscription.php"><div id="dejaMembre"><p>Déjà membre ?</p><p>Cliquez ici !</p></div> </a>';
}
	
?>

<h1>
    <span id="monsieur">Monsieur</span> Café
    <span id="meilleur-java">Le meilleur du java</span>
</h1>