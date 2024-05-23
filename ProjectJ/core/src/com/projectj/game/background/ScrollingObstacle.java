package com.projectj.game;

import com.badlogic.gdx.math.Rectangle;

public class ScrollingObstacle extends BackgroundScrolling{
    ReadFile rf;


    float sp;


    public ScrollingObstacle(ReadFile rf) {
        this.rf=rf;
    }

    public void update(float speedBackground){

        sp = speedBackground;
        if(rf.laser_rouge.isEmpty()==false){
            for(Rectangle b : rf.laser_rouge){
                if(b.x-sp>50){
                    b.x-=sp;
                }
                if(b.x-sp<=50){
                    rf.laser_rouge.removeValue(b,true);
                }
            }
        }
        if(rf.laser_rouge_base_haut.isEmpty()==false){
            for(Rectangle b : rf.laser_rouge_base_haut){
                if(b.x-sp>50){
                    b.x-=sp;
                }
                if(b.x-sp<=50){
                    rf.laser_rouge_base_haut.removeValue(b,true);
                }
            }
        }
        if(rf.laser_rouge_base_bas.isEmpty()==false){
            for(Rectangle b : rf.laser_rouge_base_bas){
                if(b.x-sp>50){
                    b.x-=sp;
                }
                if(b.x-sp<=50){
                    rf.laser_rouge_base_bas.removeValue(b,true);
                }
            }
        }

        if(rf.laser_jaune.isEmpty()==false){
            for(Rectangle b : rf.laser_jaune){
                if(b.x-sp>50){
                    b.x-=sp;
                }
                if(b.x-sp<=50){
                    rf.laser_jaune.removeValue(b,true);
                }
            }
        }

        if(rf.laser_jaune_base_gauche.isEmpty()==false){
            for(Rectangle b : rf.laser_jaune_base_gauche){
                if(b.x-sp>50){
                    b.x-=sp;
                }
                if(b.x-sp<=50){
                    rf.laser_jaune_base_gauche.removeValue(b,true);
                }
            }
        }
        if(rf.laser_jaune_base_droit.isEmpty()==false){
            for(Rectangle b : rf.laser_jaune_base_droit){
                if(b.x-sp>50){
                    b.x-=sp;
                }
                if(b.x-sp<=50){
                    rf.laser_jaune_base_droit.removeValue(b,true);
                }
            }
        }


    }

    public boolean fin_Obstacle(){
        if(rf.laser_rouge_base_haut.isEmpty() && rf.laser_rouge_base_bas.isEmpty() && rf.laser_rouge.isEmpty() && rf.laser_jaune.isEmpty() && rf.laser_jaune_base_gauche.isEmpty() && rf.laser_jaune_base_droit.isEmpty()){
            return true;
        }
        return false;
    }
}
