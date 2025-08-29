/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.main;

/**
 *
 * @author Usuario
 */
import java.util.Scanner;

/**
 *
 * @author alunolab10
 */
public class Pessoa{
    String nome;
    int idade;
    
    public Pessoa cadastraPessoa(){
        Scanner scanner = new Scanner(System.in);
        Pessoa pessoa = new Pessoa();
        System.out.print("Informe o nome: ");
        pessoa.nome = scanner.nextLine();
        System.out.print("Informe a idade: ");
        pessoa.idade = scanner.nextInt();
        return pessoa;
    }
    
    public static void calculaMedia(int a, int b, int c, int d, int e){
        double soma = a + b + c + d + e;
        double media = soma/5;
        System.out.println("Media de Idades: " + media);
    }
    
    public static void maiorIdade(int a, int b, int c, int d, int e){
        int[] idades = {a,b,c,d,e};
        int maior = idades[0];
        for(int i = 0; i < idades.length; i++){
            if(idades[i] > maior){
                maior = idades[i];
            }
        }
        
        System.out.println("A maior idade: " + maior);
    }
    
    public static void menorIdade(int a, int b, int c, int d, int e){
        int[] idades = {a,b,c,d,e};
        int menor = idades[0];
        for(int i = 0; i < idades.length; i++){
            if(idades[i] < menor){
                menor = idades[i];
            }
        }
        
        System.out.println("A menor idade: " + menor);
    }
    
    public static void qtdMaiorIdade(int a, int b, int c, int d, int e){
        int contador = 0;
        if(a >= 18){
            contador++;
        }
        if(b >= 18){
            contador++;
        }
        if(c >= 18){
            contador++;
        }
        if(d >= 18){
            contador++;
        }
        if(e >= 18){
            contador++;
        }
        
        System.out.println("A quantidade de pessoas maior de idade: " + contador);
    }
    
}
