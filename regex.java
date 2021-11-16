import java.io.BufferedReader;
import java.io.FileReader;

public class regex {
    public static void main(String[] args) {
        String file = "./results.csv";
    
        try {
            BufferedReader br = new BufferedReader(new FileReader(file));
            String line;
            while((line = br.readLine()) != null) {
                System.out.println(line);
            }

            br.close();
        } catch (Exception e) {
            System.out.println(e);
        }
    }
}

//Sencillamente leemos todas las lineas.