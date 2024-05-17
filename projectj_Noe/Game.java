package com.gdx.projectj;

import java.util.ArrayList;

import com.badlogic.gdx.ApplicationAdapter;
import com.badlogic.gdx.Gdx;
import com.badlogic.gdx.Input;
import com.badlogic.gdx.graphics.Texture;
import com.badlogic.gdx.graphics.g2d.SpriteBatch;
import com.badlogic.gdx.math.Rectangle;
import java.util.Random;





public class Game extends ApplicationAdapter {
	SpriteBatch batch;
	Texture test;
	boolean menu_on=false;


	BackgroundScrolling background;
	BackgroundMenu backgroundMenu;
	ReadFile readFile;
	ScrollingObstacle scrollingObstacle;

	//Character character;
	//ShapeRenderer shape;
	ArrayList<Rocket> rockets = new ArrayList<>();
	boolean shot;
	int score;

	@Override
	public void create () {
		batch = new SpriteBatch();
		background =new BackgroundScrolling();
		backgroundMenu =new BackgroundMenu();
		test = new Texture("bucket.png");
		readFile = new ReadFile("text_art.txt");
		scrollingObstacle = new ScrollingObstacle("text_art.txt", readFile);

		//character = new Character(20, 20, 20);
		//shape = new ShapeRenderer();
	}

	@Override
	public void render () {

		batch.begin();

		if(backgroundMenu.is_finish()){
			background.update(batch);
			scrollingObstacle.update();
			for(Rectangle b : readFile.blocks){
				//boucle d'affichage des blocks
				batch.draw(test,b.x,b.y);
			}
			shot = Rocket.genererRocket();
			if(shot){
				//On créé aléatoirement la position en y de la Rocket
				Random rand = new Random();
        		int nb_alea = rand.nextInt(6);
				int yR = 160 + nb_alea*80;

				Rocket rocket = new Rocket(yR,10,10, 7);
				rockets.add(rocket);
			}
			for (Rocket r : rockets){
				r.update(batch);
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
		
		//shape.begin(ShapeRenderer.ShapeType.Filled);
		//character.update();
		//character.draw(shape);
	}
	

}
