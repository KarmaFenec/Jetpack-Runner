package com.projectj.game.personnage;

import com.badlogic.gdx.Gdx;
import com.badlogic.gdx.Input;
import com.badlogic.gdx.audio.Sound;
import com.badlogic.gdx.math.Rectangle;
import com.projectj.game.ReadFile;
import com.projectj.game.arme.bullets.Bullets;
import com.projectj.game.arme.bullets.Rocket;


public class Player extends Personnage{
    
    private Sound laserSound  = Gdx.audio.newSound(Gdx.files.internal("Sounds/LaserSound.mp3"));
    private Sound jetpackSound = Gdx.audio.newSound(Gdx.files.internal("Sounds/JetpackSound.mp3"));
    private long id = jetpackSound.play(0.0f);

    @Override
    public void update(){
        if(this.isDead()){
            System.out.println("mort le frère");
        }

        if(this.y > 10){
            jetpackSound.setVolume(id, 1.0f);
        }


        if(Gdx.input.isKeyPressed(Input.Keys.SPACE)){
            this.y += ySpeed * Gdx.graphics.getDeltaTime();
        }
        else if(this.y == 10){jetpackSound.setVolume(id, 0.0f);}
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
            laserSound.play();
            this.shoot(this.x + this.getWidth(), this.y + 20);
        }
    }

    public Player(Bullets bullet){
        super("hero", 1, 500, 500, 80, 110, 150, 150, bullet, 10);
        jetpackSound.setLooping(id, true);
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
    public boolean collidesWithObstacle(ReadFile readFile){
        float x_perso_droit=this.x+this.width;
        float x_perso_gauche=this.x;
        float y_perso_bas=this.y+10;
        float y_perso_haut=this.y+this.height;


        for(Rectangle rect:readFile.laser_jaune_base_droit){
            if(rect.x>=x_perso_gauche && rect.x<=x_perso_droit && y_perso_bas>=(rect.y+rect.height)-2 && y_perso_bas<=(rect.y+rect.height)+2){//haut
                return true;
            }
            if(rect.x>=x_perso_gauche && rect.x<=x_perso_droit && y_perso_haut>=(rect.y)-2 && y_perso_haut<=(rect.y)+2){//haut
                return true;
            }
        }



        for(Rectangle rect:readFile.laser_jaune_base_gauche){
            if(rect.x>=x_perso_gauche && rect.x<=x_perso_droit && y_perso_bas>=(rect.y+rect.height)-2 && y_perso_bas<=(rect.y+rect.height)+2){//haut
                return true;
            }
            if(rect.x>=x_perso_gauche && rect.x<=x_perso_droit && y_perso_haut>=(rect.y)-2 && y_perso_haut<=(rect.y)+2){//haut
                return true;
            }
            if(rect.x-10<=x_perso_droit && rect.x+10>=x_perso_droit && rect.y>=y_perso_bas && rect.y<=y_perso_haut){//gauche
                return true;
            }
        }



        for(Rectangle rect:readFile.laser_jaune){
            if(rect.x>=x_perso_gauche && rect.x<=x_perso_droit && y_perso_bas>=(rect.y+rect.height)-2 && y_perso_bas<=(rect.y+rect.height)+2){//haut
                return true;
            }
            if(rect.x>=x_perso_gauche && rect.x<=x_perso_droit && y_perso_haut>=(rect.y)-2 && y_perso_haut<=(rect.y)+2){//haut
                return true;
            }
        }

        for(Rectangle rect:readFile.laser_rouge){
            if(rect.x-10<=x_perso_droit && rect.x+10>=x_perso_droit && rect.y>=y_perso_bas && rect.y<=y_perso_haut){//gauche
                return true;
            }
        }

        for(Rectangle rect:readFile.laser_rouge_base_haut){
            if(rect.x-10<=x_perso_droit && rect.x+10>=x_perso_droit && rect.y>=y_perso_bas && rect.y<=y_perso_haut){//gauche
                return true;
            }
            if(rect.x>=x_perso_gauche && rect.x<=x_perso_droit && y_perso_bas>=(rect.y+rect.height)-2 && y_perso_bas<=(rect.y+rect.height)+2){//haut
                return true;
            }
        }


        for(Rectangle rect:readFile.laser_rouge_base_bas){

            if(rect.x-10<=x_perso_droit && rect.x+10>=x_perso_droit && rect.y>=y_perso_bas && rect.y<=y_perso_haut){//gauche
                return true;
            }
            if(rect.x>=x_perso_gauche && rect.x<=x_perso_droit && y_perso_haut>=(rect.y)-2 && y_perso_haut<=(rect.y)+2){//haut
                return true;
            }

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
