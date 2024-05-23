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
    static Random rand;
    static int nb_alea;

    public Rocket(int y, int xSpeed) {
        this.x = Gdx.graphics.getWidth();
        this.y = y;
        this.height = 47;
        this.width = 116;
        this.xSpeed = xSpeed;
    }
    public void update(SpriteBatch batch) {
        //Déplacement horizontal
        horizontal();
    }

    //Pour un ennemi en déplacement horizontal
    private void horizontal(){
        this.x -= xSpeed;
    }

    public static boolean genererRocket(){
        //Cette fonction permet la génération d'une rocket avec 1/150.
        rand = new Random();
        nb_alea = rand.nextInt(150);
        if(nb_alea == 1 || nb_alea == 100){
            return true;
        }
        return false;
    }

    public static Rocket creeRocket(){
        //On créé aléatoirement la position en y de la Rocket
        rand = new Random();
        nb_alea = rand.nextInt(6);
        int yR = 120 + nb_alea*80;

        Rocket rocket = new Rocket(yR, 7);
        return rocket;
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
