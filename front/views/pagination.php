<?
//==============================================================================
//           # PAGINATION AUTOMATIQUE PAR APPEL DE FONCTIONS PHP #
//==============================================================================
?>
<html>
<head>
<title>Script de pagination automatique en php</title>
<!-- Styles CSS -->
<style type="text/css">
html {font-size: 1.4em;}
.pagination a {color: black;}
.pagination a:hover {color: red; text-decoration: none;}
.pagination a:visited {color: red; text-decoration: none;}
</style>
</head>
<body>
<?
//==============================================================================
// Configuration ?modifier avec vos propres param?res
//==============================================================================

// Connexion ?la base de donn?s
$host = "localhost";
$user = "root";
$pass = "";
$data = "zanimobd"; // Nommer ici la base de donn?s
$connect = mysql_connect($host, $user, $pass)
  or die("Connexion au serveur impossible !");
$db = mysql_select_db($data, $connect)
  or die("S?ection de la base impossible !");

// Param?rage de la requ?e (ne pas modifier le nom des variable)
$table = "produit"; // Table ?s?ectionner dans la base
$champ = "nom"; // Champ de la table ?afficher pour tester ce script
$sql = "SELECT * FROM $table"; // Requ?e initiale (?compl?er si n?essaire)

$parpage = 5; // Nombre d'enregistrements par page ?afficher

//==============================================================================
// D?laration et initialisation des variables (ici ne rien modifier)
//==============================================================================

// On d?init le suffixe du lien url qui affichera les pages
// $_SERVEUR['PHP_SELF'] donne l'arborescence de la page courante
$url = $_SERVER['PHP_SELF']."?limit=";

$total = mysql_query($sql); // R?ultat total de la requ?e $sql
$nblignes = mysql_num_rows($total); // Nbre total d'enregistrements

// On calcule le nombre de pages ?afficher en arrondissant
// le r?ultat au nombre sup?ieur gr?e ?la fonction ceil()
$nbpages = ceil($nblignes/$parpage);

//==============================================================================
// Exemple d'affichage HTML
//==============================================================================

// On teste en affichant la valeur des variables (facultatif)
echo "<p>La table <b>".$table."</b> compte ".$nblignes." <b>".$champ."</b>.";
echo "<br />\n"."On affiche <b>".$parpage." enregistrements</b> par page, ";
echo "soit un total de <b>".$nbpages." pages</b>.</p>\n";

// Si une valeur 'limit' est pass? par url, on v?ifie la validit?de
// cette valeur par mesure de s?urit?avec la fonction validlimit()
// cette fonction retourne automatiquement le r?ultat de la requ?e
$result = validlimit($nblignes,$parpage,$sql);

// On affiche le r?ultat de la requ?e
// On cr? donc ici son propre tableau pour lequel on souhaite une pagination
while ($ligne = mysql_fetch_array($result)) {
  echo $ligne[$champ]."<br />\n";
}

// Menu de pagination que l'on place apr? la requ?e
echo "<div class='pagination'>";
echo pagination($url,$parpage,$nblignes,$nbpages);
echo "</div>";

mysql_free_result($result); // Lib?e le r?ultat de la m?oire

//==============================================================================
// Fonctions ?copier de pr??ence dans un fichier 'include/fonctions.inc.php'
//==============================================================================

function pagination($url,$parpage,$nblignes,$nbpages)
{
  // On cr? le code html pour la pagination
  $html = precedent($url,$parpage,$nblignes); // On cr? le lien precedent
  // On v?ifie que l'on a plus d'une page ?afficher
  if ($nbpages > 1) {
    // On boucle sur les num?os de pages ?afficher
    for ($i = 0 ; $i < $nbpages ; ++$i) {
      $limit = $i * $parpage; // On calcule le d?ut de la valeur 'limit'
      $limit = $limit.",".$parpage; // On fait une concat?ation avec $parpage
      // On affiche les liens des num?os de pages
      $html .= "<a href=".$url.$limit.">".($i + 1)."</a> | " ;
    }
  }
  // Si l'on a qu'une page on affiche rien
  else {
    $html .= "";
  }
  $html .= suivant($url,$parpage,$nblignes); // On cr? le lien suivant
  // On retourne le code html
  return $html;
}
function validlimit($nblignes,$parpage,$sql)
{
  // On v?ifie l'existence de la variable $_GET['limit']
  // $limit correspond ?la clause LIMIT que l'on ajoute ?la requ?e $sql
  if (isset($_GET['limit'])) { 
    $pointer = split('[,]', $_GET['limit']); // On scinde $_GET['limit'] en 2
    $debut = $pointer[0];
    $fin = $pointer[1];
    // On v?ifie la conformit?de la variable $_GET['limit']
    if (($debut >= 0) && ($debut < $nblignes) && ($fin == $parpage)) {
      // Si $_GET['limit'] est valide on lance la requ?e pour afficher la page
      $limit = $_GET['limit']; // On r?up?e la valeur 'limit' pass? par url
      $sql .= " LIMIT ".$limit.";"; // On ajoute $limit ?la requ?e $sql
      $result = mysql_query($sql); // Nouveau r?ultat de la requ?e
    }
    // Sinon on affiche la premi?e page
    else {
      $sql .= " LIMIT 0,".$parpage.";"; // On ajoute la valeur LIMIT ?la requ?e
      $result = mysql_query($sql); // Nouveau r?ultat de la requ?e
    }
  }
  // Si la valeur 'limit' n'est pas connue, on affiche la premi?e page
  else {
    $sql .= " LIMIT 0,".$parpage.";"; // On ajoute la valeur LIMIT ?la requ?e
    $result = mysql_query($sql); // Nouveau r?ultat de la requ?e
  }
  // On retourne le r?ultat de la requ?e
  return $result;
}
function precedent($url,$parpage,$nblignes)
{
  // On v?ifie qu'il y a au moins 2 pages ?afficher
  if ($nblignes > $parpage) {
    // On v?ifie l'existence de la variable $_GET['limit']
    if (isset($_GET['limit'])) {
      // On scinde la variable 'limit' en utilisant la virgule comme s?arateur
      $pointer = split('[,]', $_GET['limit']);
      // On r?up?e le nombre avant la virgule et on soustrait la valeur $parpage
      $pointer = $pointer[0]-$parpage;
      // Si on atteint la premi?e page, pas besoin de lien 'Pr??ent'
      if ($pointer < 0) {
        $precedent = "";
      }
      // Sinon on affiche le lien avec l'url de la page pr??ente
      else {
        $limit = "$pointer,$parpage";
        $precedent = "<a href=".$url.$limit."><</a> | ";
      }
    }
    else {
      $precedent = ""; // On est ?la premi?e page, pas besoin de lien 'Pr??ent'
    }
  }
  else {
  $precedent = ""; // On a qu'une page, pas besoin de lien 'Pr??ent'
  }
  return $precedent;
}
function suivant($url,$parpage,$nblignes)
{
  // On v?ifie qu'il y a au moins 2 pages ?afficher
  if ($nblignes > $parpage) {
    // On v?ifie l'existence de la variable $_GET['limit']
    if (isset($_GET['limit'])) {
      // On scinde la variable 'limit' en utilisant la virgule comme s?arateur
      $pointer = split('[,]', $_GET['limit']);
      // On r?up?e le nombre avant la virgule auquel on ajoute la valeur $parpage
      $pointer = $pointer[0] + $parpage;
      // Si on atteint la derni?e page, pas besoin de lien 'Suivant'
      if ($pointer >= $nblignes) {
        $suivant = "";
      }
      // Sinon on affiche le lien avec l'url de la page suivante
      else {
        $limit = "$pointer,$parpage";
        $suivant = "<a class='pagination' href=".$url.$limit.">></a>";
      }
    }
    // Si pas de valeur 'limit' on affiche le lien de la deuxi?e page
    if (@$_GET['limit']== false) {
      $suivant = "<a href=".$url.$parpage.",".$parpage.">></a>";
    }
  }
  else {
  $suivant = ""; // On a qu'une page, pas besoin de lien 'Suivant'
  }
  return $suivant;
}
// Fin du script
?>
</body>
</html>
