
function myList (idList, numCols){

	this.rowsMarked = new Array();
	
	this.idList 	= idList;
	
	this.loadCss 	= loadCss;
	
	this.onRow 		= onRow;

	this.outRow 	= outRow;
	
	this.markRow 	= markRow;
	
	this.numCols 	= numCols;
	
	this.defaRowClass   = 'td_default';
	
	this.middleRowClass = 'td_middle'; 
	
	this.markRowClass   = 'td_mark';
	
	this.overRowClass	= 'td_over';
}

/*
 * Carga la hoja de estilos de la lista
 * @return
 */
function loadCss (){
	
	myListLoadCSS (this.idList);
	
}

/**
 * Cambia la clase de una fila al pasar
 * el puntero dobre el.
 * @param o Id de la fila
 * @return
 */
function onRow (o){
	
	if (o.className != this.markRowClass)
		o.className = this.overRowClass;
	
}

/**
 * Cambia la clase al quitar el puntero
 * @param o Id de la fila
 * @param cname	Clase original
 * @return
 */
function outRow (o, cname){
	
	if (o.className != this.markRowClass)
		o.className = cname;
}

/**
 * Marca una fila de la lista
 * @param o	Id de la fila
 * @param cname Clase original
 * @return
 */
function markRow (o, cname){
	
	if (this.rowsMarked[o.id]==undefined)
		this.rowsMarked[o.id] = 1;
	
    if (this.rowsMarked[o.id] == 1){
    	 
       for (i=0;i<this.numCols;i++){
    	   o.cells[i].className = this.markRowClass;
       }

       this.rowsMarked[o.id] = 0;
        
    }else{
    	
    	for (i=0;i<this.numCols;i++){
    		o.cells[i].className = cname;
    	}
    	
    	this.rowsMarked[o.id] = 1;
     }

}