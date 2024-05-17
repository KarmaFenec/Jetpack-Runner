package com.gdx.projectj;

import com.badlogic.gdx.graphics.Color;
import com.badlogic.gdx.graphics.glutils.ShapeRenderer;

public class Bullet {
    int x;
    int y;
    int xSpeed;
    int size;
    boolean destroyed = false;
    Color color;

    public Bullet(int x, int y, int size, int xSpeed) {
        this.x = x;
        this.y = y;
        this.size = size;
        this.xSpeed = xSpeed;
        this.color = Color.YELLOW;
    }
    public void update() {
        //Déplacement horizontal
        this.x += xSpeed;
    }
    public void draw(ShapeRenderer shape) {
        shape.setColor(color);
        shape.ellipse(x, y, (size*2), size);
    }

        public void checkCollision(Rocket mob){
        if(collidesWithMob(mob)){
            this.destroyed = true;
            mob.destroyed = true;
            //A la destruction d'une rocket, le score augmente de 1
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
}
