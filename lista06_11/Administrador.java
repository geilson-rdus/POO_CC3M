/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.lista06_11;

/**
 *
 * @author Usuario
 */

import java.util.Scanner;

public class Administrador extends Usuario implements Autenticavel{
    
    public Administrador(String nome, String senhaInicial){
        Scanner sc = new Scanner(System.in);
        this.nome = nome;
        this.senha = senhaInicial;

        while (!senhaValida(this.senha)) {
            System.out.println("Senha invalida! Deve ter mais de 8 caracteres e conter ao menos um numero.");
            System.out.print("Digite uma nova senha para o administrador: ");
            this.senha = sc.nextLine();
        }

        System.out.println("Senha criada com sucesso!\n");
    }
    
    private boolean senhaValida(String senha) {
        return senha.length() > 8 && senha.matches(".*\\d.*");
    }
    
    @Override
    public boolean autenticar(String senha){
        return senha.equals(this.senha);
    }
}
