package com.projectj.game.personnage;

import com.badlogic.gdx.Gdx;
import com.badlogic.gdx.Input;
import com.projectj.game.arme.bullets.Bullets;


public class Player extends Personnage{
    
    @Override
    public void update(){
        if(this.isDead()){
            System.out.println("mort le frère");
        }

        if(Gdx.input.isKeyPressed(Input.Keys.SPACE)){
            this.y += ySpeed * Gdx.graphics.getDeltaTime();
        }
        else if(this.y == 10){

        }
        else{
            this.y -= (ySpeed - 200) * Gdx.graphics.getDeltaTime();
        }
        if((this.y) <=9){
            this.y = 10;
        }
        if((this.y + this.getHeight()) > Gdx.graphics.getHeight()){
            this.y = Gdx.graphics.getHeight() - this.getHeight();
        }
        if(Gdx.input.isKeyJustPressed(Input.Keys.L)){
            this.shoot(this.x + this.getWidth(), this.y + 20);
            System.out.println("PlayerX: " + this.getX());
        }
    }

    public Player(Bullets bullet){
        super("hero", 1, 500, 500, 80, 110, 150, 150, bullet);
    }

    //COLLISION
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
