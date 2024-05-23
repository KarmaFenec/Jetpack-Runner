package com.projectj.game;

import com.badlogic.gdx.graphics.Color;
import com.badlogic.gdx.graphics.Texture;
import com.badlogic.gdx.graphics.g2d.BitmapFont;
import com.badlogic.gdx.graphics.g2d.SpriteBatch;

public class BackgroundMenu {
	public static final float ACCELERATION = 5;

	Texture logo_corp,nom_jeu,background,background2;
	float x_logo_corp,x_background,x_nom_jeu,y,x_background2;
	BitmapFont font;


	public BackgroundMenu() {
		logo_corp = new Texture("logo-corp.png");
		nom_jeu = new Texture("logo-jeu.png");
		background = new Texture("background-menu.png");
		background2 = new Texture("background_transi.png");
		font = new BitmapFont();
		font.setColor(Color.GRAY);


		x_logo_corp=10;
		x_background=0;
		x_background2=background2.getWidth();
		x_nom_jeu=(background.getWidth()/3)+50;
		y=(background.getHeight()/2)+75;
	}

	public void update_menu(SpriteBatch batch){
		batch.draw(background,x_background,0);
		batch.draw(background2,x_background2,0);
		if(this.x_logo_corp>-(this.logo_corp.getWidth())){
			batch.draw(logo_corp,x_logo_corp,0);
		}
		if(this.x_nom_jeu>-(this.logo_corp.getWidth())){
			batch.draw(nom_jeu,x_nom_jeu,y);
		}
		font.draw(batch,"Press P to play",x_nom_jeu+100,y-100);
		font.draw(batch,"Press C to see commands",x_nom_jeu+60,y-150);

	}

	public void transition_menu(){
		if(this.is_finish()==false){
			x_background-=ACCELERATION;
			x_logo_corp-=ACCELERATION;
			x_nom_jeu-=ACCELERATION;
			x_background2-=ACCELERATION;
		}
	}
	public void commands_menu(SpriteBatch batch){
		font.draw(batch,"L: shoot",x_nom_jeu+50,y-100);
		font.draw(batch,"Space: Flying",x_nom_jeu+50,y-150);
	}
	public boolean is_finish(){
		if(this.x_background<=-(this.background.getWidth()) && this.x_logo_corp<=-(this.logo_corp.getWidth()) && this.x_nom_jeu<=-(this.logo_corp.getWidth())){
			return true;
		}
		else{
			return false;
		}
	}
}
