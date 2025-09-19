/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 */

package com.mycompany.desafio;

/**
 *
 * @author alunolab10
 */

import java.util.Scanner;

public class Desafio {

    public static void main(String[] args) {
        Banco b = new Banco();
        Scanner s = new Scanner(System.in);
       
        int opcao = 0;
        String nome = "";
        int numeroConta = 0;
        double valor = 0;
        
        do{
            System.out.println("");
            System.out.println("----MENU----");
            System.out.println("1 - Criar Conta");
            System.out.println("2 - Apagar Conta");
            System.out.println("3 - Buscar Conta");
            System.out.println("4 - Listar Contas");
            System.out.println("5 - Depositar");
            System.out.println("6 - Sacar");
            System.out.println("0 - Sair do Programa");
            System.out.print("Informe a opção: ");
            opcao = s.nextInt();
            s.nextLine(); 
            
            switch(opcao){
                    case 1:
                        System.out.print("Informe o nome: ");
                        nome = s.nextLine();
                        System.out.print("Informe o número da conta: ");
                        numeroConta = s.nextInt();
                        System.out.println(nome);
                        System.out.println(numeroConta);
                        Cliente c = new Cliente(nome,numeroConta);
                        b.adicionaCliente(c);
                        break;
                    case 2:
                        System.out.print("Informe o nome: ");
                        nome = s.nextLine();
                        b.removeCliente(nome);
                        break;
                    case 3:
                        System.out.print("Informe o nome: ");
                        nome = s.nextLine();
                        b.buscaCliente(nome);
                        break;
                    case 4:
                        b.mostraClientes();
                        break;
                    case 5:
                        System.out.print("Informe o nome: ");
                        nome = s.nextLine();
                        System.out.print("Informe o valor: ");
                        valor = s.nextFloat ();
                        b.depositar(nome, valor);
                        break;
                    case 6:
                        System.out.print("Informe o nome: ");
                        nome = s.nextLine();
                        System.out.print("Informe o valor: ");
                        valor = s.nextFloat ();
                        b.sacar(nome, valor);
                        break;
                    case 0:
                        System.out.println("Programa Encerrado");
                        break;
                        
            }
                        
        }while(opcao != 0);  
    }
}
