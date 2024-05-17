package com.gdx.projectj;

import com.badlogic.gdx.graphics.Color;
import com.badlogic.gdx.graphics.glutils.ShapeRenderer;

public class Rocket {
    int x;
    int y;
    int xSpeed;
    int size;
    boolean destroyed = false;
    Color color;

    public Rocket(int x, int y, int size, int xSpeed) {
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

        public void checkCollision(Mob mob){
        if(collidesWithMob(mob)){
            this.destroyed = true;
            mob.life--;
            if(mob.life ==2){
                mob.color = Color.GRAY;
            }
            if(mob.life ==1){
                mob.color = Color.RED;
            }
            if(mob.life == 0){
                mob.destroyed = true;
            }
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
