import java.util.Scanner;
 
public class CircleAreaCalculator {
 
    public static void main(String[] args) {
         
        Scanner scan = new Scanner(System.in);
         
        System.out.print("กรุณากรอกตัวเลขของรัศมี : ");
        double r = scan.nextDouble();
         
        scan.close();
         
        System.out.printf("\r\nพื้นที่ของวงกลม คือ %.2f", Math.PI * (r * r));
    }
}