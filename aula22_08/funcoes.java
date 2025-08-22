/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.aula;

/**
 *
 * @author alunodev10
 */
public class funcoes {
    public static void diaSemana(int a){
        switch(a){
            case 1:
                System.out.println("Domingo");
                break;
            case 2:
                System.out.println("Segunda-feira");
                break;
            case 3:
                System.out.println("Terca-feira");
                break;
            case 4:
                System.out.println("Quarta-feira");
                break;
            case 5:
                System.out.println("Quinta-feira");
                break;
            case 6:
                System.out.println("Sexta-feira");
                break;
            case 7:
                System.out.println("Sabado");
                break;
            default:
                System.out.println("O numero nao possui dia correspondente");
        }
    }
    
    public static void identificaMes(int a){
        switch(a){
            case 1:
                System.out.println("Janeiro");
                break;
            case 2:
                System.out.println("Fevereiro");
                break;
            case 3:
                System.out.println("Marco");
                break;
            case 4:
                System.out.println("Abril");
                break;
            case 5:
                System.out.println("Maio");
                break;
            case 6:
                System.out.println("Junho");
                break;
            case 7:
                System.out.println("Julho");
                break;
            case 8:
                System.out.println("Agosto");
                break;
            case 9:
                System.out.println("Setembro");
                break;
            case 10:
                System.out.println("Outubro");
                break;
            case 11:
                System.out.println("Novembro");
                break;
            case 12:
                System.out.println("Dezembro");
                break;
            default:
                System.out.println("O numero nao possui mes correspondente");
        }
    }
    
    public static void calculaDesconto(int a){
        double produto = 1000;
        double desconto = 0;
        switch(a){
            case 1:
                desconto = produto * 0.95;
                System.out.printf("O produto com desconto de 5%% eh: %.2f%n",desconto);
                break;
            case 2:
                desconto = produto * 0.90;
                System.out.printf("O produto com desconto de 10%% eh: %.2f%n",desconto);
                break;
            case 3:
                desconto = produto * 0.85;
                System.out.printf("O produto com desconto de 15%% eh: %.2f%n",desconto);
                break;
            default:
                System.out.println("Digitou um numero fora do intervalo");
        }
    }
    
    public static void contagemCrescente(int a){
        int contador = 1;
        while(contador <= a){
            System.out.printf("%d ",contador);
            contador++;
        }
    }
    
    
}
