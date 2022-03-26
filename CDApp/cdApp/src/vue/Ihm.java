package vue;

import com.github.miachm.sods.Range;
import com.github.miachm.sods.Sheet;
import com.github.miachm.sods.SpreadSheet;

import com.sbix.jnotify.NPosition;
import com.sbix.jnotify.NoticeType;
import com.sbix.jnotify.NoticeWindow;
import modele.Bucketiser;
import modele.MethodeAlgo;
import modele.Pseudonymiser;


import javax.imageio.ImageIO;
import javax.swing.*;
import javax.swing.filechooser.FileFilter;
import javax.swing.filechooser.FileNameExtensionFilter;
import java.awt.*;
import java.awt.event.ActionEvent;
import java.io.*;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.Map;
import java.util.zip.ZipEntry;
import java.util.zip.ZipOutputStream;

/** Classe Ihm */
public class Ihm extends JFrame {

    /**Bouton Charger fichier */
    MyButton button_ajout = new MyButton("Charger Fichier");
    /**Bouton Téléharger fichier */
    MyButton button_telechargement = new MyButton("Télécharger Fichier");
    /**Nom fichier */
    JLabel label_char = new JLabel("Aucun Fichier Chargé");
    /**Bouton Visualiser fichier */
    MyButton button_visualiser = new MyButton("Visualiser");
    /**Bouton Bucketiser fichier */
    MyButton button_bucketiser = new MyButton("Bucketiser");
    /**Bouton L-diversité fichier */
    MyButton button_ldiversite = new MyButton("Ldiversité");
    /**Bouton Algorithme 1 fichier */
    MyButton button_algorithme1 = new MyButton("Algorithme1");
    /**SpreadSheet */
    SpreadSheet spread = new SpreadSheet();
    /**SpreadSheet */
    SpreadSheet spread1 = new SpreadSheet();



    /** Fichier Charger */
    File fichierCharge;
    /** Constructeur de la Classe IHM  */
    public Ihm() {
        super("CRYPTER");
        this.setDefaultCloseOperation(2);
        this.setSize(800, 600);
        this.setMaximumSize(new Dimension(800,600));
        this.setLocationRelativeTo((Component)null);
        JPanel contentPane = (JPanel)this.getContentPane();
        //contentPane.setLayout(new FlowLayout());
        //Titre
        contentPane.add(titre(),BorderLayout.NORTH);
        //Contenu,lecture fichier
        contentPane.add(lecturefichier(),BorderLayout.CENTER);
        button_ajout.addActionListener(this::button_ajout_listener);
        button_telechargement.addActionListener((this::button_telechargement_listener));
        button_visualiser.addActionListener((this::button_visualiser_listener));
        // bouttons qui effectuent les anonymisations
        contentPane.add(button_fonction(),BorderLayout.SOUTH);
        button_bucketiser.addActionListener(this::bucketiser);
        button_ldiversite.addActionListener(this::ldiversite);
        button_algorithme1.addActionListener(this::algorithme1);
    }
    /** JPanel qui contient le titre */
    JPanel titre(){
        JPanel contenant_titre = new JPanel();
        contenant_titre.setLayout(new GridBagLayout());
        contenant_titre.setPreferredSize(new Dimension(800,100));
        contenant_titre.setBackground(new Color(27, 79, 114));
        JLabel titre = new JLabel("CRYPTER");
        titre.setFont(new Font( "Serif", Font.BOLD, 40));
        titre.setForeground(Color.white);
        contenant_titre.add(titre);
        return contenant_titre;
    }
    /** JPanel qui contitent les boutons de fonctionnement (Bouton Charger) (Bouton Télécharger) (Bouton Visualiser)   */
    JPanel lecturefichier(){
        JPanel lecturefichier = new JPanel();
        lecturefichier.setLayout(new BoxLayout(lecturefichier, BoxLayout.Y_AXIS));
        JPanel partieAjoutFichier = new JPanel(new FlowLayout());
        JPanel partieTelechargementFichier = new JPanel(new FlowLayout());
        partieAjoutFichier.setBorder(BorderFactory.createEmptyBorder(100,0,0,0));
        partieTelechargementFichier.setBorder(BorderFactory.createEmptyBorder(0,0,0,0));
        lecturefichier.add(partieAjoutFichier);
        lecturefichier.add(partieTelechargementFichier);
        //On créer les deux buttons
        Image imgCharge = null;
        Image imgDown = null;
        Image visu = null;
        try {
            imgCharge = ImageIO.read(getClass().getResource("/icons.png"));
            imgDown = ImageIO.read(getClass().getResource("/down.png"));
            visu = ImageIO.read(getClass().getResource("/icons8-ophthalmology-24.png"));
        } catch (IOException e) {
            e.printStackTrace();
        }
        int gapSize = button_ajout.getIconTextGap();
        button_ajout.button_fonction_lecture();
        button_ajout.setIcon(new ImageIcon(imgCharge));
        button_ajout.setIconTextGap(25);

        button_telechargement.button_fonction_lecture();
        button_telechargement.setIcon(new ImageIcon(imgDown));
        button_telechargement.setIconTextGap(25);

        button_visualiser.button_fonction_lecture();
        button_visualiser.setIcon(new ImageIcon(visu));
        button_visualiser.setIconTextGap(25);
        // on crée les deux labels

        label_char.setPreferredSize(new Dimension(200,40));
        partieAjoutFichier.add(button_ajout);
        partieAjoutFichier.add(Box.createHorizontalStrut(140));
        partieAjoutFichier.add(label_char);

        partieTelechargementFichier.add(button_telechargement);
        partieTelechargementFichier.add(Box.createHorizontalStrut(140));
        partieTelechargementFichier.add(button_visualiser);

        return lecturefichier;
    }
    /** JPanel qui contitent les boutons d'annonymisation  */
    JPanel button_fonction(){
        JPanel lesFonctions = new JPanel(new GridLayout(1, 3,10,10));
        lesFonctions.setPreferredSize(new Dimension(800,100));
        lesFonctions.setBorder(BorderFactory.createEmptyBorder(10,10,  10, 10));
        lesFonctions.add(button_bucketiser);
        button_bucketiser.button_fonction_font();
        lesFonctions.add(button_ldiversite);
        button_ldiversite.button_fonction_font();
        lesFonctions.add(button_algorithme1);
        button_algorithme1.button_fonction_font();
        return lesFonctions;
    }
    /** Cette fonction permet de charger un fichier */
    private void button_ajout_listener(ActionEvent e){
        if(e.getSource() == button_ajout){
            JFileChooser fc = new JFileChooser();
            fc.setFileSelectionMode(JFileChooser.FILES_ONLY);
            FileFilter odsFilter = new FileNameExtensionFilter("Feuille de calcul OpenDocument","ods");
            fc.setDialogTitle("Choisissez un fichier");
            fc.setFileFilter(odsFilter);
            int returnVal = fc.showOpenDialog(Ihm.this);

            if (returnVal == JFileChooser.APPROVE_OPTION ){
                fichierCharge = fc.getSelectedFile();
                label_char.setText(fichierCharge.getName());
            }
            else{
            }
        }
    }
    /** Cette fonction permet de saisir la variable K d'annonymisation */
    private int choix_du_k(ActionEvent e){
        Boolean saisie_correcte = false;
        int k=-1;
        while(!saisie_correcte){
            try{
                String value_string = JOptionPane.showInputDialog("Choisissez un entier k pour la K-anonymisation");
                if (value_string==null){
                    break;
                }
                else{
                    int value = Integer.valueOf(value_string);

                    k =  value;
                    saisie_correcte = true;
                }


            }catch (NumberFormatException ex){
            }
        }
        return k;
    }
    /** Cette fonction appelle les deux fonction pseudonymiser et Bucketiser */
    private void bucketiser(ActionEvent e) {
        try {
            String filename = fichierCharge.getAbsolutePath();
            spread = new SpreadSheet(new File(filename));
            Pseudonymiser pseudonymiser = new Pseudonymiser(spread);
            pseudonymiser.encrypter();
           Bucketiser bucket = new Bucketiser(spread);
            int k = choix_du_k(e);
            if (k == -1 ) {

            }
            else if (k  <= 0){
                JOptionPane.showMessageDialog(this,"faut mettre un chiffre supérieur 0","Verification K-annonymisation",JOptionPane.INFORMATION_MESSAGE);

            }
            else {

                spread = bucket.Bucket(k);
                spread1 = bucket.Bucket1(k);
                Sheet feuille1 = spread.getSheet(0);
                Sheet feuille2 = spread1.getSheet(0);
                NoticeWindow  n = new NoticeWindow(NoticeType.SUCCESS_NOTIFICATION,"Bucketisation terminée",NoticeWindow.SHORT_DELAY, NPosition.BOTTOM_RIGHT);

            }
        }
        catch (IndexOutOfBoundsException f){
            JOptionPane.showMessageDialog(this,"Veuillez inserer un fichier avec un bon format","Verification d'insertion",JOptionPane.INFORMATION_MESSAGE);

        }
        catch (Exception f) {
            JOptionPane.showMessageDialog(this,"Veuillez inserer un fichier","Verification d'insertion",JOptionPane.INFORMATION_MESSAGE);
            f.printStackTrace();
        }
    }
    /** Cette fonction permet de télécharger le fichier de sortie */
    private void button_telechargement_listener (ActionEvent e ){
        try {
            if (spread1 == null){

                File fichierMethodeAlgo = new File(fichierCharge.getParentFile().getAbsolutePath(),"MethodeAlgo1.ods");
                spread.save(fichierMethodeAlgo);
            }
            else {
                ArrayList<File> srcFiles = new ArrayList<>();
                File fichierQID = new File(fichierCharge.getParentFile().getAbsolutePath(),"QID.ods");
                File fichierDS = new File(fichierCharge.getParentFile().getAbsolutePath(),"DS.ods");
                spread.save(fichierQID);
                spread1.save(fichierDS);
                srcFiles.add(fichierQID);
                srcFiles.add(fichierDS);
                File bucket = new File(fichierCharge.getParentFile().getAbsolutePath(),"Bucket.zip");
                String chemin_bucket = bucket.getAbsolutePath();
                bucket.delete();
                FileOutputStream fos = new FileOutputStream(chemin_bucket);
                ZipOutputStream zipOut = new ZipOutputStream(fos);
                for (File fileToZip : srcFiles) {
                    FileInputStream fis = new FileInputStream(fileToZip);

                    ZipEntry zipEntry = new ZipEntry(fileToZip.getName());
                    zipOut.putNextEntry(zipEntry);



                    byte[] bytes = new byte[1024];
                    int length;
                    while((length = fis.read(bytes)) >= 0) {
                        zipOut.write(bytes, 0, length);
                    }
                    fis.close();

                }
                zipOut.close();
                fos.close();
            for (File srcFile : srcFiles) {
                File file = new File(String.valueOf(srcFile));
                if ((file.delete())) {

                } else {
                    System.out.println("Failed to delete the file");
                }
            }
            }
                NoticeWindow  n = new NoticeWindow(NoticeType.SUCCESS_NOTIFICATION,"Fichier Télécharger",NoticeWindow.NORMAL_DELAY, NPosition.BOTTOM_RIGHT);
        }
        catch (Exception f) {
            JOptionPane.showMessageDialog(this,"Insérer un fichier","Verification d'insertion",JOptionPane.INFORMATION_MESSAGE);
            f.printStackTrace();
        }

    }
    /** Cette fonction permet de visualiser le fichier de sortie */
    private void button_visualiser_listener (ActionEvent e) {
        try {
            if (spread1 != null){
                JFrame mafenetre = new JFrame();
                mafenetre.setDefaultCloseOperation(2);
                mafenetre.setVisible(true);
                mafenetre.setPreferredSize(new Dimension(500, 600));
                mafenetre.setSize(500, 600);
                mafenetre.setLocationRelativeTo((Component)null);
                mafenetre.setTitle("prévisualisation");
                JPanel contentPane = (JPanel)mafenetre.getContentPane();
                //Création de tableau qui récupèrent les données
                ArrayList<String> ligne = new ArrayList<>();
                ArrayList<String> entete = new ArrayList<>();
                ArrayList<String[]> donnees = new ArrayList<String[]>();
                Sheet sheet_donnees = spread1.getSheet(0);
                for (int j = 1;j< sheet_donnees.getMaxRows();j++){
                    ligne.clear();
                    for (int i = 0; i < sheet_donnees.getMaxColumns();i++){
                        Range range = sheet_donnees.getRange(j,i, 1);
                        String s  = String.valueOf(range.getValue());
                        if ( !s.equals("null")) {
                            ligne.add(s);
                        }
                    }
                    String[] ligneCourante = new String[ligne.size()];
                    ligneCourante =  ligne.toArray(ligneCourante);
                    donnees.add(ligneCourante);
                }
                for (int i = 0; i < sheet_donnees.getMaxColumns();i++) {
                    Range range = sheet_donnees.getRange(0, i, 1);
                    String s = String.valueOf(range.getValue());
                    if (!s.equals("null")) {
                        entete.add(s);
                    }
                }
                String[] lesentetes = new String[entete.size()];
                lesentetes =  entete.toArray(lesentetes);
                String[][] donneesFinales = new String[donnees.size()][];
                for (int a = 0; a<donnees.size(); a++) {
                    donneesFinales[a] = donnees.get(a);
                }
                // creation tableau graphique
                JTable tableau = new JTable(donneesFinales,lesentetes);
                contentPane.add(tableau);
                contentPane.add(new JScrollPane(tableau));
                pack();
            }
            JFrame mafenetre = new JFrame();
            mafenetre.setDefaultCloseOperation(2);
            mafenetre.setVisible(true);
            mafenetre.setSize(500, 600);
            mafenetre.setPreferredSize(new Dimension(500, 600));
            mafenetre.setLocationRelativeTo((Component)null);
            mafenetre.setTitle("prévisualisation");
            JPanel contentPane = (JPanel)mafenetre.getContentPane();
            //Création de tableau qui récupèrent les données
            ArrayList<String> ligne = new ArrayList<>();
            ArrayList<String> entete = new ArrayList<>();
            ArrayList<String[]> donnees = new ArrayList<String[]>();
            Sheet sheet_donnees = spread.getSheet(0);
            for (int j = 1;j< sheet_donnees.getMaxRows();j++){
                ligne.clear();
                for (int i = 0; i < sheet_donnees.getMaxColumns();i++){
                    Range range = sheet_donnees.getRange(j,i, 1);
                    String s  = String.valueOf(range.getValue());
                    if ( !s.equals("null")) {
                        ligne.add(s);
                    }
                }
                String[] ligneCourante = new String[ligne.size()];
                ligneCourante =  ligne.toArray(ligneCourante);
                donnees.add(ligneCourante);
            }
            for (int i = 0; i < sheet_donnees.getMaxColumns();i++) {
                Range range = sheet_donnees.getRange(0, i, 1);
                String s = String.valueOf(range.getValue());
                if (!s.equals("null")) {
                    entete.add(s);
                }
            }
            String[] lesentetes = new String[entete.size()];
            lesentetes =  entete.toArray(lesentetes);
            String[][] donneesFinales = new String[donnees.size()][];
            for (int a = 0; a<donnees.size(); a++) {
                donneesFinales[a] = donnees.get(a);
            }
            // creation tableau graphique
            JTable tableau = new JTable(donneesFinales,lesentetes);
            contentPane.add(tableau);
            contentPane.add(new JScrollPane(tableau));
            pack();
        }

        catch (Exception f) {
            JOptionPane.showMessageDialog(this,"Veuillez inserer un fichier","Verification d'insertion",JOptionPane.INFORMATION_MESSAGE);
        }
    }
    /** Cette fonction permet de faire le choix la variable l de L-diversité */
    private int choix_du_l(ActionEvent e){
        Boolean saisie_correcte = false;
        int l=-1;
        while(!saisie_correcte){
            try{
                String value_string = JOptionPane.showInputDialog("Choisissez un entier l pour la L-diversité");
                if (value_string==null){
                    break;
                }
                int value = Integer.valueOf(value_string);
                l =  value;
                saisie_correcte = true;
            }catch (NumberFormatException ex){
            }
        }
        return l;
    }
    /** Cette fonction permet d'implémenter la fonction de l-diversité */
    private void ldiversite(ActionEvent e){
        try {
            String filename = fichierCharge.getAbsolutePath();
            SpreadSheet spread = new SpreadSheet(new File(filename));
            Bucketiser bucket = new Bucketiser(spread);
            int l = choix_du_l(e);
            if (l == -1){

            }
            else if(l<2){
                JOptionPane.showMessageDialog(this,"faut mettre un chiffre supérieur 1","verification l-diversite",JOptionPane.INFORMATION_MESSAGE);
            }
            else{
                Boolean resultat_test =  bucket.l_diversite(spread,l);
                if (resultat_test)
                    JOptionPane.showMessageDialog(this,"Ce fichier est L-diverse","verification l-diversite",JOptionPane.INFORMATION_MESSAGE);
                else
                    JOptionPane.showMessageDialog(this,"Ce fichier n'est pas L-diverse","verification l-diversite",JOptionPane.INFORMATION_MESSAGE);;
            }

        }
        catch (Exception f) {
            JOptionPane.showMessageDialog(this,"Insérer un fichier","Verification d'insertion",JOptionPane.INFORMATION_MESSAGE);
        }


    }
    /** Cette fonction implémente L'algorithme 1  */
    private void algorithme1(ActionEvent e) {
        try {
            spread1 = null;
            String filename = fichierCharge.getAbsolutePath();
            spread = new SpreadSheet(new File(filename));
            MethodeAlgo methodeAlgo = new MethodeAlgo(spread);
            String[] choix_algo = {"multidimensionel","unidimensionnel"};
            String retour = (String) JOptionPane.showInputDialog(
                    this, "Choisissez un Algorithme",
                    "Choix algo",
                    JOptionPane.QUESTION_MESSAGE,
                    null, choix_algo, choix_algo[1]);
            Pseudonymiser pseudonymiser = new Pseudonymiser(spread);
            pseudonymiser.encrypter();
            if(retour!= null){
            if (retour.equals(choix_algo[1])){
                HashMap<String,Integer> choixqid =  methodeAlgo.choixQID();
                ArrayList<String> qid = new ArrayList<>();
                for (Map.Entry value : choixqid.entrySet()) {
                    String t = (String) value.getKey();
                    qid.add(t);
                }
                String[] qi = new String[qid.size()];
                qi =  qid.toArray(qi);

                String retour2 = (String) JOptionPane.showInputDialog(
                        this, "Choisissez un Algorithme", "Choix algo", JOptionPane.QUESTION_MESSAGE, null, qi, qi[0]);
                if (retour2 != null ){
                    int chqid = choixqid.get(retour2);

                    spread = methodeAlgo.unidimensionnel(spread,chqid,choix_du_k(e));
                    Sheet feuille1 = spread.getSheet(0);
                    NoticeWindow  n = new NoticeWindow(NoticeType.SUCCESS_NOTIFICATION,"Methode Unidimensionnelle terminée",NoticeWindow.SHORT_DELAY, NPosition.BOTTOM_RIGHT);
                }
                else{

                }


            }
            else
            {
                spread = methodeAlgo.multidimensionnel(spread,choix_du_k(e));
                Sheet feuille1 = spread.getSheet(0);
                NoticeWindow  n = new NoticeWindow(NoticeType.SUCCESS_NOTIFICATION,"Methode Multidimensionnelle terminée",NoticeWindow.SHORT_DELAY, NPosition.BOTTOM_RIGHT);

            }}
            else
            {

            }

        }

        catch (StackOverflowError f){
            JOptionPane.showMessageDialog(this,"Saisissez un K pour l'annonymisation","Verification de K",JOptionPane.INFORMATION_MESSAGE);
        }
        catch (NullPointerException f)
        {
            JOptionPane.showMessageDialog(this,"Insérer un fichier","Verification d'insertion",JOptionPane.INFORMATION_MESSAGE);        }
        catch (Exception f)
        {
            f.printStackTrace();
        }



    }


}