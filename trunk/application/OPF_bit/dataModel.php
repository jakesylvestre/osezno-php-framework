<?php
/**
 * Modelo del datos del Modulo.
 * - Acceso a datos de las bases de datos
 * - Retorna informacion que el Controlador muestra al usuario
 *
 * @author Jos� Ignacio Guti�rrez Guzm�n <jose.gutierrez@osezno-framework.org>
 * @link http://www.osezno-framework.org/
 * @copyright Copyright &copy; 2007-2011 Osezno PHP Framework
 * @license http://www.osezno-framework.org/license.txt
 */
 include '../../config/configApplication.php';
 
 class OPF_bit {
 	
 	public static function getListBit (){
 		
 		$myAct = new OPF_myActiveRecord();
 		
 		$arrReplace = array(
 		
 			'OPF_FIELD_ID' => OPF_FIELD_ID,
 			
 			'OPF_FIELD_DATETIME' => OPF_FIELD_DATETIME,
 			
 			'OPF_FIELD_IP' => OPF_FIELD_IP,
 			
 			'OPF_FIELD_USUARIO' => OPF_FIELD_USUARIO,
 			
 			'OPF_FIELD_URL' => OPF_FIELD_URL
 		
 		);
 		
 		$myList = new OPF_myList('lst_bit',$myAct->loadSqlFromFile('sql/bit.sql',$arrReplace));
 		
 		$myList->setWidthColumn(OPF_FIELD_ID, 100);
 		
 		$myList->setWidthColumn(OPF_FIELD_DATETIME, 130);
 		
 		$myList->setWidthColumn(OPF_FIELD_IP, 100);
 		
 		$myList->setWidthColumn(OPF_FIELD_USUARIO, 100);
 		
 		$myList->setWidthColumn(OPF_FIELD_URL, 570);
 		
 		$myList->setUseOrderMethod(true,OPF_FIELD_ID,'DESC');
 		
 		$myList->setRealNameInQuery(OPF_FIELD_ID, 'ess_bit.id');
 		
 		$myList->setRealNameInQuery(OPF_FIELD_DATETIME, 'ess_bit.datetime');
 		
 		$myList->setRealNameInQuery(OPF_FIELD_IP, 'ess_bit.ip');
 		
 		$myList->setRealNameInQuery(OPF_FIELD_URL, 'ess_bit.url');
 		
 		$myList->setRealNameInQuery(OPF_FIELD_USUARIO, 'ess_system_users.user_name');
 		
 		$myList->setPagination(true,20);
 		
 		$myList->setExportData(true,true,true);
 		
 		return $myList->getList(true,true);
 	}
 	
 }
 
?>