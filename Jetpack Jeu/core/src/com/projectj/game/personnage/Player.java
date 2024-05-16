package com.projectj.game.personnage;


public class Player extends Personnage{
    
    @Override
    public void update(){
        if(this.isDead()){
            System.out.println("mort le frère");
        }
    }

    public Player(){
        super("hero", 1, 10, 10, 10);
    }
}
