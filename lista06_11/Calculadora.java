/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package com.mycompany.lista06_11;

/**
 *
 * @author Usuario
 */
public class Calculadora implements operacaoMatematica{
    @Override
    public double somar(double a, double b){
        return a + b;
    }
    @Override
    public double subtrair(double a, double b){
        return a - b;
    }
    @Override
    public double multiplicar(double a, double b){
        return a * b;
    }
    @Override
    public double dividir(double a, double b){
        return a / b;
    }
}
