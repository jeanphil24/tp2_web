<?php 
require "classes/panier.class.php";
session_start();
?>
<!DOCTYPE html>
<!--Date de création : 31/05/2019 Créateurs : Simon Paris, Jean-Philippe Proteau-Coulombe-->
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>
      La petite histoire du café - Monsieur café - La référence en java
    </title>
    <link media="screen" rel="stylesheet" href="css/style.css" />
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
  </head>
  <body>
  <header>
      <?php
        include('header.php');
      ?>
    </header>
    <nav>
      <?php
        include('nav.php');
      ?>
    </nav>
    <main>
      <h2>Petite histoire du café</h2>
      <div>
        <img
          id="fleurs-cafe"
          src="images/fleurs-cafe.jpg"
          alt="Arbuste caféier"
          title="Arbuste caféier en fleur"
        />
        <p>
          Le café (de l'arabe القهوة : Elqahwah, boisson stimulante) est une
          boisson énergisante psychotrope stimulante, obtenue à partir des
          graines torréfiées de diverses variétés de caféier, de l'arbuste
          caféier, du genre Coffea. Il fait partie des trois principales
          boissons contenant de la caféine les plus consommées dans le monde,
          avec le thé et le maté.
        </p>
        <p>
          La culture du café est très développée dans de nombreux pays à climat
          tropical d'Amérique, d'Afrique et d'Asie, dans des plantations qui
          sont cultivées pour les marchés d'exportation du commerce
          international. Il représente souvent une contribution majeure pour
          l'économie des pays producteurs.
        </p>
      </div>
      <div>
        <img
          id="carte-cafe"
          src="images/carte-cafe.jpg"
          alt="Carte du monde montrant le nord de l'Afrique"
          title="Carte du nord de l'Afrique"
        />

        <h3>Origine : Éthiopie</h3>
        <p>
          La légende la plus répandue veut qu'un berger d'Abyssinie (actuelle
          Éthiopie), Kaldi, ait remarqué l'effet tonifiant de cet arbuste sur
          les chèvres qui en avaient consommé. Une autre version de la légende
          soutient que ce berger, ayant accidentellement laissé choir une
          branche de cet arbuste sur un poêle, aurait remarqué l'arôme délicieux
          qui s'en dégageait. Il est probable que cette fable, publiée pour la
          première fois à Rome par Antoine Faustus Nairon (Maronite et
          professeur de langues orientales à Rome) en 1671 dans l'un des
          premiers traités sur le café De Saluberrima potione Cahue seu Cafe
          nuncupata Discursus, a été inventée par les Arabes pour accréditer la
          thèse d'un café diffusé dans le Proche orient arabe par les soufis.
          D'ailleurs, un autre récit légendaire attribue la découverte du
          caféier au Cheikh Abou Hassan al-Shâdhili, soufi retiré dans une
          montagne et qui se nourrissait de « l'arbre de café ».
        </p>
        <p>
          En réalité, les études génétiques sur le caféier Coffea arabica
          suggèrent qu'il est probablement originaire d'Éthiopie, dans la
          province de Kaffa où les ancêtres des Oromos consommaient la café sous
          différentes formes (boisson mais aussi aliment). Il y serait connu
          depuis la Préhistoire et n'aurait été transféré qu'au vie siècle, au
          Yémen, dans l'Arabie heureuse, vers le port de Moka.
        </p>
        <p>
          Les paysans du sud-ouest de l’Éthiopie, d'où le café est originaire et
          date peut-être du xe siècle, plus sûrement du xiiie siècle,
          torréfiaient probablement les grains du café dans des braises, les
          broyaient dans une bouillie dans laquelle le café faisait
          originellement office d'épice aux vertus médicinales, à l'instar du
          cacao chez les Aztèques.
        </p>
      </div>
      <h3>Première culture au Yémen (xve siècle)</h3>

      <p>
        La diffusion du café se répand d'abord probablement au xiie siècle ou
        xiiie siècle dans le Yémen, où sa popularité a très certainement profité
        de la prohibition de l'alcool par l'islam. Il est alors appelé K'hawah,
        qui signifie « revigorant », dans les monastères soufis où l'on dispose
        au xve siècle des premières traces attestées de consommation de café
        sous forme de boisson et de la connaissance du caféier14. Les données
        archéologiques disponibles[réf. nécessaire] aujourd’hui suggèrent que le
        café n’aurait pas été domestiqué avant le xve siècle : le processus
        d'élaboration de la boisson, long et complexe, explique peut-être la
        découverte tardive des vertus des graines de caféier, au premier abord
        peu attractives.
      </p>
      <p>
        En 1685, Philippe Dufour15, un marchand d'épices, écrivait « De tous les
        endroits du monde, je ne pense qu'il y en ait d'autre qui produise le
        Café que l'Yémen... Il croît dans des vastes Campagnes tirant vers le
        Midi, sans culture, et point du tout ailleurs. Étant cueilli, on
        l'apporte à Moka, à Louyaya, et autres ports de mer, qui sont le long de
        la mer Rouge, où on le charge sur de petites barques pour Gedda
        (Djeddah)...là on l'embarque, sur des Vaisseaux et sur des Galères, qui
        sont ordinairement destinées pour ce transport, jusqu'à Sués (Suez),
        port de mer à la tête de la mer Rouge, éloigné du Caire d'environ vingt
        et deux lieuës, où l'on en transporte toutes les années sur des chameaux.
        Outre cela, il en vient... par la Caravane qui retourne de Médine avec
        les Pèlerins du Prophète, qui en chargent aussi quatre ou cinq mille
        [balles] sur des Chameaux pour porter à Damas et à Alep ».
      </p>
      <h3>Expansion dans le monde musulman</h3>
      <div>
        <img
          id="femme-cafe"
          src="images/palestinnieneCafe.jpg"
          alt="Femmes palestiniennes moulant le café"
          title="Femmes palestiniennes moulant le café, 1905"
        />
        <p>
          Au XVe siècle, les pèlerins musulmans de retour de La Mecque,
          introduisent le café en Perse et dans les diverses parties de l'Empire
          ottoman, Égypte, Afrique du Nord, Syrie, Turquie. La consommation de
          café s'étendit à l'Égypte.
        </p>
        <p>
          De nombreuses « maisons du café » s'ouvrirent au Caire, à Istanbul et
          à La Mecque au début du XVIe siècle : lieux de convivialité (on y
          jouait aux échecs, au trictrac, on y récitait des poèmes) à prix
          modique, ces maisons permettaient un brassage social, un échange des
          idées. L'émir Khair Bey Mimar, le nouveau gouverneur de La Mecque,
          convoqua une assemblée de juristes et de médecins pour décider si la
          boisson était conforme au Coran, qui interdit toute forme
          d’intoxication16. Après qu'un opposant au café, l'eut déclaré aussi «
          enivrant » que le vin, l'assemblée des interprètes des Saintes
          Écritures très prudemment jugèrent que celui-ci avait dû boire du vin
          pour le savoir et devait donc recevoir une bastonnade et que pour le
          reste, ils s'en remettaient aux médecins. Quand ceux-ci reconnurent la
          toxicité du café, le gouverneur en interdit la consommation sous peine
          de punitions sévères.
        </p>
        <p>
          Mais le sultan du Caire, ayant appris l'interdiction, s'en émut et
          déclara que d'après ses docteurs et lettrés, le café était tout à fait
          bon pour la santé et agréable à Allah. Au cours du siècle à plusieurs
          reprises, comme en 1525 et 1534, les controverses sur le caractère
          diabolique du café réapparurent et les persécutions contre les buveurs
          de café reprirent.
        </p>
        <p>
          Le succès du caffé de Moka gagna ensuite la Grèce et surtout
          Constantinople, après la conquête de La Mecque et l'Égypte, en
          1516-1517, par le sultan ottoman Selim Ier. À Constantinople,
          l'ouverture des deux premiers cafés publics par les Syriens, Schems et
          Hekem, eut lieu en 1554-1555 sous Soliman le Magnifique. « Ces
          établissements étaient fréquentés par la plupart des savants, des
          juges, des professeurs, des derviches... Les Turcs s'adonnèrent avec
          fureur à l'usage de cette boisson, et la capitale fut bientôt remplie
          de Kawha-Kanés, où l'on distribuait le Café » (Coubard d'Aulnay17
          1843). Mais là aussi des controverses se firent jour et des opposants
          prétendirent que « le café grillé était un charbon et que tout ce qui
          avait rapport au charbon était défendu par Mahomet. ».
        </p>
      </div>
    </main>

    <footer>
      <?php
        include('footer.php');
      ?>
    </footer>
  </body>
</html>
