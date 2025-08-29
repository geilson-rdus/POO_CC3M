/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.main;

/**
 *
 * @author Usuario
 */
public class PopulacaoBaratas {
    int qtdBaratas;
    
    public void aumentaBaratas(){
        this.qtdBaratas *= 1.5;
    }
    
    public void spray(){
        this.qtdBaratas *= 0.9;
    }
    
    public int getNumeroBaratas(){
        return this.qtdBaratas;
    }
}
