/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.lista06_11;

/**
 *
 * @author Usuario
 */
public class Bicicleta implements Veiculo{
    private int velocidadeAtual;
    
    public Bicicleta(){
        this.velocidadeAtual = 0;
    }
    
    @Override
    public void acelerar(int intensidade){
        this.velocidadeAtual = this.velocidadeAtual + intensidade;
    }
    @Override
    public void frear(int intensidade){
        this.velocidadeAtual = this.velocidadeAtual - intensidade;
    }
    @Override
    public int getVelocidadeAtual(){
        return this.velocidadeAtual;
    }    
}
