package com.projectj.game.arme.bullets;

public class Bullets {
    private int damage;
    private String name;
    int x;
    int y;
    int xSpeed;

    public Bullets(int degats, String name, int x, int y, int xSpeed){
        this.damage = degats;
        this.name = name;
        this.x = x;
        this.y = y;
        this.xSpeed = xSpeed;
    }

    //Getters
    public int getDamage(){
        return this.damage;
    }

    public String getName(){
        return this.name;
    }

    

}
