/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.exfix04;

/**
 *
 * @author Usuario
 */
public class ContaBancaria {
    private String titular;
    private double saldo;
    private int numero;
    
    public ContaBancaria(String titular, int numero){
        this.titular = titular;
        this.saldo = 0;
        this.numero = numero;
    }
    
    public void deposito(double valor){
        this.saldo += valor;
    }
    
    public void saque(double valor){
        if(valor <= this.saldo){
            this.saldo -= valor;
        }else{
            System.out.println("O valor informado eh maior que o disponvel para saque.");
        }
    }
    
    public String getTitular(){
        return this.titular;
    }
    
    public double getSaldo(){
        return this.saldo;
    }
    
    public int getNumero(){
        return this.numero;
    }
    
    public void mostrarSaldo(){
        System.out.printf("%nTitular: %s%nNumero: %d%nSaldo: %.2f%n",this.titular,this.numero,this.saldo);
    }
    
}
