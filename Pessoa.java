/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.exfix04;

/**
 *
 * @author Usuario
 */
public class Pessoa {
    private String nome;
    private String cidade;
    private int idade;
    
    public Pessoa(String nome, String cidade, int idade){
        this.nome = nome;
        this.cidade = cidade;
        this.idade = idade;
    }
    
    public void setCidade(String cidade){
        this.cidade = cidade;
    }
    
    public void mostrarPessoa(){
        System.out.printf("Nome: %s%nCidade: %s%nIdade: %d%n%n",this.nome,this.cidade,this.idade);
    }
}
