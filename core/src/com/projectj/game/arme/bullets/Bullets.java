package com.projectj.game.arme.bullets;

import com.badlogic.gdx.Gdx;
import com.badlogic.gdx.math.Rectangle;
import com.projectj.game.personnage.Personnage;

public class Bullets {
    private int damage;
    private int x;
    private int y;
    private int xSpeed;
    private boolean destroyed = false;
    private int width;
    private int height;
    private Rectangle forme;

    public Bullets(int degats, int x, int y, int xSpeed, int width, int height){
        this.damage = degats;
        this.x = x;
        this.y = y;
        this.xSpeed = xSpeed;
        this.width = width;
        this.height = height;
        forme = new Rectangle(this.x, this.y, this.width, this.height);
    }

    public void update(){
        this.outOfBounds();
        this.x += xSpeed;
    }


    public void checkCollision(Personnage character){
        if(collidesWithMob(character)){
            this.destroyed = true;
            character.getHit(this.damage);
        }
    }


    private boolean collidesWithMob(Personnage character){
        int collisionX = character.getX() - this.x + (character.getWidth()) / 2;
        int collisionY = character.getY() - this.y;
        int x = (this.width) + (character.getWidth()) / 2;
        int y = (this.height) + (character.getHeight()) / 2;
        if(collisionX <= x && collisionX >= -x && collisionY <= y && collisionY >= -y){
            return true;
        }
        return false;
    }

    public void outOfBounds(){
        if(this.getX() > Gdx.graphics.getWidth()){
            this.destroyed = true;
        }
    }

    public boolean isDestroyed(){
        return this.destroyed;
    }
    //Getters
    public int getDamage(){
        return this.damage;
    }


    public int getX(){
        return this.x;
    }

    public int getY(){
        return this.y;
    }

    public int getXSpeed(){
        return this.xSpeed;
    }

    public int getWidth(){
        return this.width;
    }

    public int getHeight(){
        return this.height;
    }

}
