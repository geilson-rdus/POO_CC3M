/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 */

package com.mycompany.exerciciosfix2;


import java.util.Scanner;
import java.util.Random;
/**
 *
 * @author Usuario
 */
public class ExerciciosFix2 {

    public static void main(String[] args) throws InterruptedException {
        /*
            EXERCICIOS 1.X = IF ELSE
            EXERCICIOS 2.X = SWITCH CASE
            EXERCICIOS 3.X = WHILE
            EXERCICIOS 4.X = DO WHILE
            EXERCICIOS 5.X = FOR
        */
        
        //EXERCÍCIO 1.1 
        Scanner scanner = new Scanner(System.in);
        System.out.print("Digite um numero inteiro: ");
        int numero = scanner.nextInt();
       
        if(numero%2==0){
            System.out.println("O numero digitado foi " + numero + " e ele eh par.");
        }else{
            System.out.println("O numero digitado foi " + numero + " e ele eh impar.");
        }
        
        scanner.nextLine();
        
        //EXERCÍCIO 1.2
        System.out.print("Digite sua idade: ");
        int idade = scanner.nextInt();
       
        if(idade<18){
            System.out.println("Voce eh menor de idade.");
        }else{
            System.out.println("Voce eh maior de idade.");
        }
        
        scanner.nextLine();
        
        //EXERCÍCIO 1.3
        System.out.print("Digite seu salario: ");
        double salario = scanner.nextFloat();
       
        if(salario<=1000){
            System.out.printf("Seu salario com bonus eh %.2f%n",salario*1.1);
        }else{
            System.out.printf("Seu salario com bonus eh %.2f%n",salario*1.05);
        }
        
        scanner.nextLine();
        
        //EXERCÍCIO 2.1
        System.out.print("Digite o numero do dia da semana [1,7]: ");
        int dia = scanner.nextInt();
        switch(dia){
            case 1:
                System.out.println("Segunda-feira");
                break;
            case 2:
                System.out.println("Terca-feira");
                break;
            case 3:
                System.out.println("Quarta-feira");
                break;
            case 4:
                System.out.println("Quinta-feira");
                break;
            case 5:
                System.out.println("Sexta-feira");
                break;
            case 6:
                System.out.println("Sabado");
                break;
            case 7:
                System.out.println("Domingo");
                break;
            default:
                System.out.println("Numero sem correspondencia");
        }
        scanner.nextLine();
        
        //EXERCÍCIO 2.2
        System.out.print("Digite o numero do mes [1,12]: ");
        int mes = scanner.nextInt();
        switch(mes){
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
                System.out.println("Numero sem correspondencia");
        }
        scanner.nextLine();
        
        //EXERCÍCIO 2.3
        System.out.print("Escolha um desconto digitando um numero [1,3]: ");
        int codigo = scanner.nextInt();
        double produto = 10.0;
        switch(codigo){
            case 1:
                System.out.printf("O produto com desconto de 5%% eh %.2f reais%n",produto * 0.95);
                break;
            case 2:
                System.out.printf("O produto com desconto de 10%% eh %.2f reais%n",produto * 0.90);
                break;
            case 3:
                System.out.printf("O produto com desconto de 15%% eh %.2f reais%n",produto * 0.85);
                break;
            default:
                System.out.println("Numero sem correspondencia");
        }
        scanner.nextLine();
        
        //EXERCÍCIO 3.1
        
        int num = 0;
        while(num < 1){
            System.out.print("Digite um numero inteiro posivito maior que 0: ");
            num = scanner.nextInt();
        }
        int contador = 0;
        while(contador < num){
            contador++;
            System.out.printf("numero %d%n",contador);
        }
        scanner.nextLine();
        
        //EXERCÍCIO 3.2
        int num2 = 0;
        int soma = 0;
        while(num2 >= 0){
            System.out.print("Digite um numero: ");
            num2 = scanner.nextInt();
            if(num2>0){
                soma += num2;
            }
        }
        System.out.printf("Valor da soma: %d%n",soma);
        scanner.nextLine(); 
        
        //EXERCÍCIO 3.3
        Random random = new Random();
        int sorteio = random.nextInt(100) + 1;
        int num3 = 0;
        
        while(num3!=sorteio){
            System.out.print("Digite um numero de 1 a 100: ");
            num3 = scanner.nextInt();
            if(num3 < sorteio){
                System.out.println("O numero sorteado eh maior");
            }else{
                System.out.println("O numero sorteado eh menor");
            }
        }
        System.out.println("Voce acertou o numero!");
        scanner.nextLine();
        
        //EXERCICIO 4.1
        System.out.print("Digite um numero inteiro maior que 0: ");
        int num4 = scanner.nextInt();
        do{
            System.out.printf("numero %d%n", num4);
            num4--;
        }while(num4>0);
        scanner.nextLine();
        
        //EXERCICIO 4.2
        System.out.print("Digite uma senha: ");
        String senha1 = scanner.nextLine();
        String senha2 = null;
        do{
            System.out.print("Repita a senha: ");
            senha2 = scanner.nextLine();
        }while(!senha1.equals(senha2));
        scanner.nextLine();
        
        //EXERCÍCIO 4.3
        int sorteio2 = random.nextInt(100) + 1;
        int num5 = 0;
        
        do{
            System.out.print("Digite um numero de 1 a 100: ");
            num5 = scanner.nextInt();
            if(num5 < sorteio2){
                System.out.println("O numero sorteado eh maior");
            }else{
                System.out.println("O numero sorteado eh menor");
            }
        }while(num5!=sorteio2);
        System.out.println("Voce acertou o numero!");
        scanner.nextLine();
        
        //EXERCICIO 5.1
        System.out.print("Digite um numero inteiro: ");
        int num6 = scanner.nextInt();
        System.out.println("TABUADA");
        for(int i = 1; i < 11; i++){
            System.out.printf("%d * %d = %d%n",num6,i,num6*i);
        }
        scanner.nextLine();
        
        //EXERCICIO 5.2
        for (int i = 10; i > 0; i--) {
            System.out.println(i);
            Thread.sleep(1000); // pausa de 1 segundo
        }
        System.out.println("Feliz Ano Novo!");
        
        //EXERCICIO 5.3
        int somador = 0;
        for(int i = 1; i < 101; i++){
            if(i%2==0){
                somador += i;
            }
        }
        System.out.println("Soma: " + somador);
    }
        
}
