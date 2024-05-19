package com.projectj.game;

import com.badlogic.gdx.ApplicationAdapter;
import com.badlogic.gdx.Gdx;
import com.badlogic.gdx.Input;
import com.badlogic.gdx.graphics.GL20;
import com.badlogic.gdx.graphics.Texture;
import com.badlogic.gdx.graphics.g2d.Animation;
import com.badlogic.gdx.graphics.g2d.SpriteBatch;
import com.badlogic.gdx.graphics.g2d.TextureRegion;
import com.projectj.game.arme.bullets.Bullets;
import com.projectj.game.background.BackgroundMenu;
import com.projectj.game.background.BackgroundScrolling;
import com.projectj.game.personnage.Boss;
import com.projectj.game.personnage.Player;
import com.badlogic.gdx.math.Rectangle;
import java.util.Random;

public class Projectj extends ApplicationAdapter {

	//Nombre de colonnes et de lignes des sprite sheets
	private static final int FRAME_COLS = 4, FRAME_ROWS = 1;

	Player character;
	Boss boss;
	SpriteBatch batch;
	Texture ballesPlayer;
	Texture ballesBoss1;
	boolean menu_on=false;
	Bullets ballePlayer;
	Bullets balleBoss1;

	BackgroundScrolling background;
	BackgroundMenu backgroundMenu;

	Animation<TextureRegion> walkAnimation; 
	Animation<TextureRegion> jetAnimation;
	Animation<TextureRegion> firstAnimation;

	Texture walkSheet;
	Texture jetSheet;
	Texture firstSheet;

	float stateTime;
	
	ReadFile readFile;
	ScrollingObstacle scrollingObstacle;
	ArrayList<Rocket> rockets = new ArrayList<>();
	int score;
	
	@Override
	public void create () {
		boss = new Boss("Splinter", 50, 130, 75, Gdx.graphics.getWidth() - 130, 75, balleBoss1);
		batch = new SpriteBatch();
		background =new BackgroundScrolling();
		backgroundMenu =new BackgroundMenu();
		ballePlayer = new Bullets(10, 16, 16, 10, 30, 20);
		ballesPlayer = new Texture(Gdx.files.internal("lasers/01.png"));
		character = new Player(ballePlayer);

		//on charge les sprites sheets du joueur
		walkSheet = new Texture(Gdx.files.internal("BarryWalking.png"));
		jetSheet = new Texture(Gdx.files.internal("BarryJetpack.png"));
	
		//sprites sheets des boss
		firstSheet = new Texture(Gdx.files.internal("BossMovement.png"));

		TextureRegion[][] tmp = TextureRegion.split(walkSheet,
				walkSheet.getWidth() / FRAME_COLS,
				walkSheet.getHeight() / FRAME_ROWS);

		TextureRegion[][] tmp2 = TextureRegion.split(jetSheet,
				jetSheet.getWidth() / FRAME_COLS,
				jetSheet.getHeight() / FRAME_ROWS);

		TextureRegion[][] tmp3 = TextureRegion.split(firstSheet,
				firstSheet.getWidth() / 12,
				firstSheet.getHeight());

		TextureRegion[] walkFrames = new TextureRegion[FRAME_COLS * FRAME_ROWS];
		TextureRegion[] jetFrames = new TextureRegion[FRAME_COLS * FRAME_ROWS];
		TextureRegion[] firstFrames = new TextureRegion[12 * 1];

		int index = 0;
		for(int i = 0; i < FRAME_ROWS; i++){
			for(int j = 0; j < FRAME_COLS; j++){
				walkFrames[index++] = tmp[i][j];
			}
		}

		index = 0;
		for(int i = 0; i < FRAME_ROWS; i++){
			for(int j = 0; j < FRAME_COLS; j++){
				jetFrames[index++] = tmp2[i][j];
			}
		}

		index = 0;
		for(int i = 0; i < 1; i++){
			for(int j = 0; j < 12; j++){
				firstFrames[index++] = tmp3[i][j];
			}
		}

		walkAnimation = new Animation<TextureRegion>(0.25f, walkFrames);
		jetAnimation = new Animation<TextureRegion>(0.25f, jetFrames);
		firstAnimation = new Animation<TextureRegion>(0.03f, firstFrames);

		stateTime = 0f;

		//
		readFile = new ReadFile("text_art.txt");
		scrollingObstacle = new ScrollingObstacle("text_art.txt", readFile);
	}

	@Override
	public void render () {
		/*
		character.update();
		boss.update();
		*/

		Gdx.gl.glClear(GL20.GL_COLOR_BUFFER_BIT);
		stateTime += Gdx.graphics.getDeltaTime();
		batch.begin();
		if(backgroundMenu.is_finish()){
			background.update(batch);
			character.update();
			scrollingObstacle.update();
			TextureRegion firstBFrame = firstAnimation.getKeyFrame(stateTime, true);
			TextureRegion currentFrame;
			if(character.getY() != 10){
				currentFrame = jetAnimation.getKeyFrame(stateTime, true);
			}
			else{
				currentFrame = walkAnimation.getKeyFrame(stateTime, true);
			}
			batch.draw(currentFrame, character.getX(), character.getY());
			batch.draw(firstBFrame, boss.getX(), boss.getY());
			for(Bullets test : character.bullets){
				System.out.println("BulletX:" + test.getX());
				test.checkCollision(boss);
				test.update();
				batch.draw(ballesPlayer, test.getX(), test.getY());
			}
			for(int i = 0; i < character.bullets.size(); i++){
				Bullets b = character.bullets.get(i);
				if(b.isDestroyed()){
					character.bullets.remove(b);
					i--;
				}
			}
			//Lecture des blocks du fichier txt
			for(Rectangle b : readFile.blocks){
				//boucle d'affichage des blocks
				batch.draw(test,b.x,b.y);
			}
			if(Rocket.genererRocket()){
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
	}
		
		
	
	@Override
	public void dispose(){
		
	}

}
