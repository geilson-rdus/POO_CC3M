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
public class Agenda {
    
    private List<Contato> contatos = new ArrayList<>(); 
    static int contador = 1;
    
    public void adicionaContato(Contato c){
        contatos.add(contador,c);
        contador++;
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
