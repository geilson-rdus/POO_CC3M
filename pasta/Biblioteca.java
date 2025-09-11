/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.exfix04;

/**
 *
 * @author Usuario
 */
public class Biblioteca {
    
    private List<Livro> livros = new ArrayList<>(); 
    
    public void adicionarLivro(Livro l){
        livros.add(l);
    }
    
    public void emprestarLivro(int id){
        if(id >= 0 && id<livros.size()){
            boolean b = false;
            livros.get(id).setDisponivel(b);
        }else{
            System.out.println("O indice informado nao esta presente na lista.");
        } 
    }
    
    public void devolverLivro(int id){
        if(id >= 0 && id<livros.size()){
            boolean b = true;
            livros.get(id).setDisponivel(b);
        }else{
            System.out.println("O indice informado nao esta presente na lista.");
        } 
    }
    
}
