package com.gdx.projectj;

import com.badlogic.gdx.Gdx;
import com.badlogic.gdx.Input;
import com.badlogic.gdx.graphics.glutils.ShapeRenderer;
import com.badlogic.gdx.math.Rectangle;

public class Character {
    int x;
    int y;
    int xSpeed;
    int ySpeed;
    int size;
    boolean destroyed = false;

    public Character(int x, int y, int size) {
        this.x = x;
        this.y = y;
        this.size = size;
    }

    public void update() {
        //On monte quand on appuie sur espace
        if(Gdx.input.isKeyPressed(Input.Keys.SPACE)) {this.y += 500 * Gdx.graphics.getDeltaTime();}
        /*
        if (x < 0 || x > Gdx.graphics.getWidth()) {
            x = 0;
        }
        */
        else{
            //Sinon on descend, cela créé une sensation de gravité
            this.y -= 300 * Gdx.graphics.getDeltaTime();
        }
        if (y < 20 || y > Gdx.graphics.getHeight()) {
            y = 20;//Ici 20 représente la position en y d'origine du character dans Game
        }
    }

    public void draw(ShapeRenderer shape) {
        shape.circle(x, y, size);
    }

    public void checkCollisionMob(Rocket mob){
        if(collidesWithMob(mob)){
            this.destroyed = true;
            mob.destroyed = true;
        }
    }

    public void checkCollisionObstacle(Rectangle block){
        if(collidesWithObstacle(block)){
            this.destroyed = true;
        }
    }

    private boolean collidesWithMob(Rocket mob){
        int collisionX = mob.x - this.x + (mob.width) / 2;
        int collisionY = mob.y - this.y;
        int x = (this.size) + (mob.width) / 2;
        int y = (this.size) + (mob.height) / 2;
        if(collisionX <= x && collisionX >= -x && collisionY <= y && collisionY >= -y){
            return true;
        }
        return false;
    }

    //Pour Maxence conversion float to int
    private boolean collidesWithObstacle(Rectangle block){
        float collisionX = block.x - this.x + (block.width) / 2;
        float collisionY = block.y - this.y;
        float x = (this.size) + (block.width) / 2;
        float y = (this.size) + (block.height) / 2;
        if(collisionX <= x && collisionX >= -x && collisionY <= y && collisionY >= -y){
            return true;
        }
        return false;
    }
}