package com.projectj.game;


import com.badlogic.gdx.ApplicationAdapter;
import com.badlogic.gdx.Gdx;
import com.badlogic.gdx.Input;
import com.badlogic.gdx.Screen;
import com.badlogic.gdx.graphics.Texture;
import com.badlogic.gdx.graphics.g2d.BitmapFont;
import com.badlogic.gdx.graphics.g2d.SpriteBatch;
import com.badlogic.gdx.math.Rectangle;
import com.badlogic.gdx.graphics.g2d.TextureRegion;
import com.badlogic.gdx.graphics.g2d.Animation;

import com.projectj.game.BackgroundScrolling;
import com.projectj.game.Obstacle.Obstacle;
import com.projectj.game.arme.bullets.Bullets;
import com.projectj.game.arme.bullets.Rocket;
import com.projectj.game.personnage.Boss;
import com.badlogic.gdx.audio.Music;
import com.badlogic.gdx.audio.Sound;

import com.projectj.game.personnage.Player;
import org.w3c.dom.Text;

import java.util.ArrayList;
import java.util.Random;


public class Game extends ApplicationAdapter {
	private static final int FRAME_COLS = 4, FRAME_ROWS = 1;

	SpriteBatch batch;
	BitmapFont font;

	boolean menu_on=false;
	boolean command_on=false;
	Random rand=new Random();

	int i;
	int wait = 0;


	BackgroundScrolling background;
	BackgroundMenu backgroundMenu;

	ScrollingObstacle scrollingObstacle;

	Obstacle obstacle_laser_rouge_niv0,obstacle_laser_rouge_niv1,obstacle_laser_rouge_niv2,obstacle_laser_rouge_niv3;
	Obstacle obstacle_laser_jaune_niv0;
	ArrayList<Obstacle> obstacles_list=new ArrayList<>();
	ArrayList<Rocket> rockets = new ArrayList<>();

	Animation<TextureRegion> walkAnimation;
	Animation<TextureRegion> jetAnimation;
	Animation<TextureRegion> firstAnimation;

	Texture walkSheet;
	Texture jetSheet;
	Texture BossSheet;
	Texture test;
	Texture rocketImage;
	Texture death;

	float stateTime;

	Texture ballesPlayer;
	Bullets ballePlayer;
	Texture ballesBoss;
	Bullets balleBoss;
	Player character;
	Boss boss;

	float distance = 1.0f;

	//SOUNDTRACK
	private Sound Sound;
	private Music backgroundMusic;
	private Music BossMusic;
	private Music HomeScreenMusic;

	@Override
	public void create () {
		batch = new SpriteBatch();
		background =new BackgroundScrolling();
		backgroundMenu =new BackgroundMenu();

		font = new BitmapFont();

		//Importation de la music
		backgroundMusic = Gdx.audio.newMusic(Gdx.files.internal("Sounds/GameMusic.mp3"));
		backgroundMusic.setLooping(true);
		backgroundMusic.setVolume(0.5f);
		//Musique Boss
		BossMusic = Gdx.audio.newMusic(Gdx.files.internal("Sounds/BossMusic.mp3"));
		BossMusic.setLooping(true);
		BossMusic.setVolume(0.5f);

		//Musique menu
		HomeScreenMusic = Gdx.audio.newMusic(Gdx.files.internal("Sounds/HomeScreenMusic.mp3"));
		HomeScreenMusic.setLooping(true);
		HomeScreenMusic.setVolume(0.5f);

		//importation des obstacles
		obstacle_laser_rouge_niv0=new Obstacle("laser_rouge_niv0.txt");
		obstacles_list.add(obstacle_laser_rouge_niv0);
		obstacle_laser_rouge_niv1=new Obstacle("laser_rouge_niv1.txt");
		obstacles_list.add(obstacle_laser_rouge_niv1);
		obstacle_laser_rouge_niv2=new Obstacle("laser_rouge_niv2.txt");
		obstacles_list.add(obstacle_laser_rouge_niv2);
		obstacle_laser_rouge_niv3=new Obstacle("laser_rouge_niv3.txt");
		obstacles_list.add(obstacle_laser_rouge_niv3);
		obstacle_laser_jaune_niv0=new Obstacle("laser_niv0.txt");
		obstacles_list.add(obstacle_laser_jaune_niv0);

		//importation des tirs
		ballePlayer = new Bullets(1, 16, 16, 10, 30, 20);
		ballesPlayer = new Texture("lasers/01.png");

		balleBoss = new Bullets(1, 16, 16, 10, 33, 21);
		ballesBoss = new Texture("lasers/02.png");
		rocketImage = new Texture("Missiles_beta.png");


		//importation du personnage
		character = new Player(ballePlayer);

		//on charge les sprites sheets du joueur
		walkSheet = new Texture("BarryWalking.png");
		jetSheet = new Texture("BarryJetpack.png");

		//MORT
		death = new Texture("minecraft_death.png");

		//LE BOSS
		boss = new Boss("Splinter", 4, 130, 75, Gdx.graphics.getWidth() - 130, -200, balleBoss, 10);

		//sprites sheets des boss
		BossSheet = new Texture(Gdx.files.internal("BossMovement.png"));


		//deplacement personnage
		TextureRegion[][] tmp = TextureRegion.split(walkSheet,
				walkSheet.getWidth() / FRAME_COLS,
				walkSheet.getHeight() / FRAME_ROWS);

		TextureRegion[][] tmp2 = TextureRegion.split(jetSheet,
				jetSheet.getWidth() / FRAME_COLS,
				jetSheet.getHeight() / FRAME_ROWS);

		TextureRegion[][] tmp3 = TextureRegion.split(BossSheet,
				BossSheet.getWidth() / 12,
				BossSheet.getHeight());


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
	}

	@Override
	public void render () {
		stateTime += Gdx.graphics.getDeltaTime();
		batch.begin();

		if(backgroundMenu.is_finish() && (menu_on == true)){
			//Le jeu se déroule ICI
			HomeScreenMusic.pause();
			if(!character.isDead()){//Tant qu'on est en vie
				backgroundMusic.play();
				background.update(batch);
				character.update();
				//affichage personnage
				TextureRegion currentFrame;
				if(character.getY() != 10){
					currentFrame = jetAnimation.getKeyFrame(stateTime, true);
				}
				else{
					currentFrame = walkAnimation.getKeyFrame(stateTime, true);
				}
				batch.draw(currentFrame, character.getX(), character.getY());

				//Tirs du personnage
				for(Bullets bullet : character.bullets){
					for (Rocket r : rockets){
						bullet.checkCollisionRocket(r);
					}
					bullet.checkCollision(boss);
					bullet.update();
					batch.draw(ballesPlayer, bullet.getX(), bullet.getY());
				}

				//retire les tirs détruits ou hors maps
				character.reload();
				boss.reload();

				//Le mode classique
				if((int)distance %500!=0 && ((int)distance!=0)){
					BossMusic.pause();
					//UPDATE des Rockets et des Tirs
					for (Rocket r : rockets){
						//on regarde si il y a une collision avec le personnage
						character.checkCollisionRocket(r);
						//Puis on actualise les rockets
						r.update(batch);
						batch.draw(rocketImage,r.getX(), r.getY());
					}
					//Lancement des Rockets
					if(Rocket.genererRocket()){rockets.add(Rocket.creeRocket());}
					for(int i = 0; i < rockets.size(); i++){
						Rocket r = rockets.get(i);
						if((r.getDestroyed()) || (r.getX() < 0)){
							rockets.remove(r);
							i--;
						}
					}
					if(scrollingObstacle==null){
						//choix de l'obstacle
						i=rand.nextInt(obstacles_list.size());
						scrollingObstacle =new ScrollingObstacle(obstacles_list.get(i).readFile);
					}
					else if(scrollingObstacle!=null){
						if(scrollingObstacle.fin_Obstacle()==false){
							scrollingObstacle.update(background.speed);
							//Collision avec les murs
							obstacles_list.get(i).Affichage(batch);
							if(character.collidesWithObstacle(obstacles_list.get(i).readFile)){
								character.getHit(1);
							}
						}
						else{
							i=rand.nextInt(obstacles_list.size());
							scrollingObstacle =new ScrollingObstacle(obstacles_list.get(i).readFile);
						}
					}

					//DISTANCE
					distance += (background.getSpeed() / 10);
					font.draw(batch,("Distance : " + (int) distance), 10, (Gdx.graphics.getHeight() - 10));
				}
				else{
					if(!boss.isDead()){
						//BOSS FIGHT
						backgroundMusic.pause();
						BossMusic.play();
						TextureRegion firstBFrame = firstAnimation.getKeyFrame(stateTime, true);
						batch.draw(firstBFrame, boss.getX(), boss.getY());
						for(Bullets Bbullet : boss.bullets){
							Bbullet.checkCollision(character);
							Bbullet.update();
							batch.draw(ballesBoss, Bbullet.getX(), Bbullet.getY());
						}
						boss.update();
						rockets = new ArrayList<>();
						scrollingObstacle=null;
					}
					else{
						distance++;
					}
				}
			}
			else{
				//GAME OVER
				batch.draw(death, 0, 0);
				if (wait == 100){
					//reset
					menu_on = false;
					backgroundMusic.pause();
					BossMusic.pause();
					character.jetpackSound.setVolume(character.id, 0.0f);
					//nouveau :
					wait=0;
					character =new Player(ballePlayer);
					rockets = new ArrayList<>();
					scrollingObstacle=null;
					obstacles_list=new ArrayList<>();
					//importation des obstacles
					obstacle_laser_rouge_niv0=new Obstacle("laser_rouge_niv0.txt");
					obstacles_list.add(obstacle_laser_rouge_niv0);
					obstacle_laser_rouge_niv1=new Obstacle("laser_rouge_niv1.txt");
					obstacles_list.add(obstacle_laser_rouge_niv1);
					obstacle_laser_rouge_niv2=new Obstacle("laser_rouge_niv2.txt");
					obstacles_list.add(obstacle_laser_rouge_niv2);
					obstacle_laser_rouge_niv3=new Obstacle("laser_rouge_niv3.txt");
					obstacles_list.add(obstacle_laser_rouge_niv3);
					obstacle_laser_jaune_niv0=new Obstacle("laser_niv0.txt");
					obstacles_list.add(obstacle_laser_jaune_niv0);
					distance = 1;
					background =new BackgroundScrolling();
					System.out.println(distance);
					//boss.setLife(4);
					backgroundMenu = new BackgroundMenu();
				}
				else{
					wait++;
				}
			}
		}
		else{
			HomeScreenMusic.play();
			backgroundMenu.update_menu(batch);
			if(Gdx.input.isKeyJustPressed(Input.Keys.P)){
				menu_on=true;
			}
			if(Gdx.input.isKeyJustPressed(Input.Keys.C)){
				command_on=true;
			}
			if(menu_on){
				backgroundMenu.transition_menu();
			}
			if(command_on){
				backgroundMenu.commands_menu(batch);
				if(Gdx.input.isKeyJustPressed(Input.Keys.X)){
					command_on=false;
				}
			}

		}
		batch.end();
	}

}
