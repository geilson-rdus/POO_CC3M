/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.lista06_11;

/**
 *
 * @author Usuario
 */
public class Cliente extends Usuario implements Autenticavel{
    
    public Cliente(String nome, String senha){
        this.nome = nome;
        this.senha = senha;
    }
    
    @Override
    public boolean autenticar(String senha){
        return senha.equals(this.senha);
    }
}