import java.util.Scanner;

public class Lista {

    public static void main(String[] args) {
        //EXERCICIO 1
        Scanner scanner = new Scanner(System.in);
        System.out.println("Insira a primeira nota: ");
        float nota_1 = scanner.nextFloat();
        System.out.println("Insira a segunda nota: ");
        float nota_2 = scanner.nextFloat();
        System.out.println("Insira a terceira nota: ");
        float nota_3 = scanner.nextFloat();
        
        float media = (nota_1 + nota_2 + nota_3)/3;
        System.out.printf("Média: %.2f\n",media);
        
        //EXERCICIO 2
        System.out.println("Insira temperatura em graus celsius: ");
        float celsius = scanner.nextFloat();
        
        float fahrenheit = ((celsius * 9)/5) + 32;
        System.out.printf("Fahrenheint: %.2f°F\n",fahrenheit);
        
        //EXERCICIO 3
        System.out.println("Insira seu nome: ");
        String nome = scanner.nextLine();
        System.out.println("Insira seu sobrenome: ");
        String sobrenome = scanner.nextLine();
        System.out.println("Seu nome completo: " + nome + " " + sobrenome);
        
        //EXERCICIO 4
        System.out.println("Escreva uma frase: ");
        String frase = scanner.nextLine();
        int size = frase.length();
        System.out.println("O tamanho da frase é: " + size + " caracteres.");
        
        //EXERCICIO 5
        System.out.println("Informe o raio do círculo: ");
        float raio = scanner.nextFloat();
        double area = Math.PI * raio * raio;
        System.out.printf("Área do círculo: %.2f",area);
        
        scanner.close();
    }
}
