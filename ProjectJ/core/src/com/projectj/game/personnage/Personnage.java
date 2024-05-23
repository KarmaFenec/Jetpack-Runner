package com.projectj.game.personnage;

//import com.projectj.game.arme.Weapon;
import com.projectj.game.arme.bullets.Bullets;
import java.util.ArrayList;

public abstract class Personnage {
    private String name;
    private int life;
    //private Weapon weapon;
    protected int xSpeed;
    protected int ySpeed;
    protected int height;
    protected int width;
    protected int x;
    protected int y;
    protected int size;
    public ArrayList<Bullets> bullets = new ArrayList<Bullets>();
    Bullets bullet;


    public Personnage(String nom, int vie, int xSpeed, int ySpeed, int width, int height, int x, int y,  Bullets bullet, int size){
        this.name = nom;
        this.life = vie;
        this.xSpeed = xSpeed;
        this.ySpeed = ySpeed;
        this.width = width;
        this.height = height;
        this.x = x;
        this.y = y;
        this.bullet = bullet;
        this.size = size;
    }

    public abstract void update();

    //Getters
    public String getName(){
        return this.name;
    }

    public int getLife(){
        return this.life;
    }

    public int getHeight(){
        return this.height;
    }

    public int getWidth(){
        return this.width;
    }

    public int getX(){
        return this.x;
    }

    public int getY(){
        return this.y;
    }

    public int getSize(){
        return this.size;
    }

    //Setters
    public void setLife(int vie){
        this.life = vie;
    }

    public void getHit(int damage){
        if(this.life < damage){
            this.setLife(0);
        }
        this.setLife(this.life - damage);
    }
    
    //Predicat
    public boolean isDead(){
        return this.life == 0;
    }

}
