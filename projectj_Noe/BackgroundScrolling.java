package com.gdx.projectj;

import com.badlogic.gdx.Gdx;
import com.badlogic.gdx.graphics.Color;
import com.badlogic.gdx.graphics.Texture;
import com.badlogic.gdx.graphics.g2d.BitmapFont;
import com.badlogic.gdx.graphics.g2d.SpriteBatch;

public class BackgroundScrolling {
	public static final float MAX_SPEED=80;
	public static final float ACCELERATION = 0.0001f;


	Texture background;
	float x1,x2;
	float speed;//pixels par secondes
	BitmapFont font;
	int score = 0;

	public BackgroundScrolling() {
		background = new Texture("background.png");
		x1=0;
		x2=background.getWidth();
		speed=2;
		font = new BitmapFont();
		font.setColor(Color.GRAY);
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


		batch.draw(background,x1,0);
		batch.draw(background,x2,0);
		font.draw(batch,"SCORE : " + this.score,10,(Gdx.graphics.getHeight()-10));
	}

	public float getSpeed(){return this.speed;}
}
