/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.lista06_11;

/**
 *
 * @author Usuario
 */
public abstract class Usuario {
    protected String nome;
    protected String senha;

    public void exibirDados() {
        System.out.println("Nome: " + nome);
    }
}
