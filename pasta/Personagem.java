/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.exfix04;

/**
 *
 * @author Usuario
 */
public class Personagem {
    private String nome;
    private int vida;
    private int forca;
    
    public Personagem(String nome, int vida, int forca){
        this.nome = nome;
        this.vida = vida;
        this.forca = forca;
    }
    
    public int getForca(){
        return this.forca;
    }
    
    public int getVida(){
        return this.vida;
    }
    
    public String getNome(){
        return this.nome;
    }
    
    public void ataca(int forca){
        this.vida -= forca;
    }
}
