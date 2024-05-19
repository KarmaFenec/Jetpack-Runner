package com.projectj.game.arme.bullets;

import java.util.Random;

import com.badlogic.gdx.Gdx;
import com.badlogic.gdx.graphics.Texture;
import com.badlogic.gdx.graphics.g2d.SpriteBatch;

public class Rocket {
    int x;
    int y;
    int xSpeed;
    int height;
    int width;
    boolean destroyed = false;
    Texture rocketImage = new Texture("bucket.png");

    public Rocket(int y, int height, int width, int xSpeed) {
        this.x = Gdx.graphics.getWidth();
        this.y = y;
        this.height = height;
        this.width = width;
        this.xSpeed = xSpeed;
    }
    public void update(SpriteBatch batch) {
        //Déplacement horizontal
        horizontal();
        batch.draw(rocketImage,this.x,this.y);
    }

    //Pour un ennemi en déplacement horizontal
    private void horizontal(){
        this.x -= xSpeed;
    }

    public static boolean genererRocket(){
        //Cette fonction permet la génération d'une rocket avec 1/150.
        Random rand = new Random();
        int nb_alea = rand.nextInt(150);
        if(nb_alea == 1 || nb_alea == 100){
            return true;
        }
        return false;
    }

    //ACCESSEURS

    public boolean getDestroyed(){
        return this.destroyed;
    }

    public void setDestroyed(boolean destroyed){
        this.destroyed = destroyed;
    }

    public int getX(){
        return this.x;
    }
    public int getY(){
        return this.y;
    }
    public int getHeight(){
        return this.height;
    }
    public int getWidth(){
        return this.width;
    }
}
