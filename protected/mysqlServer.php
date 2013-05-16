<?php

class MYSQL{

	private $conexion;
	private $user;
	private $pass;
	private $server;
	private $basededatos;
	
	/*
	function MYSQL(){		
		$this->conexion = '';
		$this->user = 'root';
		$this->pass = '';
		$this->server = 'localhost';
		$this->basededatos = 'rt_cms_txt';
	}	
	
	function MYSQL( $database ){		
		$this->conexion = '';
		$this->user = 'root';
		$this->pass = '';
		$this->server = 'localhost';
		$this->basededatos = $database;
	}
	*/
	
	function MYSQL( $user='drmeneses', $password='D0ctorM3%13' , $server='localhost' , $database='drmeneses' ){		
		$this->conexion = '';
		$this->user = $user;
		$this->pass = $password;
		$this->server = $server;
		$this->basededatos = $database;
	}

	function conectar(){
		$msgError = '<p class="error">Sorry, we were unable to connect to the database.</p>';
		#$msgError = '<p class="error">Sorry, we were unable to connect to the database.</p>';

		@$this->conexion = mysql_connect( $this->server , $this->user , $this->pass ) 
			or die ($msgError);
		mysql_query("SET NAMES 'utf8'");
		mysql_select_db( $this->basededatos, $this->conexion ) 
			or die ($msgError);
		#echo "Connected to MySQL.<br>";
	}

	function desconectar(){
		if( !empty( $this->conexion ) )
			mysql_close( $this->conexion );
		$this->conexion = '';
	}
	
	/* La función de nivel superior debe validar las entradas */
	/* Deberia ser protegido ;D y la función de nivel superior debe proveer las funciones disponibles */
	function query($q){
		return mysql_query($q);
	}
	
	/* Falta la función fetch, que retorne un array y el de nivel superior podria recibir el query y retornar un objeto =P */
	
};

?>