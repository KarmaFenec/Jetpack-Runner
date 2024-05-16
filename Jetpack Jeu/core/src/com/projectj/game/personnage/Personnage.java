package com.projectj.game.personnage;

//import com.projectj.game.arme.Weapon;
import com.projectj.game.arme.bullets.Bullets;
import com.badlogic.gdx.graphics.glutils.ShapeRenderer;

public abstract class Personnage {
    private String name;
    private int life;
    //private Weapon weapon;
    private int xSpeed;
    private int ySpeed;
    private int size;

    public Personnage(String nom, int vie, int xSpeed, int ySpeed, int size){
        this.name = nom;
        this.life = vie;
        this.xSpeed = xSpeed;
        this.ySpeed = ySpeed;
        this.size = size;
        //this.weapon = arme;
    }

    public abstract void update();

    //Getters
    public String getName(){
        return this.name;
    }

    public int getLife(){
        return this.life;
    }

    public int getSize(){
        return this.size;
    }

    /*
    public Weapon getWeapon(){
        return this.weapon;
    }
    */

    //Setters
    /*
    public void setWeapon(Weapon arme){
        this.weapon = arme;
    }
    */

    public void setLife(int vie){
        this.life = vie;
    }

    public void getHit(Bullets balle){
        int degats = balle.getDamage();
        if(this.life < degats){
            this.setLife(0);
        }
        this.setLife(this.life - degats);
    }

    //Predicat
    public boolean isDead(){
        return this.life == 0;
    }

}
