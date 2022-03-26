package modele;

import com.github.miachm.sods.Range;
import com.github.miachm.sods.Sheet;
import com.github.miachm.sods.SpreadSheet;

import java.util.*;

/** Classe MethodeAlgo */
public class MethodeAlgo {
    SpreadSheet spread;

    /** Constructeur de la classe MethodeAlgo  */
    public MethodeAlgo(SpreadSheet spread) {
        this.spread = spread;
    }

    /** Cette fonction permet de récupérer tous les QID dans une liste de liste */
    public ArrayList<ArrayList<Integer>> liste_donnee(SpreadSheet spread) {
        Sheet sheet_attribut = spread.getSheet(1);
        Sheet sheet_donnees = spread.getSheet(0);

        int nb_id = Bucketiser.nbr_ID(sheet_attribut);
        int nb_qid = Bucketiser.nbr_ID_QID(sheet_attribut);
        ArrayList<ArrayList<Integer>> donnees = new ArrayList<>();
        ArrayList<Integer> arrayList = null;
        for (int j = nb_id; j < nb_qid; j++) {
            arrayList = new ArrayList<>();
            for (int i = 1; i < sheet_donnees.getMaxRows(); i++) {
                Range range = sheet_donnees.getRange(i, j, 1);
                String s = String.valueOf(range.getValue());
                if (!s.equals("null")) {
                    int num = (int) (Double.parseDouble(s));
                    arrayList.add(num);
                }
            }
            donnees.add(arrayList);
        }
        return donnees;
    }

    /** Cette fonction  calcule les fréquences*/
    public HashMap<Integer, Integer> frequences(ArrayList<Integer> liste_donnee) {
        HashMap<Integer, Integer> frequencies = new HashMap<>();
        Set<Integer> set = new LinkedHashSet<>(liste_donnee);
        for (Integer element : set) {
            int frequence_attr = Collections.frequency(liste_donnee, element);
            frequencies.put(element, frequence_attr);
        }

        return frequencies;
    }

    /** Cette fonction permet de calculer la mediane */
    public int mediane(HashMap<Integer, Integer> frequences) {
        int valeur = 0;
        int cle = 0;
        int somme = 0;
        int somme_cle = 0;
        for (Map.Entry value : frequences.entrySet()) {
            valeur = (int) value.getKey();
            cle = (int) value.getValue();
            somme_cle += cle;
            somme += cle * valeur;

        }

        return somme / somme_cle;
    }

    /** Cette fonction verifie si une region est divisible en deux parties  */
    public boolean separable(ArrayList<Integer> list, int k, int mediane) {
        ArrayList<Integer> arrayList = new ArrayList<>();
        ArrayList<Integer> arrayList2 = new ArrayList<>();
        boolean is_separable = true;

        for (Integer integer : list) {
            if (integer <= mediane) {

                arrayList.add(integer);
            } else {

                arrayList2.add(integer);
            }
        }

        if (arrayList.size() < k || arrayList2.size() < k) {
            is_separable = false;
        }

        return is_separable;
    }

    /** Cette fonction récupére tous les éléments plus petit ou égal à la médiane  */
    public ArrayList<Integer> lhs(ArrayList<Integer> arraylist, int mediane) {
        ArrayList<Integer> list = new ArrayList<>();

        for (Integer integer : arraylist) {
            if (integer <= mediane) {
                list.add(integer);
            }

        }
        return list;
    }

    /** Cette fonction récupére tous les éléments plus grand que la médiane  */
    public ArrayList<Integer> rhs(ArrayList<Integer> arraylist, int mediane) {
        ArrayList<Integer> list = new ArrayList<>();

        for (Integer integer : arraylist) {
            if (integer > mediane) {
                list.add(integer);
            }

        }
        return list;
    }

    /** Cette fonction implémente l'algorithme unidimensionnel */
    public ArrayList<ArrayList<Integer>> anonyme(ArrayList<Integer> QID, int k, ArrayList<ArrayList<Integer>> region) {
        HashMap<Integer, Integer> frequences = frequences(QID);
        int mediane = mediane(frequences);

        if (separable(QID, k, mediane)) {
            ArrayList<Integer> lhs = lhs(QID, mediane);
            ArrayList<Integer> rhs = rhs(QID, mediane);
            anonyme(lhs, k, region);

            anonyme(rhs, k, region);

        } else {
            region.add(QID);
        }
        return region;
    }

    /** Cette fonction permet de créer des intervalles */
    public ArrayList<String> intervalle(ArrayList<Integer> QID, ArrayList<ArrayList<Integer>> arrayIntervalle) {
        ArrayList<String> intervalle = new ArrayList<>();
        for (int element : QID) {
            for (ArrayList<Integer> interval : arrayIntervalle) {
                if (interval.contains(element)) {
                    int min = Collections.min(interval);
                    int max = Collections.max(interval);
                    if ( min == max) {
                        intervalle.add(""+min);
                    }
                    else {
                        intervalle.add("[" + min + "-" + max + "]");
                    }
                }
            }
        }
        return intervalle;
    }

    /** Cette fonction permet de créer les intervalles sur tous les QID restants  */
    public SpreadSheet tableau_final(SpreadSheet spread, int num_qid) {
        Sheet sheet_attribut = spread.getSheet(1);
        Sheet sheet_donnees = spread.getSheet(0);

        int nb_id = Bucketiser.nbr_ID(sheet_attribut);
        int nb_id_qid = Bucketiser.nbr_ID_QID(sheet_attribut);
        num_qid = num_qid + nb_id;
        Set<String> ensemble_qid_coupe = new LinkedHashSet<>();
        HashMap<String, ArrayList> liste_valeur = new HashMap<>();

        for (int i = 1; i < sheet_donnees.getMaxRows(); i++) {
            Range range = sheet_donnees.getRange(i, num_qid, 1);
            if (range.getValue() != null) {
                ensemble_qid_coupe.add(String.valueOf(range.getValue()));
            }
        }
        for (String a : ensemble_qid_coupe) {
            liste_valeur.put(a, new ArrayList<Integer>());
        }
        for (String a : ensemble_qid_coupe) {
            for (int i = 1; i < sheet_donnees.getMaxRows(); i++) {
                for (int j = nb_id; j < nb_id_qid; j++) {
                    if (j != num_qid) {
                        Range range = sheet_donnees.getRange(i, num_qid, 1);
                        Range range2 = sheet_donnees.getRange(i, j, 1);
                        if (a.equals(String.valueOf(range.getValue()))) {
                            String s = String.valueOf(range2.getValue());
                            int num = (int) (Double.parseDouble(s));
                            liste_valeur.get(a).add(num);
                        }
                    }
                }
            }
        }
        for (String a : ensemble_qid_coupe) {
            for (int i = 1; i < sheet_donnees.getMaxRows(); i++) {
                for (int j = nb_id; j < nb_id_qid; j++) {
                    if (j != num_qid) {
                        Range range = sheet_donnees.getRange(i, j, 1);
                        Range range2 = sheet_donnees.getRange(i, num_qid, 1);
                        if (a.equals(String.valueOf(range2.getValue()))) {
                            int min = (int) Collections.min(liste_valeur.get(a));
                            int max = (int) Collections.max(liste_valeur.get(a));
                            range.setValue("[" + min + "-" + max + "]");

                        }
                    }
                }
            }
        }

        spread.deleteSheet(1);
        Sheet feuille1 = new Sheet("Feuille2");
        spread.addSheet(feuille1,1);


        return spread;


    }

    /** Cette fonction permet  d'appliquer l'algorithme unidimensionnel sur un jeu de donnée */
    public SpreadSheet unidimensionnel(SpreadSheet spread, int num_qid, int k) {

        ArrayList<ArrayList<Integer>> liste = liste_donnee(spread);
        ArrayList<Integer> arraylist = liste.get(num_qid);
        ArrayList<ArrayList<Integer>> region = new ArrayList<>();
        ArrayList<ArrayList<Integer>> abcd = anonyme(arraylist, k, region);
        ArrayList<String> intervalle = intervalle(arraylist, abcd);
        Sheet sheet_donnee = spread.getSheet(0);
        Sheet sheet_attribut = spread.getSheet(1);
        int qid = Bucketiser.nbr_ID(sheet_attribut) + num_qid;
        int max = sheet_donnee.getMaxRows();
        for (int i = 1; i < max; i++) {
            Range range = sheet_donnee.getRange(i, qid, 1);
            String s = String.valueOf(range.getValue());
            if (!s.equals("null")) {
                String contenu = intervalle.get(i - 1);
                range.setValue(contenu);
            }
        }
        spread = tableau_final(spread,num_qid);
        return spread;
    }

    /** Cette fonction permet de choisir un QID aléatoirement  */
    public int choisir_attribut(ArrayList<ArrayList<Integer>> liste_attribut) {
        Random rand = new Random();
        return ((rand.nextInt(liste_attribut.size())));
    }

    /** Cette fonction récupére tous les éléments plus petit ou égal à la médiane  */
    public ArrayList<ArrayList<Integer>> lhs(ArrayList<ArrayList<Integer>> arraylist,int attributChoisi, int mediane) {
        ArrayList<Integer> list = new ArrayList<>();
        ArrayList<Integer> donnee = arraylist.get(attributChoisi);
        for (Integer integer : donnee) {
            if (integer <= mediane) {
                list.add(integer);
            }
        }
        arraylist.remove(attributChoisi);
        arraylist.add(attributChoisi,list);
        return arraylist;
    }

    /** Cette fonction récupére tous les éléments plus grand que la médiane  */
    public ArrayList<ArrayList<Integer>> rhs(ArrayList<ArrayList<Integer>> arraylist,int attributChoisi, int mediane) {
        ArrayList<Integer> list = new ArrayList<>();
        ArrayList<Integer> donnee = arraylist.get(attributChoisi);
        for (Integer integer : donnee) {
            if (integer > mediane) {
                list.add(integer);
            }

        }
        arraylist.remove(attributChoisi);
        arraylist.add(attributChoisi,list);
        return arraylist;
    }

    /** Cette fonction permet de créer une HashMap <String,Integer> qui correspond au <nom,numéro colonne> */
    public HashMap<String, Integer> choixQID(){
        Sheet sheet_attribut = spread.getSheet(1);
        Sheet sheet_donnees = spread.getSheet(0);
        HashMap<String, Integer> hashlist = new HashMap<String, Integer>();
        int nb_id = Bucketiser.nbr_ID(sheet_attribut);
        int nb_qid = Bucketiser.nbr_ID_QID(sheet_attribut);
        for (int j = nb_id; j < nb_qid; j++) {
            Range range = sheet_donnees.getRange(0, j, 1);
            String s = String.valueOf(range.getValue());
            hashlist.put(s, j-nb_id);
        }
        return hashlist;
    }

    /** Cette fonction implémente l'algorithme multidimensionnel */
    public ArrayList<ArrayList<Integer>> anonyme_multi (ArrayList<ArrayList<Integer>> QID , int k, int attribut, ArrayList<ArrayList<Integer>> region) {

        ArrayList<ArrayList<Integer>> QIDD = new ArrayList<>(QID);
        ArrayList<Integer> donnee = QID.get(attribut);
        HashMap<Integer, Integer> frequences = frequences(donnee);
        ArrayList<ArrayList<Integer>> QI = new ArrayList<>(QID);
        int mediane = mediane(frequences);

        if (separable(donnee, k, mediane)) {
            ArrayList<ArrayList<Integer>> lhs = lhs(QI,attribut,mediane);
            ArrayList<ArrayList<Integer>> rhs = rhs(QIDD ,attribut,mediane);

            anonyme_multi(lhs, k,attribut, region);

            anonyme_multi(rhs, k,attribut, region);

        } else {

            if (QID.size() > 1) {
                QID.remove(attribut);
                attribut = choisir_attribut(QID);
                anonyme_multi(QID,k,attribut,region);
            }
            region.add(donnee);
        }

        return region;
    }

    /** Cette fonction permet de créer des intervalles */
    public ArrayList<ArrayList<String>>  intervalle2 (ArrayList<ArrayList<Integer>> liste_donnee,ArrayList<ArrayList<Integer>> arrayIntervalle) {
        ArrayList<ArrayList<String>> intervalle = new ArrayList<>();

        for (int i = 0 ; i < liste_donnee.size() ; i++ ) {
            intervalle.add(intervalle(liste_donnee.get(i) , arrayIntervalle));
        }

        return intervalle;
    }

    /** Cette fonction permet  d'appliquer l'algorithme multidimensionnel sur un jeu de donnée */
    public SpreadSheet multidimensionnel(SpreadSheet spread, int k) {

        ArrayList<ArrayList<Integer>> liste = liste_donnee(spread);
        ArrayList<ArrayList<Integer>> region = new ArrayList<>();
        int attribut = choisir_attribut(liste);
        ArrayList<ArrayList<Integer>> abcd = anonyme_multi(liste, k,attribut ,region);
        Set<ArrayList<Integer>> liste_sans_doublons = new LinkedHashSet<>(abcd);
        ArrayList<ArrayList<Integer>> arraylist_sd = new ArrayList<>(liste_sans_doublons);
        ArrayList<ArrayList<String>> intervalle = intervalle2(liste,arraylist_sd);
        Sheet sheet_donnee = spread.getSheet(0);
        Sheet sheet_attribut = spread.getSheet(1);
        int max = sheet_donnee.getMaxRows();
        for (int j = 0 ; j < intervalle.size() ; j++) {
            ArrayList<String> intervalle_a = intervalle.get(j);
            int qid = Bucketiser.nbr_ID(sheet_attribut) + j;
            for (int i = 1; i < max; i++) {
                Range range = sheet_donnee.getRange(i, qid, 1);
                String s = String.valueOf(range.getValue());
                if (!s.equals("null")) {
                    String contenu = intervalle_a.get(i - 1);
                    range.setValue(contenu);
                }
            }
        }

        return spread;
    }
}