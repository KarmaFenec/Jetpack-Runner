package com.projectj.game;

import com.badlogic.gdx.Gdx;
import com.badlogic.gdx.graphics.Texture;
import com.badlogic.gdx.graphics.g2d.SpriteBatch;

public class BackgroundScrolling {
	public static final float MAX_SPEED=80;
	public static final float ACCELERATION = 0.001f;


	Texture background;
	float x1,x2;
	public float speed;//pixels par secondes

	public BackgroundScrolling() {
		background = new Texture("background.png");
		x1=0;
		x2=background.getWidth();
		speed=2;
	}

	public void update(SpriteBatch batch){
		//deplacement
		if(speed<MAX_SPEED){
			speed+=ACCELERATION;
			if(speed>MAX_SPEED){
				speed=MAX_SPEED;
			}
		}
		else if(speed>MAX_SPEED){
			speed=MAX_SPEED;
		}


		//Si l'image 1 n'est plus dans la fenetre
		if(x1<=-(Float.intBitsToFloat(background.getWidth()/2)) && x2<=0){
			x1=0;
			x2=background.getWidth();
		}
		else{
			x1-=speed;
			x2-=speed;
		}


		//Affichage du score
		batch.draw(background,x1,0);
		batch.draw(background,x2,0);
	}

	public float getSpeed(){return this.speed;}
}

