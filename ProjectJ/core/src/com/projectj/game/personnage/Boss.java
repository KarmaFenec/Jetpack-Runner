package com.projectj.game.personnage;
import com.projectj.game.arme.bullets.Bullets;

import java.util.Random;
import com.badlogic.gdx.Gdx;

public class Boss extends Personnage{
    
    static Random rand;
    static int nb_alea;
    
    public Boss(String nom, int vie, int width, int height, int x, int y, Bullets bullet, int size){
        super(nom, vie, 5, 5, width, height, x , y, bullet, size);
    }

    public void shoot(int x, int y){
        bullets.add(new Bullets(bullet.getDamage(),  x, y, -bullet.getXSpeed(), bullet.getWidth(), bullet.getHeight()));
    }

    public void reload(){
        for(int i = 0; i < this.bullets.size(); i++){
            Bullets b = this.bullets.get(i);
            if(b.isDestroyed()){
                this.bullets.remove(b);
                i--;
            }
        }
    }

    @Override
    public void update(){
        //1er PHASE
        if(getLife() > 3){
            //Déplacement
            this.y += ySpeed;
            if((this.y) <= 9){
                this.y = 10;
                ySpeed = -ySpeed;
            }
            if((this.y + this.getHeight()) > Gdx.graphics.getHeight()){
                ySpeed = -ySpeed;
            }
            //Tir
            rand = new Random();
            nb_alea = rand.nextInt(30);
            if(nb_alea == 1){
                this.shoot((this.x-this.getWidth()) + 90, this.y-10);
            }
        }
        //2ième PHASE
        else{
            //Déplacement
            this.y += ySpeed;
            this.x -= xSpeed;
            if(((this.y) <=9) || ((this.y + this.getHeight()) > Gdx.graphics.getHeight())){
                ySpeed = -ySpeed;
            }
            if((this.x) <=6){
                this.x = Gdx.graphics.getWidth() ;
                xSpeed += 2;
            }
            if(xSpeed > 40){
                xSpeed = 5;
            }
            //Tir
            rand = new Random();
            nb_alea = rand.nextInt(30);
            if(nb_alea == 1){
                this.shoot((this.x-this.getWidth()) + 90, this.y-10);
            }
        }
    }

}