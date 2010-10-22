<?php
  /**
   * @package OSEZNO PHP FRAMEWORK
   * @copyright 2007-2009  
   * @version: 0.1.5
   * @author: Oscar Eduardo Aldana 
   * @author: Jos� Ignacio Guti�rrez Guzm�n
   * developer@osezno-framework.com
   * 
   * dataModel.php: 
   * Modelo del datos del Modulo
   * - Acceso a datos de las bases de datos
   * - Retorna informacion que el Controlador muestra al usuario
   */

 include 'configMod.php';
 
 
 /**
  * Clase base del Modelo de Datos
  * - Usted puede cambiar el nombre
  */
 class modelo {
 	
	public function form2 (){
		
		$objMyForm = new myForm('prueba','procesarFormulario');
		
		$objMyForm->addText('Fecha:','fecha',date('Y-m-d'),10,10,true,true);
		
		$objMyForm->width = 300;
		
		$objMyForm->strSubmit = 'Enviar';
		
		$objMyForm->addButton('word','Word','alert','word.gif');
		
		$objMyForm->addButton('excel','Excel','alert','excel.gif');
		
		$objMyForm->addButton('ok','Ok','alert','ok.gif');
		
		$objMyForm->addButton('cancel','Cancel','alert','cancel.gif');
		
		$objMyForm->addButton('list','Grid','alert','list.gif');
		
		$objMyForm->width = 550;
		
		return $objMyForm->getForm(1);
	} 	
 	
 	
 	/**
 	 * Constructor de la clase
 	 *
 	 */
 	public function __construct (){
 		
 	}
 	
 	public function formulario (){
 		$objMyForm = new myForm('formulario',NULL,'onSubmitAccept');
 		
 		$objMyForm->SWF_upload_several_files = true;
 		
 		$objMyForm->addFile('Archivo:','file','upload.php');
 		
 		$objMyForm->SWF_src_img_button = 'file_find.png';
		$objMyForm->SWF_file_size_limit = 10000;
 		
 		
 		$objMyForm->SWF_debug = 'false';
 		
 		$objMyForm->formWidth = 500;
 		
 		return $objMyForm->getForm(1);
 	}

 	
 	public function builtList ($idLista){
 		
 		/**
 		$sql = 'SELECT LPAD(cast(id as char),6,"0") as Llave, 
 				nombre as Nombre,
 				precio as Valor, 
 				estado as Estado from libros ';
 		
		$objList = new myList($idLista,$sql);
		
		//$libros = new libros;
		//$objList = new myList($idLista,$libros);
		
		$objList->widthList = 500;
		
		
 		$objList->setAliasInQuery('LPAD(cast(id as char),6,"0")','Llave');
 		$objList->setAliasInQuery('nombre','Nombre');
 		$objList->setAliasInQuery('precio','Valor');
 		$objList->setAliasInQuery('estado','Estado');
 		
 
 		$objList->setUseOrderMethodInColumn('Llave');
 		$objList->setUseOrderMethodInColumn('Nombre');
 		$objList->setUseOrderMethodInColumn('Valor');
 		$objList->setUseOrderMethodInColumn('Estado'); 		
 		
 		//$objList->setWidthColumn('precio',50);
 		
 		$objList->setPagination(true,6);
 		
 		return $objList->getList();
 		*/
 						
		$tbmtipdet = new tbmtipdet;
		
		
 		$objList = new myList($idLista,$tbmtipdet);
 		
 		$objList->setUseOrderMethodInColumn('mtipdet_id');
 		$objList->setUseOrderMethodInColumn('mtip_id');
 		$objList->setUseOrderMethodInColumn('mtipdet_des');
 		$objList->setUseOrderMethodInColumn('m04usr_id');
 		$objList->setUseOrderMethodInColumn('mtipdet_fechsist');
 		$objList->setUseOrderMethodInColumn('mtipdet_cod');

 		$objList->setPagination(true,15);
 		
 		return $objList->getList();
 	}
 	
 	/**
 	 * Destructor de la clase
 	 *
 	 */
 	public function __destruct (){
 		
 	}

 }
 
  class tbmtipdet extends myActiveRecord {
  	
  	public $mtipdet_id;
  	
  	public $mtip_id;
  	
  	public $mtipdet_des;
  	
  	public $m04usr_id;
  	
  	public $mtipdet_fechsist;
  	
  	public $mtipdet_cod;
  	
  }
  
  class libros extends myActiveRecord {
 	
 	public $id;
 	
 	public $nombre;
 	
 	public $precio;
 	
 	public $estado;
 	
 }
 
 //$libros = new libros();
 
 $modelo = new modelo;
 
?>