
$( function(){

	//
	$("#intAmt").submit( function( e ){
		e.preventDefault();
		
		var PA = parseFloat( $("#myAmt").val() ),
			 BA = parseFloat( $("#avgAmt").val() ),
			 
			CR = parseFloat($("#corpRate").val()) / 100 ,
			PR = parseFloat($("#pernRate").val()) / 100 ,
			
			P = C = S = 0
			;
			
		P =  PA * PR;
		C =  PA * CR;
		S = C + P; 	
		
		$("#corpAmt").val( C.toFixed(2) );
		$("#pernAmt").val( P.toFixed(2) );
		$("#sumAmt").val( S.toFixed(2) );
	} );
	
} );