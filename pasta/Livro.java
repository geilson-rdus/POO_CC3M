/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.exfix04;

/**
 *
 * @author Usuario
 */
public class Livro {
    private String titulo;
    private String autor;
    private boolean disponivel;
    
    public Livro(String titulo, String autor){
        this.titulo = titulo;
        this.autor = autor;
        this.disponivel = true;
    }
    
    public String getTitulo(){
        return this.titulo;
    }
    
    public String getAutor(){
        return this.autor;
    }
    
    public void setDisponivel(boolean b){
        this.disponivel = b;
    }
    
}
