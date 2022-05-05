/**
 * Clase abstracta empleado
 * 
 * @author: Mario Sandoval Luengo
 * Date: 06 de mayo 2022
 */

abstract class Empleado {
    protected String nombre;
    protected String apellido;
    protected String DNI;
    protected String direccion;
    protected int anio_antiguedad;
    protected int telefono;
    protected double salario;
    protected Empleado supervisor;
    protected String puesto;
    protected double aumento;
    
    Empleado(String nombre, String apellido, String dni, String direccion, int telefono, double salario) {
        this.nombre = nombre;
        this.apellido = apellido;
        this.DNI = dni;
        this.direccion = direccion;
        this.anio_antiguedad = 0;
        this.telefono = telefono;
        this.salario = salario;
        this.supervisor = this;
        
    }
    
    Empleado(String nombre, String apellido, String dni, String direccion, int a_antiguedad, int telefono, double salario) {
        this.nombre = nombre;
        this.apellido = apellido;
        this.DNI = dni;
        this.direccion = direccion;
        this.anio_antiguedad = a_antiguedad;
        this.telefono = telefono;
        this.salario = salario;
        this.supervisor = this;
        
    }
    
    // Método para imprimir los datos del empleado
    // public void imprimirDatos() {
        // System.out.println("Los datos del empleado son los siguientes: \n");
        // System.out.println("Nombres: " + this.nombre + this.apellido);
        // System.out.println("DNI: " + this.DNI);
        // System.out.println("Dirección: " + this.direccion);
        // System.out.println("años de antiguedad: " + this.anio_antiguedad);
        // System.out.println("Telefono: " + this.telefono);
        // System.out.println("Salario: " + this.salario);
        
        // if (this.supervisor == null) {
            // System.out.println("Supervisor: Sin supervisor asignado");
        // } else {
            // System.out.println("Supervisor: " + this.supervisor.nombre);
        // }
        
    // }
    
    public void imprimirDato() {
        System.out.println("Los datos del empleado son los siguientes: \n");
        System.out.println("Nombres: " + this.nombre + this.apellido);
        System.out.println("DNI: " + this.DNI);
        System.out.println("Dirección: " + this.direccion);
        System.out.println("");
        System.out.println("Puesto: " + this.puesto);
    }
    
    // Método para modificar el supervisor del empleado.
    public void setSupervisor(Empleado supervisor) {
        this.supervisor = supervisor;
    }
    
    // Método para icrementar salario
    public void incrementoSalario() {
        System.out.println("El salario actual del ampleado " + this.nombre + ", es: $ " + this.salario);
        this.salario = this.salario + (this.salario * this.aumento);
        System.out.println("A sido aumentado un " + this.aumento + "%, quedando en: $ " + this.salario);
    }
    
    public double getSalario() {
        return this.salario;
    }
    
    public String getSupervisor() {
        return this.supervisor.nombre;
    }
    
}
