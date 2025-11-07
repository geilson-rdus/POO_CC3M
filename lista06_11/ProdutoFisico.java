/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.lista06_11;

/**
 *
 * @author Usuario
 */
class ProdutoFisico implements Vendavel {
    private String nome;
    private double preco;
    private int quantidade;

    public ProdutoFisico(String nome, double preco, int quantidade) {
        this.nome = nome;
        this.preco = preco;
        this.quantidade = quantidade;
    }

    @Override
    public double calcularPrecoTotal() {
        return preco * quantidade;
    }

    @Override
    public void aplicarDesconto(double percentual) {
        preco -= preco * (percentual / 100);
    }
}
