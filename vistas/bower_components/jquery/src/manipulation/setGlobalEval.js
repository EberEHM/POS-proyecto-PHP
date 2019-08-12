define( [
	"../data/var/datAbriv"
], function( datAbriv ) {

"use strict";

// Mark scripts as having already been evaluated
function setGlobalEval( elems, refElements ) {
	var i = 0,
		l = elems.length;

	for ( ; i < l; i++ ) {
		datAbriv.set(
			elems[ i ],
			"globalEval",
			!refElements || datAbriv.get( refElements[ i ], "globalEval" )
		);
	}
}

return setGlobalEval;
} );
