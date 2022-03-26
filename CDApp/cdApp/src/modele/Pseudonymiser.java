package modele;

import com.github.miachm.sods.Range;
import com.github.miachm.sods.Sheet;
import com.github.miachm.sods.SpreadSheet;

    /** Classe Pseudonymiser */
public class Pseudonymiser {
    SpreadSheet spread;
    /** Constructeur de la classe Pseudonymiser */
    public Pseudonymiser(SpreadSheet spread){
        this.spread = spread;
    }
    /** La fonction encrypter permet de récuperer les identifiants et leur appliquer la fonction pseudo  */
    public void encrypter(){
        Sheet sheet_attribut = spread.getSheet(1);
        Sheet sheet_donnees = spread.getSheet(0);
        int nb_id = nbr_identifiants(sheet_attribut);

        for(int j = 0;j<nb_id;j++){
            for(int i = 1; i < sheet_donnees.getMaxRows(); ++i) {
                Range range = sheet_donnees.getRange(i, j, 1);
                String s  = String.valueOf(range.getValue());
                if (s != null) {
                    String s_crypte = pseudo(s);
                    range.setValue(s_crypte);
                }
            }
        }
    }

    /** Cette fonction permet de calculer le nombre d'identifiants */
    public int nbr_identifiants(Sheet sheet){
        int nb_id = 0;
        for(int i = 1; i < sheet.getMaxRows(); ++i) {
            Range range = sheet.getRange(i, 0, 1);
            String a = (String)range.getValue();
            if (a != null) {
                ++nb_id;
            }
        }
        return nb_id;
    }

    /** La fonction pseudo est une fonction qui prend une chaine de caractères et il lui applique la fonction crypterChar */
    public String pseudo(String mot){
        String mot_crypte = "";
        for (int i = 0; i < mot.length() ; i++) {
            char lettre = mot.charAt(i);
            mot_crypte+=crypterChar(lettre);
        }
        return mot_crypte;
    }

    /** La fonction crypterChar est une fonction qui permet de crypter un caractère */
    public char crypterChar(char lettre){
        //on enleve 97
        int equivalent_entier = lettre-97;
        //on applique le chiffrement
        int nbr_chiffre = ((11*equivalent_entier+8)%26)+97;
        char char_crypte = (char) nbr_chiffre;
        return char_crypte;
    }



}
