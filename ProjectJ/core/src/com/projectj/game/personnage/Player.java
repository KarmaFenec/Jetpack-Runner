package com.projectj.game.personnage;

import com.badlogic.gdx.Gdx;
import com.badlogic.gdx.Input;
import com.projectj.game.arme.bullets.*;
import com.badlogic.gdx.math.Rectangle;


public class Player extends Personnage{
    
    @Override
    public void update(){
        if(this.isDead()){
            System.out.println("mort le frère");
        }

        if(Gdx.input.isKeyPressed(Input.Keys.SPACE)){
            this.y += ySpeed * Gdx.graphics.getDeltaTime();
        }
        else if(this.y == 10){}
        else{
            this.y -= (ySpeed - 300) * Gdx.graphics.getDeltaTime();
        }
        if((this.y) <=9){
            this.y = 10;
        }
        if((this.y + this.getHeight()) > Gdx.graphics.getHeight()){
            this.y = Gdx.graphics.getHeight() - this.getHeight();
        }
        if(Gdx.input.isKeyJustPressed(Input.Keys.L)){
            this.shoot(this.x + this.getWidth(), this.y + 20);
        }
    }

    public Player(Bullets bullet){
        super("hero", 1, 500, 500, 80, 110, 150, 150, bullet, 10);
    }

    //COLLISION
    public void checkCollisionRocket(Rocket rocket){
        if(collidesWithRocket(rocket)){
            getHit(1);
            rocket.setDestroyed(true);
        }
    }
    private boolean collidesWithRocket(Rocket rocket){
        int collisionX = rocket.getX() - this.x + (rocket.getWidth()) / 2;
        int collisionY = rocket.getY() - this.y;
        int x = (this.size) + (rocket.getWidth()) / 2;
        int y = (this.size) + (rocket.getHeight()) / 2;
        if(collisionX <= x && collisionX >= -x && collisionY <= y && collisionY >= -y){
            return true;
        }
        return false;
    }

    //Pour Maxence conversion float to int
    public void checkCollisionObstacle(Rectangle block){
        if(collidesWithObstacle(block)){
            getHit(1);
        }
    }
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

    public void shoot(int x, int y){
        bullets.add(new Bullets(bullet.getDamage(),  x, y, bullet.getXSpeed(), bullet.getWidth(), bullet.getHeight()));
    }

    public void reload(){
        for(int i = 0; i < this.bullets.size(); i++){
            Bullets b = this.bullets.get(i);
            if(b.isDestroyed()){
                this.bullets.remove(b);
                i--;
            }
        }
    }
}
