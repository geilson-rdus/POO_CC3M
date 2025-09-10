/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.exfix04;

/**
 *
 * @author Usuario
 */

import java.util.List;
import java.util.ArrayList;

public class main {
   public static void main(String [] args){
       //EXERCICIO 1
       
       Pessoa p1 = new Pessoa("Geilson","Vila Velha",25);
       Pessoa p2 = new Pessoa("Livia","Vila Velha",20);
       Pessoa p3 = new Pessoa("Augusto","Vitoria",19);
       
       p1.mostrarPessoa();
       p2.mostrarPessoa();
       p3.mostrarPessoa();
       
       p1.setCidade("Rio de Janeiro");
       p2.setCidade("Sao Paulo");
       p3.setCidade("Cariacica");
       
       p1.mostrarPessoa();
       p2.mostrarPessoa();
       p3.mostrarPessoa();
       
       //EXERCICIO 2
       
       ContaBancaria b1 = new ContaBancaria("Geilson",1043);
       ContaBancaria b2 = new ContaBancaria("Hiro",1044);
       
       b1.deposito(1000);
       b2.deposito(500);
       b1.saque(400);
       b2.saque(700);
       
       b1.mostrarSaldo();
       b2.mostrarSaldo();
       
       //EXERCICIO 3
       
       List<Produto> produtos = new ArrayList<>();
       
       produtos.add(new Produto("Mouse",50,50));
       produtos.add(new Produto("Teclado",200,25));
       produtos.add(new Produto("Headset",400,30));
       
       double precoEstoque = Produto.getPrecoEstoque();
       
       System.out.println("O preco do estoque eh: " + precoEstoque);
       
       //EXERCICIO 6
       
       Retangulo r1 = new Retangulo(10,8);
       Retangulo r2 = new Retangulo(12,3);
       
       double pr1 = r1.perimetro();
       double pr2 = r2.perimetro();
       double ar1 = r1.area();
       double ar2 = r2.area();
       
       if(ar1 > ar2){
           System.out.println("A area do primeiro retangulo eh maior, " + ar1 + " > " + ar2);
       }else if(ar2 > ar1){
           System.out.println("A area do segundo retangulo eh maior, " + ar2 + " > " + ar1);
       }else{
           System.out.println("As areas sao iguais, " + ar2 + " = " + ar1);
       }
       
       //EXERCICIO 8
       
       Calculadora.somar(10,5);
       Calculadora.subtrair(10, 5);
       Calculadora.multiplicar(10, 5);
       Calculadora.dividir(10, 5);
       
       //EXERCICIO 10
       
       Personagem per1 = new Personagem("Thomas",100,30);
       Personagem per2 = new Personagem("Kenai",60,30);
       
       while(per1.getVida() > 0 && per2.getVida() > 0){
           per2.ataca(per1.getForca());
           System.out.println(per1.getNome() + " ataca " + per2.getNome());
           System.out.println("Vida de " + per2.getNome() + ": " + per2.getVida());
           if(per2.getVida()>0){
                per1.ataca(per2.getForca());
                System.out.println(per2.getNome() + " ataca " + per1.getNome());
                System.out.println("Vida de " + per1.getNome() + ": " + per1.getVida());
           }
        }
       
       if(per1.getVida() > per2.getVida()){
           System.out.println("O vencedor foi " + per1.getNome());
       }else{
           System.out.println("O vencedor foi " + per2.getNome());
       }
   } 
}
