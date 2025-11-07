/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 */

package com.mycompany.lista06_11;

/**
 *
 * @author Usuario
 */

import java.util.*;

public class Lista06_11 {

    public static void main(String[] args) {
        
        //QUESTÃO 1
        operacaoMatematica c = new Calculadora();
        
        System.out.println("Soma: " + c.somar(3,7));
        System.out.println("Subtracao: " + c.subtrair(3,7));
        System.out.println("Multiplicacao: " + c.multiplicar(3,7));
        System.out.println("Divisao: " + c.dividir(3,7));
        
        //QUESTÃO 2
        List<Vendavel> itens = new ArrayList<>();

        itens.add(new ProdutoFisico("Notebook", 3000, 2));
        itens.add(new Servico("Manutenção", 100, 10));

        double totalAntes = 0;
        for (Vendavel item : itens) {
            totalAntes += item.calcularPrecoTotal();
        }

        System.out.println("Total antes do desconto: R$ " + totalAntes);

        for (Vendavel item : itens) {
            item.aplicarDesconto(10);
        }

        double totalDepois = 0;
        for (Vendavel item : itens) {
            totalDepois += item.calcularPrecoTotal();
        }

        System.out.println("Total depois do desconto: R$ " + totalDepois);
        
        //QUESTÃO 3
        Animal dog = new Cachorro();
        Animal cat = new Gato();
        Animal bird = new Passaro();
        
        List<Animal> animais = new ArrayList<>();
        
        animais.add(dog);
        animais.add(cat);
        animais.add(bird);
        
        for(Animal a: animais){
            a.emitirSom();
            a.mover();
        }
        
        //QUESTÃO 4
        Veiculo carro = new Carro();
        Veiculo bicicleta = new Bicicleta();

        for (int i = 0; i < 5; i++) {
            carro.acelerar(10);
            bicicleta.acelerar(10);
        }

        carro.frear(5);
        bicicleta.frear(3);

        System.out.println("Velocidade final do carro: " + carro.getVelocidadeAtual() + " km/h");
        System.out.println("Velocidade final da bicicleta: " + bicicleta.getVelocidadeAtual() + " km/h");
        System.out.println("");
        
        //QUESTÃO 5
        Administrador adm = new Administrador("Carlos", "admin1");
        Cliente cli = new Cliente("Maria", "1234");

        adm.exibirDados();
        System.out.println("Autenticacao administrador: " + adm.autenticar("admin1234"));

        cli.exibirDados();
        System.out.println("Autenticacao cliente: " + cli.autenticar("4321"));
    }
}
