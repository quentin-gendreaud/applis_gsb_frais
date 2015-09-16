<?php
	$repInclude = './include/';
	require($repInclude . "_init.inc.php");

	// page inaccessible si visiteur non connecté
	if ( ! estVisiteurConnecte() ) 
	{
      header("Location: cSeConnecter.php");  
	}
	require($repInclude . "_entete.inc.html");
	require($repInclude . "_sommaire.inc.php");
  
	// Enregistrement des données relatives aux visiteur conecté
	$infoUser=visiteurDepuisLogin($_SESSION['id'],$_SESSION['login']);
 
?>
	<div id="contenu"> <!-- Corps de la page -->
		<div class="corpsForm"> <!-- Cadre dans lequels serons saisies les données -->
<?php
		$listeVisiteur = listeVisiteur();
		while($visiteur = mysqli_fetch_assoc($listeVisiteur))
		{
			echo $visiteur['nom']." ".$visiteur['prenom'];
			echo"<h3>Hors forfait :</h3>";
			$listeHorsForfais = listeHorsForfaitVisiteurEnCours($visiteur['id']);
			while($fiche = mysqli_fetch_assoc($listeHorsForfais))
			{
				echo"<table>
				<tr>
					<td>Nom Visiteur</td>
					<td>Prenom Visiteur</td>
					<td>Prenom Visiteur</td>
					<td>Date</td>
					<td>Raisons</td>
					<td>Montant</td>
				</tr>";
				
				echo"<tr>";
				foreach ($fiche as $info)
				{
					echo "<td>".$info."</td>";
				}
				echo"</tr></table>";
			}
			echo"</br></br>";
		}
?>
		</div>
	</div>

<?php
?>

<tr><td></td></tr>