package modele;

public class Joueur {
    private String nom;
    private int nbre_partie_gagne = 0;

    public Joueur (String nom) {
        this.nom = nom;
    }


    public String getNom() {
        return nom;
    }

    public int getNbre_partie_gagne() {
        return nbre_partie_gagne;
    }

    public void setNbre_partie_gagne(int nbre_partie_gagne) {
        this.nbre_partie_gagne = nbre_partie_gagne;
    }
}