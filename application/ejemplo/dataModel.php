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
		
		$objMyForm->addButton('ok','Ok','buttonOk','ok.gif');
		
		$objMyForm->addButton('cancel','Cancel','buttonCancel','cancel.gif');
		
		$objMyForm->addButton('list','Grid','showGrid','list.gif');
		
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
 		/*
 		$myAct = new myActiveRecord();
 		
		$objList = new myList($idLista,$myAct->loadSqlFromFile('sql/query.sql'));

		$objList->setAliasInQuery('contrato','El Contrato');
		
		$objList->setUseOrderMethodInColumn('contrato');
		$objList->setUseOrderMethodInColumn('m01asi_id');
		$objList->setUseOrderMethodInColumn('socio');
		$objList->setUseOrderMethodInColumn('email');
		
 		$objList->setPagination(true,20);
 		
 		return $objList->getList();
 		*/

 		
		$tbmtipdet = new tbmtipdet;
		
 		$objList = new myList($idLista,$tbmtipdet);
 		
 		//$objList->setUseOrderMethodInColumn('mtipdet_id');
 		$objList->setUseOrderMethodOnColumn('mtip_id');
 		$objList->setUseOrderMethodOnColumn('mtipdet_des');
 		$objList->setUseOrderMethodOnColumn('m04usr_id');
 		$objList->setUseOrderMethodOnColumn('mtipdet_fechsist');
 		$objList->setUseOrderMethodOnColumn('mtipdet_cod');
 		
 		$objList->setEventOnColumn('mtipdet_id','deleteRecord','�Desea borrar el registro?');
 		$objList->setAliasInQuery('mtipdet_des','Descripci�n');
 		$objList->setAliasInQuery('mtipdet_id','Eliminar');
 		
 		//$objList->widthList = 800;
 		
 		$objList->setPagination(true,20);
 		
 		return $objList->getList(true);
 		
 		/*
 		$otra = new otra;
 		$objList = new myList($idLista,$otra);
 		$objList->setUseOrderMethodInColumn('otra_id');
 		$objList->setUseOrderMethodInColumn('user_id');
 		$objList->setUseOrderMethodInColumn('val');
 		$objList->widthList = 470;
 		$objList->setPagination(true,5);
 		return $objList->getList();
 		*/
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
 
  class otra extends myActiveRecord {
  	
  	public $otra_id;
  	
  	public $user_id;
  	
  	public $val;
  	
  }
 
  class users extends myActiveRecord {
  	
  	public $user_id;
  	
  	public $name;
  	
  }
  
 $modelo = new modelo;
 
?>