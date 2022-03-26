package vue;
import javax.swing.*;
import java.awt.*;
import java.awt.event.MouseAdapter;
import java.awt.event.MouseEvent;

/** Classe MyButton */
public class MyButton extends JButton {
    /** My Button est une classe qui permet de faire le designe des boutons */
    public MyButton(String txt){
        super(txt);
        this.setBackground( new Color(27, 79, 114));
        this.setForeground(Color.white);
        this.setFocusPainted(false);
        setBorderPainted(false); // De même, on ne veut pas afficher les bordures.
        this.addMouseListener(new MouseAdapter() {
            @Override
            public void mouseReleased(MouseEvent e) {
                MyButton.super.setBackground(new Color(21, 67, 96));
            }
            @Override
            public void mouseClicked(MouseEvent e) {
                MyButton.super.setBackground(new Color(21, 67, 96));
            }
            @Override
            public void mouseExited(MouseEvent e) {
                MyButton.super.setBackground( new Color(27, 79, 114));
            }
            @Override
            public void mouseEntered(MouseEvent e) {
                MyButton.super.setBackground(new Color(21, 67, 96));
            }
            @Override
            public void mousePressed(MouseEvent e) {
                MyButton.super.setBackground(new Color(21, 67, 96));
            }
        });
    }
    /** Cette fonction permet de faire le design des boutons d'annonymisation */
    public void button_fonction_font(){
        this.setFont(new Font( "Arial", Font.PLAIN, 30));
    }
    /** Cette fonction permet de faire le design des boutons de fonctionnement (Bouton Charger) (Bouton Télécharger) (Bouton Visualiser)  */
    public void button_fonction_lecture(){
        this.setFont(new Font("Arial", Font.PLAIN, 15));
        this.setPreferredSize(new Dimension(210,60));
        this.setHorizontalAlignment(SwingConstants.LEFT);

    }
}
