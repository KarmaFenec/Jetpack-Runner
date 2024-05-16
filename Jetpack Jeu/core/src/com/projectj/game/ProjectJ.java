package com.projectj.game;

import com.badlogic.gdx.ApplicationAdapter;
import com.projectj.game.personnage.Player;
import com.projectj.game.personnage.Boss;
import java.util.Iterator;

import com.badlogic.gdx.Gdx;
import com.badlogic.gdx.Input;
import com.badlogic.gdx.audio.Music;
import com.badlogic.gdx.audio.Sound;
import com.badlogic.gdx.graphics.OrthographicCamera;
import com.badlogic.gdx.graphics.Texture;
import com.badlogic.gdx.graphics.g2d.SpriteBatch;
import com.badlogic.gdx.math.MathUtils;
import com.badlogic.gdx.math.Rectangle;
import com.badlogic.gdx.math.Vector3;
import com.badlogic.gdx.utils.Array;
import com.badlogic.gdx.utils.ScreenUtils;
import com.badlogic.gdx.utils.TimeUtils;
import com.badlogic.gdx.graphics.glutils.ShapeRenderer;
import com.badlogic.gdx.graphics.GL20;
import com.badlogic.gdx.math.Rectangle;

public class ProjectJ extends ApplicationAdapter {

	Player character;
	Boss boss;
	private Texture pelo;
	private Texture pelo2;
	private SpriteBatch batch;
	private OrthographicCamera camera;
	private Rectangle bonhomme;
	
	
	
	@Override
	public void create () {
		character = new Player();
		boss = new Boss("terminator", 10, 10);

		pelo = new Texture(Gdx.files.internal("SpaceExplorerSheet.png"));

		camera = new OrthographicCamera();
		camera.setToOrtho(false, 800, 480);
		batch = new SpriteBatch();

		bonhomme = new Rectangle();
		bonhomme.x = (800 / 2) - (64 / 2);
		bonhomme.y = 20;
		bonhomme.width = 64;
		bonhomme.height = 64;

	}

	@Override
	public void render () {
		/*
		character.update();
		boss.update();
		*/

		Gdx.gl.glClear(GL20.GL_COLOR_BUFFER_BIT);
		
		camera.update();

		batch.setProjectionMatrix(camera.combined);

		batch.begin();
		batch.draw(pelo, 10, 10);
		batch.end();

	}
	
	@Override
	public void dispose(){
		pelo.dispose();
		batch.dispose();
	}

}
