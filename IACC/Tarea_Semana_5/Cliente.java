
/**
 * 
 * 
 * @author 
 * @version 
 */
public class Cliente {
    public String nombre;
    public int telefono;
    
    public Cliente(String nombre, int fono) {
        this.nombre = nombre;
        this.telefono = fono;
    }
    
    public void infoCliente() {
        System.out.println("Nombre: " + this.nombre);
        System.out.println("Telefono: " + this.telefono);
        System.out.println("--------------------------------- \n");
    }

}
