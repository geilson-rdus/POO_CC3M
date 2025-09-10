/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.exfix04;

/**
 *
 * @author Usuario
 */
public class Produto {
    private String nome;
    private double preco;
    private int qtd;
    private static double precoEstoqueLoja;

    public Produto(String nome, double preco, int qtd){
        this.nome = nome;
        this.preco = preco;
        this.qtd = qtd;
        precoEstoqueLoja += this.estoqueProduto();
    }
    
    public double estoqueProduto(){
        return this.preco * this.qtd;
    }
    
    public static double getPrecoEstoque(){
        return precoEstoqueLoja;
    }
}
