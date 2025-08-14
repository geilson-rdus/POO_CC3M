/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 */

package com.mycompany.exerciciosfix2;


import java.util.Scanner;
/**
 *
 * @author Usuario
 */
public class ExerciciosFix2 {

    public static void main(String[] args) {
        
        //EXERCÍCIO 1 
        Scanner scanner = new Scanner(System.in);
        System.out.print("Digite um numero inteiro: ");
        int numero = scanner.nextInt();
       
        if(numero%2==0){
            System.out.println("O numero digitado foi " + numero + " e ele eh par.");
        }else{
            System.out.println("O numero digitado foi " + numero + " e ele eh impar.");
        }
        
        scanner.nextLine();
        
        //EXERCÍCIO 2
        System.out.print("Digite sua idade: ");
        int idade = scanner.nextInt();
       
        if(idade<18){
            System.out.println("Voce eh menor de idade.");
        }else{
            System.out.println("Voce eh maior de idade.");
        }
        
        scanner.nextLine();
        
        //EXERCÍCIO 3
        System.out.print("Digite seu salario: ");
        double salario = scanner.nextFloat();
       
        if(salario<=1000){
            System.out.println("Seu salario com bonus eh " + salario*1.1);
        }else{
            System.out.println("Seu salario com bonus eh " + salario*1.05);
        }
        
        scanner.nextLine();
    }
}
