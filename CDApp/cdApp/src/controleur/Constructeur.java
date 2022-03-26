package controleur;

import vue.Ihm;
import javax.swing.*;


/** Classe Constructeur */
public class Constructeur {


    /** Constructeur de l'application */
    public Constructeur() {
        try{

          Ihm ihm = new Ihm();
          ihm.setVisible(true);
          UIManager.setLookAndFeel(UIManager.getSystemLookAndFeelClassName());


        } catch (Exception e) {
            e.printStackTrace();
        }
    }
}