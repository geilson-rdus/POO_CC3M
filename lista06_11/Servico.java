/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.lista06_11;

/**
 *
 * @author Usuario
 */
class Servico implements Vendavel {
    private String descricao;
    private double valorHora;
    private int horasTrabalhadas;

    public Servico(String descricao, double valorHora, int horasTrabalhadas) {
        this.descricao = descricao;
        this.valorHora = valorHora;
        this.horasTrabalhadas = horasTrabalhadas;
    }

    @Override
    public double calcularPrecoTotal() {
        return valorHora * horasTrabalhadas;
    }

    @Override
    public void aplicarDesconto(double percentual) {
        valorHora -= valorHora * (percentual / 100);
    }
}
