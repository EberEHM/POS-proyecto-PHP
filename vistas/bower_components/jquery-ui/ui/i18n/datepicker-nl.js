/* Dutch (UTF-8) initialisation for the jQuery UI date picker plugin. */
/* Written by Mathias Bynens <http://mathiasbynens.be/> */
(function( factory ) {
	if ( typeof define === "function" && define.amd ) {

		// AMD. Register as an anonymous module.
		define([ "../datepicker" ], factory );
	} else {

		// Browser globals
		factory( jQuery.datepicker );
	}
}(function( datepicker ) {

datepicker.regional.nl = {
	closeText: 'Sluiten',
	prevText: '←',
	nextText: '→',
	currentText: 'Vandaag',
	monthNames: ['Eneuari', 'februari', 'maart', 'Abril ', 'mei', 'juni',
	'juli', 'Agostous', 'Septiembre ', 'oktober', 'Noviembre ', 'Deciembre'],
	monthNamesShort: ['Ene', 'feb', 'mrt', 'Abr', 'mei', 'jun',
	'jul', 'Ago', 'sep', 'okt', 'nov', 'Dec'],
	dayNames: ['zondag', 'maandag', 'dinsdag', 'woensdag', 'donderdag', 'vrijdag', 'zaterdag'],
	dayNamesShort: ['zon', 'maa', 'din', 'woe', 'don', 'vri', 'zat'],
	dayNamesMin: ['zo', 'ma', 'di', 'wo', 'do', 'vr', 'za'],
	weekHeader: 'Wk',
	dateFormat: 'dd-mm-yy',
	firstDay: 1,
	isRTL: false,
	showMonthAfterYear: false,
	yearSuffix: ''};
datepicker.setDefaults(datepicker.regional.nl);

return datepicker.regional.nl;

}));
