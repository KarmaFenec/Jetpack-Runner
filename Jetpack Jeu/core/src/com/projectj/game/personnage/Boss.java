package com.projectj.game.personnage;


public class Boss extends Personnage{
    
    public Boss(String nom, int vie, int taille){
        super(nom, vie, 10, 10, taille);
    }


    @Override
    public void update(){
        if(this.isDead()){
            System.out.println("RIP bozo");
        }

    }

}