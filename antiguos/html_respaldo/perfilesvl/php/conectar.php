<?php

class connex { 
	private $user; 
	private $clave; 
	private $servidor;
  private $bdd;
  private $conex;

   	function __construct() {     
       	$this->servidor = 'localhost'; 
        $this->bdd = 'matricula';
        $this->user = 'postgres'; 
        $this->clave = '1306';
       	$this->conex = pg_connect('host='.$this->servidor.' dbname='.$this->bdd.' user='.$this->user.' password='.$this->clave);
   	}

	    public function conectar() { 
        return $this->conex; 
    	} 
      public function row($sqlval){
        $some = pg_fetch_assoc($sqlval);
        return $some;

        }

      public function query_exe($sqlval){
        $res = pg_query($this->conex, $sqlval);
        if (pg_last_error()) exit(pg_last_error());
          return $res;

        }

      public function insercion(){
        return $this->conex->insert_id;
      }
      
      public function cerrar(){
        return pg_close($this->conex);
      }
}
?>

