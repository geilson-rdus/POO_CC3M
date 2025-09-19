/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.desafio;

/**
 *
 * @author alunolab10
 */
public class Cliente {
    private String nome;
    private int numeroConta;
    private double saldo;
    
    public Cliente(String nome, int conta){
        this.nome = nome;
        this.numeroConta = conta;
        this.saldo = 0;
    }
    
    public String getNome(){
        return this.nome;
    }
    
    public int getNumero(){
        return this.numeroConta;
    }
    
    public double getSaldo(){
        return this.saldo;
    }
    
    public void depositar(double valor){
        this.saldo += valor;
    }
    
    public void sacar(double valor){
        if(valor <= this.saldo){
            this.saldo -= valor;
        }else{
            System.out.println("O valor inserido é maior do que o disponível na conta ou foi inserido um valor negativo.");
        }
    }
    
    
}

