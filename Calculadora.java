/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.exfix04;

/**
 *
 * @author Usuario
 */
public class Calculadora {
    
    public static void somar(int num1, int num2){
        System.out.println("Soma: " + (num1 + num2));
    }
    
    public static void subtrair(int num1, int num2){
        System.out.println("Subtracao: " + (num1 - num2));
    }
    
    public static void multiplicar(int num1, int num2){
        System.out.println("Multiplicacao: " + (num1 * num2));
    }
    
    public static void dividir(int num1, int num2){
        if(num2 != 0){
            System.out.println("Divisao: " + (num1 / num2));
        }else{
            System.out.println("Nao eh possivel realizar divisao por 0");
        }
    }

}
