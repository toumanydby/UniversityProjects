package nim;

import controleur.ConstructeurJeu;
import controleur.ControleurJeu;
import modele.Tas;
import vue.Ihm;

public class JeuNim {

    public static void main(String[] args) {
        Ihm ihm = new Ihm();
        ConstructeurJeu constructeurJeu = new ConstructeurJeu(ihm);
        constructeurJeu.construireJeu();
        Tas lesTas = constructeurJeu.getLesTas();
        ControleurJeu controleurJeu = new ControleurJeu(ihm, lesTas);
        controleurJeu.commencerJeu();
    }
}
