package modele;

public class Coup {
    private int numero_tas;
    private int nbre_allu_retire;

    public Coup () {
    }

    public boolean set_le_tas(String alus) {
        try {
            String num_tas_a_sup = alus.substring(0,alus.indexOf(" "));
            numero_tas = Integer.parseInt(num_tas_a_sup);
            return true;
        } catch (NumberFormatException | NullPointerException | StringIndexOutOfBoundsException nfe) {
            return false;
        }
    }
    public boolean set_alus_a_retirer(String alus) {
        try {
            String nbr_alus_a_sup = alus.substring(alus.indexOf(" ") + 1);
            nbre_allu_retire = Integer.parseInt(nbr_alus_a_sup);
            return true;
        } catch (NumberFormatException | NullPointerException | StringIndexOutOfBoundsException nfe ) {
            return false;
        }
    }

    public int verification_des_contraintes(int[] tab_tas, int contrainte) {
        if (nbre_allu_retire <= 0)
            return (2);
        if (numero_tas > tab_tas.length)
            return(3);
        if (numero_tas <= 0)
            return(4);
        if (nbre_allu_retire > contrainte && contrainte != 0)
            return(5);
        if(nbre_allu_retire > tab_tas[numero_tas - 1])
            return(6);
        return(0);
        /*return numero_tas <= tab_tas.length && numero_tas > 0 && nbre_allu_retire > 0 &&
                (nbre_allu_retire <= contrainte || contrainte == 0)
                && nbre_allu_retire <= tab_tas[numero_tas - 1];*/
    }

    public int getNumero_tas() {
        return numero_tas;
    }

    public int getNbre_allu_retire() {
        return nbre_allu_retire;
    }

    public void set_class_null() {
        numero_tas = -1;
        nbre_allu_retire = -1;
    }

    public void lancer_coup(String str_coup) {

    }

    public void setNumero_tas(int numero_tas) {
        this.numero_tas = numero_tas;
    }

    public void setNbre_allu_retire(int nbre_allu_retire) {
        this.nbre_allu_retire = nbre_allu_retire;
    }
}
