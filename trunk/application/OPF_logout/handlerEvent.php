<?php
  /**
   * @package OSEZNO PHP FRAMEWORK
   * @copyright 2007-2011  
   * @version: 0.1
   * @author: Oscar Eduardo Aldana 
   * @author: Jos� Ignacio Guti�rrez Guzm�n
   * 
   * developer@osezno-framework.org
   *  
   * handlerEvent.php: 
   * Manejador de eventos del Usuario
   *  
   */

 include 'dataModel.php';
 
/**
 * Manejador de eventos de usuario
 *
 */	
 class eventos extends OPF_myController {
 	
 }

 $objEventos = new eventos($objxAjax);
 $objOsezno  = new OPF_osezno($objxAjax,$theme);
 
 $objOsezno->setPathFolderTemplates(PATH_TEMPLATES);
 $objxAjax->processRequest();
 
?>