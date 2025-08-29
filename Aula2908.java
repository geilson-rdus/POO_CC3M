/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 */

package com.mycompany.aula2908;

/**
 *
 * @author alunolab10
 */
public class Aula2908 {

    public static void main(String[] args) {
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
        
        Pessoa.media(a.idade, b.idade, c.idade, d.idade, e.idade);
        Pessoa.maiorIdade(a.idade, b.idade, c.idade, d.idade, e.idade);
        Pessoa.menorIdade(a.idade, b.idade, c.idade, d.idade, e.idade);
        Pessoa.qtdMaiorIdade(a.idade, b.idade, c.idade, d.idade, e.idade);
    }
}
