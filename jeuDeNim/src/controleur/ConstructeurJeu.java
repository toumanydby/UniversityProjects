package controleur;
import modele.Tas;
import vue.Ihm;

public class ConstructeurJeu {
    private Ihm ihm;
    private Tas lesTas;

    public ConstructeurJeu(Ihm ihm) {
        this.ihm = ihm;
        this.lesTas = new Tas();
    }

    public void construireJeu() {
        boolean contreIA = false;
        ihm.nombre_tas();
        ihm.contrainte();
        contreIA = ihm.joueur_contre_IA();
        ihm.nom_joueur(1);
        if (!contreIA)
            ihm.nom_joueur(2);
        lesTas.tabNbAlluTas(ihm.getNbre_tas());
    }

    /*public void constructionJeu() {
        int[] tab_test = new int[ihm.getNbre_tas()];

        for (int k = 1 ; k <= ihm.getNbre_tas() ; k++) {
            tab_test[k - 1] = 2 * k - 1;
        }
        lesTas.setTab_tas(tab_test);
    }*/

    public Tas getLesTas() {
        return lesTas;
    }
}
