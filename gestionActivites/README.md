# MEMBRES DU GROUPE
* AMETJAR Yassine
* SYLLA Serigne 
* DOUMBOUYA Toumany
* SOUMAH Abdoulaye


## INITIALISATION DU PROJET
Il faut effectuer une commande **npm run dev** pour que le CSS des differentes pages soit pris en compte.
Dans cette derniere version du projet, on a ignorer notre gitignore pour envoyer le projet en entier.
( Les accents sont ignores dans ce README " ecrit sur un clavier anglais")

### Question 1:
* symfony composer require webpack-encore-bundle
* Insertion des liens
  "<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">"
  "<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>"

### Question 2:
* symfony console make:entity Activity
* symfony console doctrine:database:create
* symfony console make:migration
* symfony console doctrine:migrations:migrate


### Question 3:
* symfony composer require orm-fixtures
* symfony composer require fakerphp/faker
* symfony console make:fixture
* symfony console doctrine:fixture:load

### Question 4:
* symfony console make:crud Activity

### Question 5:
* La barre de navigation a ete ajoute dans le fichier base.html.twig a l'aide d'une navbar de **bootstrap**

### Question 6:
* Il faut telecharger cebe/markdown avec: symfony composer require cebe/markdown
* Ensuite ajouter " cebe\markdown\Markdown: ~ " dans le dossier services.yaml
* Et pour finir modifier le controleur pour qu'il prenne en compte l'ecriture d'une description en markdown et les differentes pages twig correspondantes.


### Question 7:
* symfony console make:user
* symfony console m:mig
* symfony console d:m
* symfony console make:auth
* Modification de public function onAuthenticationSuccess
* symfony console make:registration-form
* Modification de public function getRoles()

### Question 8:
* On modifie l'entite User pour rajouter un nouveau champ qui est une relation de type OneToMany entre les entites User et Activity avec la commande : symfony console make:entity User
* Ensuite on modifie la fixture pour l'adapter aux nouveaux attributs des entites.

### Question 9:
* Rajout de la ligne suivante dans ActivityController et precisement dans la methode new : **$activity->setUser($this->getUser());**

### Question 10:
Ajout des containtes suivantes:
* Un animateur ne peut modifier que ses activites a lui.
* Un animateur ne peut suprimer que ses activites a lui.

### Question 11:
On a juste embellit les differentes pages register et login a l'aide de Webpack et Bootstrap

### Question 12:
Nous avoons commence par rajouter une relation entre les entites User et Activity de type ManyToMany pour que chaque enfant puisse s'inscrire a plusieurs activites et que chaque activite puisse avoir plusieurs enfants inscrits en son nom.
On a ensuite creer les differentes pages lies aux User et on les a modifie pour que nous puissons nous inscrire ou nous desinscrire a des activites.

* Pour s'incrire a une ou plusieurs activites, il suffit de cocher les checkbox correspondant aux activites voulues.
* Pour se desincrire a une ou plusieurs activites, il faut juste decocher les differents checkbox voulus.

En gros les systemes d'inscription et de desinscription sont plutot lies.

### Question 13:
POur l'instant sachant que les Animateurs et les Enfants ne se distinguent pas, on a mis en place le systeme suivant.
* Considerons que vous etes un animateur, pour pouvoir afficher la liste des enfants inscits a une activite, il suffit de cliquer sur l'action **show** qui se trouve a cote de chaque activite pour pouvoir avoir acces a cette liste.
* Ensuite considerons que vous etes un enfant, pour savoir a quelles activites vous etes inscrit, il suffit de cliquer sur le lien de votre page d'accueil ( ce lien ecrit de cette maniere **Cliquer ici pour voir les activites auxquelles vous etes inscrits**) pour afficher un tableau qui comprend les activites auxquelles vous etes inscrit.

### Question 14:
Nous avons embellit les differentes pages du site selon nos gouts en utilisant bootstrap et webpack-encore

### Question 15:
Les differents roles (administateur, animateur et enfant) ont ete introduit au projet et les differents mecanismes ont ete mis a jour en fonction de ces ajouts. Un administrateur ayant le role animateur peut acceder a une page qui a pour route **/admin** ou il peut se permettre de modifier un animateur et seulement un animateur, il ne peut pas modifier un animateur qui est aussi un administrateur, ni un enfant.

### Question 16:
On a effetue une bonne separation des differentes pages et on a aussi effectue une privatisation des acces en fonction du role de l'utilisateur.

### Question 17: 
Le site a ete embellit selon nos gouts avec bootstrap