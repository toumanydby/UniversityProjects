package modele;

import controleur.ConstructeurJeu;

import java.util.Arrays;

public class Tas {
    private int [] tab_tas;
    private ConstructeurJeu constructeurJeu;

    public Tas() {
    }


    public void tabNbAlluTas(int taille) {
        tab_tas = new int [taille];

        for (int i = 1 ; i <= tab_tas.length ; i++) {
            tab_tas[i - 1] = 2 * i - 1 ;
        }

    }

    public boolean is_tas_empty() {
        for (int k = 0 ; k < tab_tas.length ; k++) {
            if (tab_tas[k] != 0)
                return false;
        }
        return true;
    }

    public void enlever_alus(Coup leCoup) {
        tab_tas[leCoup.getNumero_tas() - 1] -= leCoup.getNbre_allu_retire();
    }

    public void re_remplir_tab(int nbr_tas) {
        for (int k = 1 ; k <= tab_tas.length ; k++) {
            tab_tas[k - 1] = 2 * k - 1;
        }
    }

    public int[] getTab_tas() {
        return tab_tas;
    }

    public void setTab_tas(int[] tab_tas) {
        this.tab_tas = tab_tas;
    }

    /*
        @Override
    public String toString() {
        return "Tas{" +
                "tab_tas=" + Arrays.toString(tab_tas) +
                '}';
    }

     */
}

