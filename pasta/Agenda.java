/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.mavenproject1;


import java.util.ArrayList;
import java.util.List;

/**
 *
 * @author alunolab10
 */
public class Agenda{
    
    private List<Contato> contatos = new ArrayList<>(); 
    
    public void adicionarContato(Contato c){
        contatos.add(c);
    }
    
    public void removerContato(int id){
        if(id >= 0 && id<contatos.size()){
            contatos.remove(id); 
        }else{
            System.out.println("O indice informado nao esta presente na lista.");
        } 
    }
    
    public void atualizarContato(int id, String nome, String telefone){
        if(id >=0 && id<contatos.size()){
            this.contatos.get(id).setNome(nome);
            this.contatos.get(id).setNome(telefone);
        }else{
            System.out.println("O indice informado nao esta presente na lista.");
        }
    }
    
    public void mostraAgenda(){
        for(int i=0;i<this.contatos.size();i++){
            System.out.println("Contato: " + this.contatos.get(i).getNome());
        }
    }
    
    public void mostraContato(int id){
        System.out.println("Contato: " + this.contatos.get(id).getNome());
    }
}

