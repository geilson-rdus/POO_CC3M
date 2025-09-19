/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.desafio;

/**
 *
 * @author alunolab10
 */

import java.util.List;
import java.util.ArrayList;

public class Banco {
    ArrayList<Cliente> clientes = new ArrayList<>();
    
    public void adicionaCliente(Cliente c){
        clientes.add(c);
    }
    
    public void removeCliente(String nome){
        int contador = 0;
        for(int i = 0; i < clientes.size(); i++){
            if(clientes.get(i).getNome().equals(nome)){
                clientes.remove(i);
                System.out.println("Conta removida com sucesso.");
                contador++;
            }    
        }
        if(contador==0){
            System.out.println("Nenhuma conta com esse nome foi encontrada");
        }
    }
    
    public void buscaCliente(String nome){
        int contador = 0;
        for(int i = 0; i < clientes.size(); i++){
            if(clientes.get(i).getNome().equals(nome)){
                System.out.println("Cliente: " + clientes.get(i).getNome());
                System.out.println("Conta: " + clientes.get(i).getNumero());
                System.out.println("Saldo: " + clientes.get(i).getSaldo());
                contador++;
            }    
        }
        if(contador==0){
            System.out.println("Nenhuma conta com esse nome foi encontrada");
        }
    }
    
    public void mostraClientes(){
        for(int i = 0; i < clientes.size(); i++){
                System.out.println("Cliente: " + clientes.get(i).getNome());
                System.out.println("Conta: " + clientes.get(i).getNumero());
                System.out.println("Saldo: " + clientes.get(i).getSaldo());
                System.out.println("");
        }
    }
    
    public void depositar(String nome, double valor){
        int contador = 0;
        for(int i = 0; i < clientes.size(); i++){
            if(clientes.get(i).getNome().equals(nome)){
                clientes.get(i).depositar(valor);
                contador++;
            }    
        }
        if(contador==0){
            System.out.println("Nenhuma conta com esse nome foi encontrada");
        }
    }
    
    public void sacar(String nome, double valor){
        int contador = 0;
        for(int i = 0; i < clientes.size(); i++){
            if(clientes.get(i).getNome().equals(nome)){
                clientes.get(i).sacar(valor);
                contador++;
            }    
        }
        if(contador==0){
            System.out.println("Nenhuma conta com esse nome foi encontrada");
        }
    }
    
}
