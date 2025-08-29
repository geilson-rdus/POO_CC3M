/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 */

package com.mycompany.main;


import java.util.Random;
/**
 *
 * @author Usuario
 */
public class Main {

    public static void main(String[] args) {
        
        //Exercício Classe Pessoa
        Pessoa a = new Pessoa();
        Pessoa b = new Pessoa();
        Pessoa c = new Pessoa();
        Pessoa d = new Pessoa();
        Pessoa e = new Pessoa();
        
        a = a.cadastraPessoa();
        b = b.cadastraPessoa();
        c = c.cadastraPessoa();
        d = d.cadastraPessoa();
        e = e.cadastraPessoa();
        
        Pessoa.calculaMedia(a.idade, b.idade, c.idade, d.idade, e.idade);
        Pessoa.maiorIdade(a.idade, b.idade, c.idade, d.idade, e.idade);
        Pessoa.menorIdade(a.idade, b.idade, c.idade, d.idade, e.idade);
        Pessoa.qtdMaiorIdade(a.idade, b.idade, c.idade, d.idade, e.idade);
        
        //Exercício Classe Baratas
        
        Random random = new Random();
        PopulacaoBaratas baratas = new PopulacaoBaratas();
        baratas.qtdBaratas = random.nextInt(10000)+1;
        int qtd = baratas.getNumeroBaratas();
        System.out.println("A populacao atual de baratas eh " + qtd);
        baratas.aumentaBaratas();
        baratas.spray();
        qtd = baratas.getNumeroBaratas();
        System.out.println("A populacao atual de baratas apos reproducao e spray eh " + qtd);
    }
}
