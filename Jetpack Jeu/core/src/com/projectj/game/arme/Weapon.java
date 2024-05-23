package com.projectj.game.arme;


public class Weapon {
    private int bulletSpeed;
    /*
    private String name;
    A AJOUTER SI ON DONNE UNE ARME PERMANENTE AU PERSONNAGE
    private ArrayList<Bullets> magazine = new ArrayList<Bullets>();
   */

    

    public Weapon(int speed){
        this.bulletSpeed = speed;
    }


    //Getters
    public int getSpeed(){
        return this.bulletSpeed;
    }

    //Setters
    /*A AJOUTER SI ON DONNE UNE ARME PERMANENTE AU PERSONNAGE
    public void setMagazine(int nbr){
        
    }
    */
    //Methodes
    

}