package com.projectj.game.personnage;
import java.util.Random;

import com.badlogic.gdx.Gdx;
import com.projectj.game.arme.bullets.Bullets;


public class Boss extends Personnage{

    Random rand = new Random();
    int niveau;
    int state;
    
    public Boss(String nom, int vie, int width, int height, int x, int y, Bullets bullet, int size, int niveau){
        super(nom, vie, 10, 2000, width, height, x , y, bullet, size);
        this.niveau = niveau;
    }


    private boolean isMoving(){
        int random = rand.nextInt(10);
        return random == 1;
    }

    private void moving(){
        state = rand.nextInt(3);
        if(this.isMoving()){
            if(state == 0){
                shoot(this.getX(), this.getY());
            }
            if(state == 1){
                this.y += this.ySpeed *  Gdx.graphics.getDeltaTime();
            }
            if(state == 2){
                this.y += -(this.ySpeed) *  Gdx.graphics.getDeltaTime();
            }
        }

    }


    @Override
    public void update(){
        moving();
        if((this.y) <=9){
            this.y = 10;
        }
        if((this.y + this.getHeight()) > Gdx.graphics.getHeight()){
            this.y = Gdx.graphics.getHeight() - this.getHeight();
        }
        if(this.isDead()){
            System.out.println("RIP bozo");
        }

    }

}