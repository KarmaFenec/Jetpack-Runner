package com.gdx.projectj;

import com.badlogic.gdx.Gdx;
import com.badlogic.gdx.graphics.Color;
import com.badlogic.gdx.graphics.glutils.ShapeRenderer;

public class Mob {
    int x;
    int y;
    int xSpeed;
    int ySpeed;
    int height;
    int width;
    boolean destroyed = false;
    Color color;
    int life;

    public Mob(int x, int y, int height, int width, int xSpeed, int ySpeed) {
        this.x = x;
        this.y = y;
        this.height = height;
        this.width = width;
        this.xSpeed = xSpeed;
        this.ySpeed = ySpeed;
        this.color = Color.WHITE;
        this.life = 3;
    }
    public void update() {
        //Déplacement horizontal
        horizontal();
    }

    //Pour un ennemi en déplacement horizontal
    private void horizontal(){
        this.x += xSpeed;
        if((x - width) < 0 || (x + width) > Gdx.graphics.getWidth()){
            xSpeed = -xSpeed;
        }
    }

    //Pour un ennemi en déplacement vertical
    private void verticale(){
        this.y += ySpeed;
        if((y - height) < 0 || (y + height) > Gdx.graphics.getHeight()){
            ySpeed = -ySpeed;
        }
    }

    public void draw(ShapeRenderer shape) {
        shape.setColor(color);
        shape.rect(x, y, width, height);
    }
}
