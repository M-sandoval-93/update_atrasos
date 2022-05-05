
/**
 * Clase Secretario que hereda de Empleado
 * 
 * @author: Mario Sandoval Luengo
 * @version. 06 de mayo 2022
 */
public class Secretario extends Empleado {
    
    private String despacho;
    private int n_fax;
    
    public Secretario(String nombre, String apellido, String dni, String direccion, int telefono, double salario) {
        super(nombre, apellido, dni, direccion, telefono, salario);
        this.despacho = "";
        this.n_fax = 0;
        this.puesto = "Secretario";
        this.aumento = 0.10;
    }
    
    public Secretario(String nombre, String apellido, String dni, String direccion, int a_antiguedad, int telefono, double salario, String despacho, int n_fax) {
        super(nombre, apellido, dni, direccion, a_antiguedad, telefono, salario);
        this.despacho = despacho;
        this.n_fax = n_fax;
        this.puesto = "Secretario";
        this.aumento = 0.10;
    }
    

}
