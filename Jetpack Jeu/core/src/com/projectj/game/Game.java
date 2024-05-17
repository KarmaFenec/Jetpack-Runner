package com.projectj.game;

import com.badlogic.gdx.ApplicationAdapter;
import com.badlogic.gdx.Gdx;
import com.badlogic.gdx.Input;
import com.badlogic.gdx.graphics.Texture;
import com.badlogic.gdx.graphics.g2d.SpriteBatch;
import com.badlogic.gdx.math.Rectangle;
import com.projectj.game.BackgroundScrolling;
import org.w3c.dom.Text;





public class Game extends ApplicationAdapter {
	SpriteBatch batch;
	Texture test;
	boolean menu_on=false;


	BackgroundScrolling background;
	BackgroundMenu backgroundMenu;
	ReadFile readFile;



	@Override
	public void create () {
		batch = new SpriteBatch();
		background =new BackgroundScrolling();
		backgroundMenu =new BackgroundMenu();
		test = new Texture("barry.png");
		readFile = new ReadFile("text_art (1).txt");
	}

	@Override
	public void render () {

		batch.begin();

		if(backgroundMenu.is_finish()){
			background.update(batch);
			for(Rectangle b : readFile.blocks){
				//boucle d'affichage des blocks
				batch.draw(test,b.x,b.y);
			}
		}
		else{
			backgroundMenu.update_menu(batch);
			if(Gdx.input.isKeyJustPressed(Input.Keys.P)){
				menu_on=true;
			}
			if(menu_on){
				backgroundMenu.transition_menu();
			}

		}
		batch.end();

	}
	

}
