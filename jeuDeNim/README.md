# PROJET POO ( Jeu de Nim )


## MEMBRES DU GROUPE
* DOUMBOUYA Toumany
* SERGENT Axel


## BUT DU JEU :

Il existe de nombreuses variantes des jeux de Nim dans lesquels deux joueurs jouent à tour de rôle
avec des allumettes, des pièces, des graines ou toute autre type d'objets. On jouera, pour ce projet,
avec des allumettes. En disposant ces allumettes les unes à côtés des autres, on forme un tas
d'allumettes. On peut jouer avec un ou plusieurs tas. Les joueurs vont, chacun leur tour, prendre un
certain nombre d'allumettes ; selon les variantes, le dernier à joueur gagne ou perd. Il y a forcément
un gagnant, et donc un perdant.

Pour le projet, on fixe la disposition initiale des allumettes et les règles du jeu suivantes :
* Une fois défini le nombre de tas qui doit être supérieur ou égal à 1, on dispose un nombre impair d'allumettes par tas de la manière suivante : dans le iième tas, on place 2*i - 1 allumettes.
* A chaque tour, un des joueurs sélectionne une ligne non vide et retire au moins une allumette.
* Le joueur gagnant est celui qui prend la dernière allumette.


## RÉPARTITION DU TRAVAIL PAR CLASSES:

* SERGENT Axel : Contrôleur, Coup.
* DOUMBOUYA Toumany : Ihm, Joueur.
* fait à deux : Constructeur, Tas.


### DÉTAILS DE CHAQUE CLASSE:


#### Classe Contrôleur : 
La classe contrôleur permet de manier le jeu, c’est à dire toutes les mises à jour du jeu, et le faire avancer.
Elle contient les méthodes suivantes :
 
    • AfficheTas() : 
      Appelle une fonction dans la classe Ihm permettant d’afficher les tas.

    • commencerJeu() : 
	Permet de débuter le jeu en demandant le nom des joueurs puis va appeler
la méthode deroulementJeu(Joueur Joueur1, Joueur Joueur2). 

    • deroulementJeu(Joueur Joueur1, Joueur Joueur2) : 
	Déroule le jeu en appelant les méthodes nécessaires qui demandent ce dont le jeu a besoin pour avancer. Il va mettre les variables à jour grâce à ça.

    • fin_partie(Joueur[] tab_joueur, int tour) :
	Est appelé quand une partie est terminé. Elle va du coup appeler une méthode pour demander si on veut rejouer. Elle permet aussi d’appeler une méthode qui affiche les victoires des joueurs.

    • demandeurCoup(Boolean premiere_entree, Joueur joueur) :
	Va faire appelle à une méthode pour demander les informations nécessaires afin de jouer son tour.

    • obtenir_tas(String str_coup, boolean test_msg) : 
      Va récuperer le numéro de tas dans lequel le joueur veut enlever les allumettes.

    • obtenir_alus(String str_coup, boolean test_msg) : 
      Va récuperer le nombre d’allumettes que le joueur veut enlever.

    • appliquer_entrees(boolean test_msg) : 
      Va verifier si les entrées que le joueur a tapé sont valides.
      
#### Classe Constructeur : 
Cette classe va construire le jeu en demandant les informations dont elle a besoin.

Elle contient les méthodes suivantes :

    • construireJeu(): 
	Va faire tous les appels de méthode dont il a besoin pour construire le jeu.

#### Classe Joueur : 
Cette classe permet de récupérer le nom d’un joueur et le nombre de parties gagnées à son actif.
Elle ne contient que des getters pour le nom et le nombre de parties gagnées et un setter pour modifier le nombre de parties gagnées.

#### Classe Coup : 
La classe Coup va faire toutes les vérifications et enregistrer les données permettant d’appliquer un coup.
Elle contient les méthodes suivantes :

    • set_le_tas(String alus) : 
      Va vérifier et enregistrer le numéro de tas que le joueur veut jouer.

    • set_alus_a_retirer(String alus) :
	Va vérifier et enregistrer le nombre d’allumettes que le joueur veut jouer.

    • Vérification_des_contraintes(int[] tab_tas, int contrainte) : 
      Va vérifier si les entrées tapées par le joueur respectent toutes les contraintes.

    • set_class_null() :
      Permet de réinitialiser les valeurs de tas et allumettes en cas de besoin.


#### Classe Tas : 
S’occupe de toutes les mises à jour du tas : construction et modifications du tas.
Elle contient les méthodes suivantes :

    • tabNbAlluTas(int taille) :
      Créer le tableau de int correspondant au nombre d’allumettes par tas.

    • Is_tas_empty() : 
      Vérifie si le tableau d’allumettes est vide signifiant la fin de la partie.

    • enlever_alus(Coup leCoup) :
      Permet d’enlever des allumettes du tas.

    • re_remplir_tab(int nbr_tas) : 
      Re rempli les tas d’allumettes afin de recommencer une partie.
      ( C’est elle qui fait en gros le travail de la méthode Clone() )

#### Classe Ihm :

Cette classe permet à l’utilisateur d’interagir avec le programme ! En utilisant la classe scanner le plus souvent.
Elle contient différentes méthodes qui sont entre autres détaillées ci bas et les getters des attributs de la classe.

    • nombre_tas :
	Récupère le nombre de tas avec lequel les joueurs veulent effectuer leur partie en utilisant un scanner et le stocke dans l’attribut nbre_tas.

    • contrainte : 
            Demande aux joueurs s’il veulent jouer avec des contraintes ou pas sur le nombre d’allumettes qu’ils peuvent retirer au maximum et le stocke dans l’attribut contrainte_nbre_allu.

    • nom_joueur( int num_joueur ) : 
            Demande aux joueurs de rentrer leur noms et les stocke dans les deux variables nom_joueur1 et nom_joueur2.

    • affiche_tas ( int [] tab_tas ) :
            Affiche les allumettes contenus dans chaque tas sous la forme pyramidale avec le numéro du tas correspondant a chaque fois à gauche.

    • demander_coup ( String nom_joueur, boolean première_entrée ) :
 	Prends en paramètre deux attributs le nom du joueur et un boolean qui demande au joueur correspondant d’entrer un coup sous la forme n m où n est le numéro de tas choisi et m le nombre d’allumettes à retirer et le stocke dans une variable coup de type String.

      
    • afficher_gagnant(Joueur joueur) :
      Affiche le nom du gagnant d’une partie
      
    • afficher_victoires(Joueur[] tab_joueur) :
      Une méthode avec deux aspects.
Le programme affiche déjà le nombre de parties gagnées par chaque joueurs et ensuite demande au joueurs s’ils veulent refaire une partie avec les mêmes valeurs si non, la méthode permet au programme d’afficher le nombre de victoires du joueur gagnant et une petite surprise en plus ( voir ci bas ) ; si oui elle retourne true ce qui permettra au programme de relancer une partie.

    • afficher_erreur(int num_erreur) :
      Affiche l’erreur en fonction du numéro d’erreur passé en paramètre


Nous avons effectué un petit rajout au projet pour l’affichage ( notre touche personnelle )
En plus de ces méthodes la classe Ihm contient une classe interne nommé Swing1 qui nous permet d’afficher une petite fenêtre avec une image à la fin du jeu lorsqu’on a un gagnant entre les deux joueurs.
L’implémentation de cette classe Java ne vient malheureusement pas de nous, elle a été prise sur internet, mais nous y avons tout de même effectué quelques modifications
