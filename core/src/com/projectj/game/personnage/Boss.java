package com.projectj.game.personnage;
import com.projectj.game.arme.bullets.Bullets;


public class Boss extends Personnage{
    
    public Boss(String nom, int vie, int width, int height, int x, int y, Bullets bullet, int size){
        super(nom, vie, 10, 200, width, height, x , y, bullet, size);
    }


    @Override
    public void update(){
        if(this.isDead()){
            System.out.println("RIP bozo");
        }

    }

}