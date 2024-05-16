package com.gdx.projectj;

import com.badlogic.gdx.Gdx;
import com.badlogic.gdx.Input;
import com.badlogic.gdx.graphics.Color;
import com.badlogic.gdx.graphics.glutils.ShapeRenderer;

public class Character {
    int x;
    int y;
    int xSpeed;
    int ySpeed;
    int size;
    Color color;
    boolean destroyed = false;

    public Character(int x, int y, int size) {
        this.x = x;
        this.y = y;
        this.size = size;
        this.color = Color.WHITE;
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
            //On descend sinon créant une sensation de gravité
            this.y -= 300 * Gdx.graphics.getDeltaTime();
        }
        if (y < 20 || y > Gdx.graphics.getHeight()) {
            y = 20;//Ici 20 représente la position en y d'origine du character dans Game
        }
    }

    public void draw(ShapeRenderer shape) {
        shape.setColor(color);
        shape.circle(x, y, size);
    }

    public void checkCollisionMob(Mob mob){
        if(collidesWithMob(mob)){
            this.destroyed = true;
            mob.destroyed = true;
        }
    }

    private boolean collidesWithMob(Mob mob){
        int collisionX = mob.x - this.x + (mob.width) / 2;
        int collisionY = mob.y - this.y;
        int x = (this.size) + (mob.width) / 2;
        int y = (this.size) + (mob.height) / 2;
        if(collisionX <= x && collisionX >= -x && collisionY <= y && collisionY >= -y){
            return true;
        }
        return false;
    }
}