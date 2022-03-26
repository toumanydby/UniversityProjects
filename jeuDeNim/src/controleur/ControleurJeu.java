package controleur;

import modele.Coup;
import modele.Joueur;
import modele.Tas;
import vue.Ihm;

public class ControleurJeu {
    private Ihm ihm;
    private Tas lesTas;
    private Coup leCoup;

    public ControleurJeu (Ihm ihm, Tas lesTas) {
        this.ihm = ihm;
        this.lesTas = lesTas;
        this.leCoup = new Coup();
    }


    public void AfficheTas() {
        ihm.afficher_tas(lesTas.getTab_tas());
    }

    public void commencerJeu () {
        boolean rejouer = true;
        Joueur joueur1 = new Joueur(ihm.getNom_joueur1());
        Joueur joueur2 = new Joueur(ihm.getNom_joueur2());

        while (rejouer) {
            AfficheTas();
            rejouer = deroulementJeu(joueur1, joueur2);
            lesTas.re_remplir_tab(ihm.getNbre_tas());
        }
    }

    public boolean deroulementJeu(Joueur joueur1, Joueur joueur2) {
        String str_coup;
        boolean premiere_entree = true;
        boolean test_msg = false;
        Joueur[] tab_joueurs = new Joueur[]{joueur1, joueur2};
        int tour = 0;
        boolean rejouer = true;

        while (!lesTas.is_tas_empty()) {
            if(!ihm.isVsIA() || tour % 2 == 0) {
                do {
                    str_coup = demandeurCoup(premiere_entree, tab_joueurs[tour % 2]);
                    leCoup = obtenir_tas(str_coup);
                    if (leCoup.getNumero_tas() == -1)
                        test_msg = true;
                    leCoup = obtenir_alus(str_coup, test_msg);
                    if (leCoup.getNbre_allu_retire() == -1)
                        test_msg = true;
                    if (leCoup.getNumero_tas() == -1 || leCoup.getNbre_allu_retire() == -1)
                        leCoup.set_class_null();
                    leCoup = appliquer_entrees();
                    premiere_entree = false;
                    test_msg = false;
                } while (leCoup.getNumero_tas() <= 0 || leCoup.getNbre_allu_retire() <= 0);
                lesTas.enlever_alus(leCoup);
            }
            else {
                Coup coup_IA = deroulement_IA();
                lesTas.enlever_alus(coup_IA);
                ihm.annonce_coup_IA(coup_IA.getNumero_tas(), coup_IA.getNbre_allu_retire());
            }
            AfficheTas();
            tour++;
            premiere_entree = true;
        }
        rejouer = fin_partie(tab_joueurs, tour);
        return rejouer;
    }

    public Coup deroulement_IA() {
        int XOR = calculXOR();

        return (calcul_meilleur_coup(XOR));
    }

    public int calculXOR() {
        int [] tab_test = lesTas.getTab_tas();
        int contraintes = ihm.getContrainte_nbre_allu();

        int XOR;
        if (contraintes != 0) {
            XOR = tab_test[0] % (contraintes + 1);

            for (int k = 1 ; k < tab_test.length ; k++) {
                XOR = XOR^(tab_test[k] % (contraintes + 1));
            }

        } else {
            XOR = tab_test[0];
            for (int k = 1; k < tab_test.length; k++) {
                XOR = XOR ^ tab_test[k];
            }
        }

        return XOR;
    }

    public Coup coup_sans_contrainte(int XOR) {
        int alus_a_laisser;
        int alus_a_retirer;
        int[] tab_test = lesTas.getTab_tas();
        Coup coup_IA = new Coup();

        for (int k = 0 ; k < lesTas.getTab_tas().length ; k++) {
            alus_a_laisser = XOR ^ tab_test[k];
            if (alus_a_laisser < tab_test[k]) {
                alus_a_retirer = tab_test[k] - alus_a_laisser;
                coup_IA.setNumero_tas(k + 1);
                coup_IA.setNbre_allu_retire(alus_a_retirer);
                break;
            }
        }
        return (coup_IA);
    }

    public Coup coup_avec_contrainte(int XOR) {
        int alus_a_laisser;
        int alus_a_retirer;
        int[] tab_test = lesTas.getTab_tas();
        Coup coup_IA = new Coup();

        for (int k = 0 ; k < tab_test.length ; k++) {
            alus_a_laisser = (tab_test[k] ^ XOR) % (ihm.getContrainte_nbre_allu() + 1);
            if (alus_a_laisser < tab_test[k]) {
                alus_a_retirer = (tab_test[k] - alus_a_laisser) % (ihm.getContrainte_nbre_allu() + 1);
                coup_IA.setNumero_tas(k + 1);
                coup_IA.setNbre_allu_retire(alus_a_retirer);
                return (coup_IA);
            }
        }
        return (coup_IA);
    }

    public Coup calcul_meilleur_coup(int XOR) {
        int[] tab_test = lesTas.getTab_tas();
        Coup coup_IA = new Coup();

        if (XOR == 0) {
            for (int i = 0 ; i < lesTas.getTab_tas().length ; i++) {
                if(tab_test[i] > 0) {
                    coup_IA.setNumero_tas(i + 1);
                    coup_IA.setNbre_allu_retire(1);
                    return(coup_IA);
                }
            }
        }
        if (ihm.getContrainte_nbre_allu() == 0)
            coup_IA = coup_sans_contrainte(XOR);
        else
            coup_IA = coup_avec_contrainte(XOR);
        return(coup_IA);
    }

    public boolean fin_partie(Joueur[] tab_joueur, int tour) {
        boolean rejouer;

        tab_joueur[(tour + 1) % 2].setNbre_partie_gagne(tab_joueur[(tour + 1) % 2].getNbre_partie_gagne() + 1);
        ihm.afficher_gagnant(tab_joueur[(tour + 1) % 2]);
        rejouer = ihm.afficher_victoires(tab_joueur);
        return rejouer;
    }

    public String demandeurCoup(boolean premiere_entree, Joueur joueur) {
        String str_coup;

        if (premiere_entree)
            str_coup = ihm.demander_coup(joueur.getNom(), true);
        else
            str_coup = ihm.demander_coup(joueur.getNom(), false);
        return str_coup;
    }

    public Coup obtenir_tas(String str_coup) {
        if(!leCoup.set_le_tas(str_coup)) {
            leCoup.set_class_null();
            ihm.afficher_erreur(1);
        }
        return leCoup;
    }

    public Coup obtenir_alus(String str_coup, boolean test_msg) {

        if(!leCoup.set_alus_a_retirer(str_coup) && !test_msg) {
            leCoup.set_class_null();
            ihm.afficher_erreur(1);
        }
        return leCoup;
    }

    public Coup appliquer_entrees() {
        int erreur = leCoup.verification_des_contraintes(lesTas.getTab_tas(), ihm.getContrainte_nbre_allu());
        if(erreur != 0) {
            leCoup.set_class_null();
            ihm.afficher_erreur(erreur);
        }
        return leCoup;
    }


}