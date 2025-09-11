/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.mavenproject1;

/**
 *
 * @author alunolab10
 */
public class Contato {
    private String telefone;
    private String nome;
    
    
    public Contato(String telefone, String nome){
        this.telefone = telefone;
        this.nome = nome;
    }
    
    public String getNome(){
        return this.nome;
    }
}
