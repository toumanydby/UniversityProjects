package vue;
import controleur.ConstructeurJeu;
import controleur.ControleurJeu;
import modele.Joueur;
import modele.Tas;

import javax.swing.*;
import java.awt.*;
import java.util.Scanner;

public class Ihm {

    private ConstructeurJeu construire_jeu;
    private ControleurJeu constroleur_jeu;
    private int nbre_tas;
    private int contrainte_nbre_allu;
    private String nom_joueur1;
    private String nom_joueur2;
    private boolean vsIA;


    public Ihm () {
    }

    /* SAISIE DU NOMBRE DE TAS */
    public void nombre_tas () {
        System.out.println("BIENVENUE AU JEU DE NIM ! \nPour commencer vous devez entrer le nombre de tas avec lequel vous souhaiter jouer !");
        Scanner sc = new Scanner(System.in);
        nbre_tas = -1 ;
        do {
            System.out.println("Entrez le nombre de tas");
            if (sc.hasNextInt()){
                nbre_tas=sc.nextInt();
                if (nbre_tas <= 0) {
                    System.out.println("Saisie incorrecte. L'entier doit être positif et supérieur à 0");
                }
            }
            else {
                System.out.println("Saisie incorrecte. Merci d'entrer un entier");
                sc.next();
            }
        } while ((nbre_tas <= 0));

    }
    /* CONTRAINTES OU PAS */
    public void contrainte() {
        System.out.println("Souhaiter vous jouer avec une contrainte sur le nombre maximum d'allumettes que l'on peut retirer à chaque coup ? \nSi oui veuillez saisir un entier positif correspondant à ce nombre sinon taper 0 !");
        Scanner sc = new Scanner(System.in);
        contrainte_nbre_allu = -1;
        do {
            if (sc.hasNextInt()){
                contrainte_nbre_allu=sc.nextInt();
                if (contrainte_nbre_allu < 0) {
                    System.out.println("Saisie incorrecte. L'entier doit être positif");
                }
            }
            else {
                System.out.println("Saisie incorrecte. Merci d'entrer un entier");
                sc.next();
            }
        } while ((contrainte_nbre_allu < 0));

    }

    public boolean joueur_contre_IA() {
        String joueur_vs_IA;
        Scanner sc = new Scanner(System.in);

        System.out.println("Souhaitez-vous jouer contre l'intelligence artificielle ? Tapez oui ou non.");
        do {
            joueur_vs_IA = sc.next();
            if (!joueur_vs_IA.equals("oui") && !joueur_vs_IA.equals("non")) {
                System.out.println("Veuillez taper oui ou non");
            }
        } while (!joueur_vs_IA.equals("oui") && !joueur_vs_IA.equals("non"));
        if (joueur_vs_IA.equals("oui")) {
            vsIA = true;
            nom_joueur2 = "IA";
        }
        else
            vsIA = false;
        return vsIA;
    }

    /* SAISIE DES NOMS DES JOUEURS */
    public String nom_joueur (int num_joueur) {
        Scanner sc = new Scanner(System.in);
        System.out.println ("Joueur " + num_joueur + ", veuillez saisir votre nom !");
        if (num_joueur == 1) {
            nom_joueur1 = sc.nextLine();
            if(vsIA == true) {
                System.out.println("La partie peut commencer !");
            }
            return nom_joueur1;
        }
        else if (num_joueur == 2) {
            nom_joueur2 = sc.nextLine();
            System.out.println("La partie peut commencer !");
            return nom_joueur2;
        }
        else return "Erreur au niveau du numéro de joueurs";

        /* AFFICHAGE DE L'ETAT INITIAL DE LA PARTIE */
    }

    //Fonction qui permet d'afficher correctement les tas
    public void afficher_tas(int[] tab_tas) {
        // [1, 3, 5, 7]
        for (int k = 0 ; k < tab_tas.length ; k++) { //[1, 3, 5, 7] -> 4
            System.out.print(k + 1 + " ");
            for (int i = 0 ; i < tab_tas.length * 2 - 1 ; i++) {  // 4 * 2 - 1 = 7
                if (i < tab_tas.length - k - 1) {   // 0 < 3   1 < 3   2 < 3   3 < 3 - > faux
                    System.out.print(' ');
                }
                else if (i >= tab_tas.length - k - 1 && i < tab_tas[k] + tab_tas.length - k - 1) {
                    System.out.print('|');
                }
                else { //quand toutes les allumettes dans le tas k sont mises on arrete la boucle pour ne pas en afficher plus
                    break;
                }
            }
            System.out.println();
        }
        System.out.println();
    }

    public String demander_coup(String nom_joueur, boolean premiere_entree) {
        Scanner sc = new Scanner(System.in);
        String coup = null;
        if (premiere_entree && nom_joueur.equals(nom_joueur1) || !vsIA) {
            System.out.println(nom_joueur + " : à vous de jouer un coup sous la forme 'm n' où m est le tas choisi" +
                    " et n le nombre d'allumettes à retirer dans ce tas : ");
        }
        if (nom_joueur.equals(nom_joueur1) || !vsIA) {
            coup = sc.nextLine();
        }
        else {
            System.out.println(nom_joueur2 + " joue " + coup);
        }
        return coup;
    }

    public void annonce_coup_IA(int num_tas, int nbr_alus) {
        System.out.println("IA joue : " + num_tas + " " + nbr_alus);
    }

    public void afficher_gagnant(Joueur joueur) {
        System.out.println("Victoire de " + joueur.getNom() + " ! félicitation !");
    }

    public boolean afficher_victoires(Joueur[] tab_joueur) {
        Scanner sc = new Scanner(System.in);
        String test_fin;
        long temps_depart = System.currentTimeMillis();
        long duree = 10000;

        System.out.println(tab_joueur[0].getNom() + "-> " + tab_joueur[0].getNbre_partie_gagne());
        System.out.println(tab_joueur[1].getNom() + "-> " + tab_joueur[1].getNbre_partie_gagne());
        System.out.println("Souhaitez vous rejouer ? Si oui vous taper n'importe quelle touche sinon taper q pour quitter");
        test_fin = sc.next();
        if (test_fin.equals("q")) {
            if (tab_joueur[0].getNbre_partie_gagne() > tab_joueur[1].getNbre_partie_gagne()) {
                System.out.println(tab_joueur[0].getNom() + " a gagné ! tu as gagné....roulement de tambour....." +
                        " rien du tout ! Avec ça tu pourras t'acheter exactement rien !");
                new swing1();
                while((System.currentTimeMillis() - temps_depart) < duree) {}
                java.lang.System.exit(0);
            }
            else if (tab_joueur[0].getNbre_partie_gagne() == tab_joueur[1].getNbre_partie_gagne()) {
                System.out.println("Egalité parfaite quel match d'anthologie !! les deux joueurs vont devoir se " +
                        " partager la récompense !");
                java.lang.System.exit(0);
            }
            else {
                System.out.println(tab_joueur[1].getNom() + " a gagné ! tu as gagné....roulement de tambour....." +
                        "rien du tout !\nAvec ça tu pourras t'acheter exactement rien !");
                JFrame frame = new swing1();
                while((System.currentTimeMillis() - temps_depart) < duree) {}
                java.lang.System.exit(0);
            }
        }
        return true;
    }

    public void afficher_erreur(int num_erreur) {
        switch (num_erreur) {
            case 1 -> System.out.println("Vous n'avez pas tapé une entrée valide, tapez sous la forme 'm n' : ");
            case 2 -> System.out.println("Vous avez entré un nombre d'allumettes à enlever négatif ou nul veuillez entrer un nombre positif");
            case 3 -> System.out.println("Vous avez entré un numéro de tas trop élevé, veuillez taper un nombre inférieur au nombre total des tas : ");
            case 4 -> System.out.println("Vous avez tapé un numero de tas négatif ou nul veuillez taper un nombre positif : ");
            case 5 -> System.out.println("Vous n'avez pas respecté la contraintre veuillez taper un nombre d'alumettes à enlever moins elevé : ");
            case 6 -> System.out.println("Vous avez entré un nombre d'allumettes trop élevé, veuillez taper un nombre moins elevé : ");
        }
    }

    public int getContrainte_nbre_allu() {
        return contrainte_nbre_allu;
    }
    public String getNom_joueur1() {
        return nom_joueur1;
    }
    public String getNom_joueur2() {
        return nom_joueur2;
    }

    public int getNbre_tas() {
        return nbre_tas;
    }

    public boolean isVsIA() {
        return vsIA;
    }

    public class swing1 extends JFrame {
        /**
         *
         */
        private static final long serialVersionUID = 1L;
        JPanel contentPane;
        JLabel imageLabel = new JLabel();
        JLabel headerLabel = new JLabel();

        public swing1() {
            afficher();
        }

        public void afficher() {
            setDefaultCloseOperation(EXIT_ON_CLOSE);
            contentPane = (JPanel) getContentPane();
            contentPane.setLayout(new BorderLayout());
            setSize(new Dimension(500, 500));
            setTitle("Victory");
            contentPane.add(headerLabel, java.awt.BorderLayout.NORTH);
            ImageIcon ii = new ImageIcon(this.getClass().getResource("victoire.gif"));
            imageLabel.setIcon(ii);
            contentPane.add(imageLabel);

            this.setLocation(600, 200);// position de la fenêtre
            this.setVisible(true);

        }
    }

}

