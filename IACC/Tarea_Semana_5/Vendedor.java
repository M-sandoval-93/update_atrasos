
/**
 * Clase vendedor
 * 
 * @author 
 * @version 
 */

import java.util.ArrayList;

public class Vendedor extends Empleado {
    private Coche coche_empresa;
    private int celular;
    private String area_venta;
    private ArrayList<Cliente> clientes = new ArrayList<>();
    private double comision_venta;
    
    public Vendedor(String nombre, String apellido, String dni, String direccion, int telefono, double salario) {
        super(nombre, apellido, dni, direccion, telefono, salario);
        this.area_venta = "";
        this.comision_venta = 0;
        
        this.puesto = "vendedor";
        this.aumento = 0.05;
    }
    
    public Vendedor(String nombre, String apellido, String dni, String direccion, int a_antiguedad, int telefono, double salario, String area_venta, double comision) {
        super(nombre, apellido, dni, direccion, a_antiguedad, telefono, salario);
        this.area_venta = "";
        this.comision_venta = comision;
 
        this.puesto = "vendedor";
        this.aumento = 0.05;
    }
    
    public void altaCliente(Cliente cliente) {
        this.clientes.add(cliente);
        System.out.println("El cliente " + cliente.nombre + " fue agregado");
        
    }
    
    public void bajaCliente() {
        
    }
    
    public void listaClientes() {
        for (int i = 0; i < this.clientes.size(); i++) {
            this.clientes.get(i).infoCliente();
        }
    }
    
    public void setComisionVenta(double nueva_comision) {
        this.comision_venta = nueva_comision;
    }
}
