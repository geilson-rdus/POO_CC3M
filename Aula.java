/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 */

package com.mycompany.aula;

/**
 *
 * @author alunodev10
 */

import java.util.Scanner;

public class Aula {

    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        
        System.out.println("Digite o numero do dia: ");
        int dia = scanner.nextInt();
        funcoes.diaSemana(dia);
        
        
        System.out.println("Digite o numero do mes: ");
        int mes = scanner.nextInt();
        funcoes.identificaMes(mes);
        
        System.out.println("Digite um numero no intervalo [1,3]: ");
        int desconto = scanner.nextInt();
        funcoes.calculaDesconto(desconto);
        
        System.out.println("Digite um numero inteiro positivo: ");
        int num = scanner.nextInt();
        funcoes.contagemCrescente(num);
    }
}
