/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.exfix04;

/**
 *
 * @author Usuario
 */
public class Retangulo {
    private int largura;
    private int altura;
    
    public Retangulo(int largura, int altura){
        this.largura = largura;
        this.altura = altura;
    }
    
    public double perimetro(){
        return (this.largura*2) + (this.altura*2);
    }
    
    public double area(){
        return this.largura * this.altura;
    }
    
}
