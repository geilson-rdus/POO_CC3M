/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.exfix04;

/**
 *
 * @author Usuario
 */
public class Carro {
    private String marca;
    private String modelo;
    private int ano;
    private double velocidade;
    
    public Carro(String marca, String modelo, int ano){
        this.marca = marca;
        this.modelo = modelo;
        this.ano = ano;
        this.velocidade = 0;
    }
    
    public void acelerar(double velocidade){
        this.velocidade += velocidade;
    }
    
    public void frear(double freio){
        if(freio < this.velocidade){
            this.velocidade -= freio;
        }else{
            this.velocidade = 0;
        }
    }
    
    public double getVelocidade(){
        return this.velocidade;
    }
}
