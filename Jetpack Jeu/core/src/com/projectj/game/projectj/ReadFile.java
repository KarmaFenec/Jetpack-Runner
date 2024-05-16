package com.gdx.projectj;

import com.badlogic.gdx.Gdx;
import com.badlogic.gdx.files.FileHandle;
import com.badlogic.gdx.graphics.Texture;
import com.badlogic.gdx.math.Rectangle;

public class ReadFile {
    FileHandle fileHandle;
    String fileContent;
    int xSpeed;
    private Texture charImage;
    private Texture mobImage;
    private Rectangle chara;

    public void PrintString(){
        fileHandle = Gdx.files.internal("../assets/test01.txt");
        fileContent = fileHandle.readString();
        for(int i=0; i< fileContent.length(); i++){
            if(fileContent.charAt(i) == "▒"){
                //créé un retangle d'obstacle
            }
            if(fileContent.charAt(i) == "☻"){
                //créé un rectangle du character
                //créé un caractère
                chara = new Rectangle();
                //Position arbitraire du héro
                chara.x = 100;
                chara.y = 20;
                //taille par défaut d'un rectangle
                bucket.width = 64;
                bucket.height = 64;

            }
            if(fileContent.charAt(i) =="◄"){
                //créé un rectangle du mob
            }
        }
    }
    //System.out.println(fileContent);
}
