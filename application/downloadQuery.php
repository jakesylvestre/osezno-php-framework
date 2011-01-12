<?php

	include '../configApplication.php';

	if (isset($_GET['id_list'])){
		
		$idList = $_GET['id_list'];
		
		$objList = new myList($idList);
		
		$sql = $objList->getVar('sql');
		
 		/**
 		 * Where rules
 		 */
 		$sqlWhere = '';
 		
 		$arWrRls = $objList->getVar('arrayWhereRules');
 		
		if (count($arWrRls)){
			
			if (strpos($sql, 'WHERE')!==false)
				$sqlWhere = ' WHERE ';
			else
				$sqlWhere = ' AND ';
			
			$rules = '';
			
			foreach ($arWrRls as $id => $rule){
				$rules .= $rule.' ';
			}
		
			$sqlWhere .= substr($rules, 3);
		}
 		
 		/**
 		 * Order Method
 		 */
		$sqlOrder = '';
		
		$arOrMtd = $objList->getVar('arrayOrdMethod');
		
		if ($arOrMtd!==false){
		
			foreach ($arOrMtd as $column => $method){
				if ($method){
				
					if (!$sqlOrder)
						$sqlOrder = ' ORDER BY ';
				
					$sqlOrder .= '"'.$column.'" '.$method.', ';
				}
			}
		}
		
		$sqlOrder = substr($sqlOrder,0,-2);
		
		/**
		 * Limit
		 */
		$sqlLimit = '';
		
		$usPg = $objList->getVar('usePagination');
		
		if ($usPg && ($_GET['usepg']=='t')){
			
			$rdsPg = $objList->getVar('recordsPerPage');
			
			$rdsPgFr = $objList->getVar('recordsPerPageForm');
			
			$cntPg = $objList->getVar('currentPage');
			
			$sqlLimit .= ' LIMIT  '.($rdsPg*$rdsPgFr).' OFFSET '.(($cntPg*$rdsPg)*$rdsPgFr);
		}
 		
 		$sql = $sql.''.$sqlWhere.''.$sqlOrder.''.$sqlLimit;
 		
 		$xlsOut = $htmlOut = $pdfOut = '';
 		
 		$export = new myExportData($sql,$_GET['format'],'',$idList);
 		
		switch ($_GET['format']){
			
			case 'xls':
				
				$content_type = 'Content-type: application/x-msexcel';
				
 				$xlsOut = $export->getResult();
 		
			break;
			
			case 'html':
				
				$content_type = 'Content-type: text/html';
				
 				$htmlOut = $export->getResult();
 		
			break;
			
			case 'pdf':
				
				$content_type = 'Content-type: application/pdf';
				
				$pdfOut = $export->getResult();
			break;
		}
 		
		header ($content_type);
 		header ('Content-Disposition: attachment; filename="'.$_GET['id_list'].'_'.date('Ymd_His').'.'.$_GET['format'].'"');
 		header ('Content-Length: '.strlen($xlsOut.$htmlOut.$pdfOut));
 		
 		if (strstr($_SERVER["HTTP_USER_AGENT"], "MSIE")){
    		
 			header('Pragma: private');
 			
    		header('Cache-control: private, must-revalidate');
 		}
 		
 		
 		echo $xlsOut.$htmlOut.$pdfOut;
	}
	
	die ();
	
?>	