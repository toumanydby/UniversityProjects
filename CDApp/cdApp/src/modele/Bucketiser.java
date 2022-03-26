package modele;

import com.github.miachm.sods.SpreadSheet;
import com.github.miachm.sods.Range;
import com.github.miachm.sods.Sheet;

import java.util.ArrayList;
import java.util.LinkedHashSet;
import java.util.Set;

/** Classe Bucketiser */
public class Bucketiser {
    SpreadSheet spread;

    /** Constructeur de la classe Bucketiser */
    public Bucketiser(SpreadSheet spread) {
        this.spread = spread;
    }

    /** La fonction Bucket est la fonction qui applique la Bucketisation sur les QID  */
    public SpreadSheet Bucket (int k ){
        Sheet sheet_attribut = spread.getSheet(1);
        int nb_qid = nbr_ID_QID(sheet_attribut);
        Sheet sheet_donnees = spread.getSheet(0);
        SpreadSheet fichier1 =  new SpreadSheet();

        Sheet feuille1 = new Sheet("feuille1");
        fichier1.addSheet(feuille1,0);

        for(int j = 0 ; j < nb_qid; j++){
            feuille1.appendColumn();
            int derniercolumn = feuille1.getLastColumn();
            for (int i = 0 ; i < sheet_donnees.getMaxRows() ; i++){
                feuille1.appendRow();
                Range range = sheet_donnees.getRange(i, j, 1);
                String s  = String.valueOf(range.getValue());
                if ( !s.equals("null")) {
                    Range range1 = feuille1.getRange(i,derniercolumn,1);
                    range1.setValue(s);
                }
            }
        }
        feuille1.trim();

        Range ra = sheet_attribut.getRange("C2");
        String a = String.valueOf(ra.getValue()) ;
        fichier1 = Groupe(k,fichier1,a);
        return fichier1;
    }

    /** La fonction Bucket1 est la fonction qui applique la Bucketisation sur les données sensibles */
    public SpreadSheet Bucket1(int k){
        Sheet sheet_donnees = spread.getSheet(0);
        SpreadSheet fichier1 =  new SpreadSheet();
        Sheet feuille1 = new Sheet("feuille1");
        fichier1.addSheet(feuille1,0);
        feuille1.appendColumn();
        int derniercolumn = feuille1.getLastColumn();
        int derniercol = sheet_donnees.getLastColumn();
        for (int i = 0 ; i < sheet_donnees.getMaxRows() ; i++){
            feuille1.appendRow();
            Range range = sheet_donnees.getRange(i, derniercol-1, 1);
                String s  = String.valueOf(range.getValue());
                if ( !s.equals("null")) {
                    Range range1 = feuille1.getRange(i,derniercolumn,1);
                    range1.setValue(s);
                }
            }

        feuille1.trim();
        fichier1 = Groupe(k,fichier1,"Groupe");
        return fichier1;
    }

    /** La fonction Groupe et la fonction qui crée les groupes dans les données sensibles */
    private SpreadSheet Groupe(int nb_annonyme , SpreadSheet fichier,String nom){
        Sheet feuille = fichier.getSheet(0);
        feuille.appendColumn();
        int max = feuille.getMaxRows();
       int derniercolumn = feuille.getLastColumn();
        int cpt = -1;
        String valeur2 = "G1";
        for ( int i = 0 ; i < max; i++ ){
            feuille.appendRow();
            Range range = feuille.getRange(i, derniercolumn, 1);
            String valeur = "";
            if( cpt==-1 ){
                  valeur = nom;
            }
            else if (nb_annonyme == 1){
                valeur = "G"+(1);
            }
            else {
                if (max%2==0){
                    if (max-(i-1)>nb_annonyme){
                        valeur = "G"+((cpt/nb_annonyme)+1);
                        valeur2 = "G"+((cpt/nb_annonyme)+1);
                    }

                    else{
                        valeur = valeur2;
                    }
                }
                else{
                        if (max-(i-1)>=nb_annonyme){
                            valeur = "G"+((cpt/nb_annonyme)+1);
                            valeur2 = "G"+((cpt/nb_annonyme)+1);
                        }

                        else{
                            valeur = valeur2;
                        }
                }

            }
            range.setValue(valeur);
            cpt++;
        }
        feuille.trim();

        return  fichier;
    }

    /** Cette fonction permet de faire la verification de la l-diversité */
    public boolean l_diversite (SpreadSheet fichier, int l ){
        ArrayList<Integer> nbAno = annonym(fichier);
        Sheet feuille = fichier.getSheet(0);
        int max = feuille.getMaxRows();
        Range r = feuille.getDataRange();
        ArrayList<String> groupe = new ArrayList<String>();
        Set<String> set = new LinkedHashSet<String>();
        int i = 1;
        while(i<max){
            set.clear();
            if (nbAno.size()>0){
                int nb = nbAno.get(0);
                nbAno.remove(0);
                for (int j=1;j<= nb;j++){
                    String s= String.valueOf(r.getCell(i,0).getValue());
                    set.add(s);
                    i++;
                }
                if (set.size()<l)
                    return false;
            }

        }
        return true;
    }


    /** La fonction annonym va créer une liste qui contient le nombre d'élément du même groupe qui se suivent */
    private ArrayList<Integer> annonym (SpreadSheet fichier ){
        Sheet feuille = fichier.getSheet(0);
        int i = 1;
        int k = 0;
        Range r = feuille.getDataRange();
        ArrayList<Integer> nbAno = new ArrayList<Integer>();
        String G1 = String.valueOf(r.getCell(1,1).getValue());
        while (i != feuille.getMaxRows()){
            if (G1.equals(String.valueOf(r.getCell(i,1).getValue()))){
                k++;
                if( i == feuille.getMaxRows()-1)
                    nbAno.add(k);
            }
            else{
                nbAno.add(k);
                k=1;
                G1= String.valueOf(r.getCell(i,1).getValue());
            }
            i++;
        }
        return nbAno;

    }


    /** Cette fonction calcule le nombre des identifiants */
    public static int nbr_ID(Sheet sheet){
        int nb_id = 0;
        for(int i = 1; i < sheet.getMaxRows(); ++i) {
            Range range = sheet.getRange(i, 0, 1);
            String a = (String)range.getValue();
            if (a != null) {
                nb_id=nb_id+1;
            }
        }
        return nb_id;
    }

    /** Cette fonction calcule la somme des identifiants et QID */
    public static int nbr_ID_QID(Sheet sheet){
        int nb_qid = 0;

        for(int i = 1; i < sheet.getMaxRows(); ++i) {
            Range range = sheet.getRange(i, 1, 1);
            String a = (String)range.getValue();
            if (a != null) {
                nb_qid=nb_qid+1;
            }
        }
        return nb_qid+nbr_ID(sheet);
    }
}
