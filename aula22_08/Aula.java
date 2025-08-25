/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 */

package com.mycompany.aula;

/**
 *
 * @author alunodev10
 */

import java.util.Scanner;
import java.util.Random;

public class Aula {

    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        Random random = new Random();
        //EXERCICIO 4
        System.out.print("Digite o numero do dia: ");
        int dia = scanner.nextInt();
        funcoes.diaSemana(dia);
        scanner.nextLine();
        //EXERCICIO 5
        System.out.print("Digite o numero do mes: ");
        int mes = scanner.nextInt();
        funcoes.identificaMes(mes);
        scanner.nextLine();
        //EXERCICIO 6
        System.out.print("Digite um numero no intervalo [1,3]: ");
        int desconto = scanner.nextInt();
        funcoes.calculaDesconto(desconto);
        scanner.nextLine();
        //EXERCICIO 7
        System.out.print("Digite um numero inteiro positivo: ");
        int num = scanner.nextInt();
        funcoes.contagemCrescente(num);
        scanner.nextLine();
        //EXERCICIO 8
        int soma = funcoes.somatorio(scanner);
        System.out.println("A Soma dos valores digitados eh " + soma);
        scanner.nextLine();
        //EXERCICIO 9
        int sorteio = random.nextInt(100)+1;
        funcoes.sorteio(scanner,sorteio);
        //EXERCICIO 10
        System.out.print("Digite um numero inteiro positivo: ");
        num = scanner.nextInt();
        funcoes.contagemRegressiva(num);
        scanner.nextLine();
        //EXERCICIO 11
        System.out.print("Digite uma senha: ");
        String senha = scanner.nextLine();
        funcoes.confirmaSenha(senha,scanner);
    }
}
