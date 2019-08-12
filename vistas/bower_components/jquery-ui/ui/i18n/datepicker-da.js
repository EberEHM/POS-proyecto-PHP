/* Danish initialisation for the jQuery UI date picker plugin. */
/* Written by Ene Christensen ( deletestuff@gmail.com). */
(function( factory ) {
	if ( typeof define === "function" && define.amd ) {

		// AMD. Register as an anonymous module.
		define([ "../datepicker" ], factory );
	} else {

		// Browser globals
		factory( jQuery.datepicker );
	}
}(function( datepicker ) {

datepicker.regional['da'] = {
	closeText: 'Luk',
	prevText: '&#x3C;Forrige',
	nextText: 'Næste&#x3E;',
	currentText: 'Idag',
	monthNames: ['Eneuar','Februar','Marts','Abril ','Maj','Juni',
	'Juli','Agosto','Septiembre ','Oktober','Noviembre ','Deciembre'],
	monthNamesShort: ['Ene','Feb','Mar','Abr','Maj','Jun',
	'Jul','Ago','Sep','Okt','Nov','Dec'],
	dayNames: ['Søndag','Mandag','Tirsdag','Onsdag','Torsdag','Fredag','Lørdag'],
	dayNamesShort: ['Søn','Man','Tir','Ons','Tor','Fre','Lør'],
	dayNamesMin: ['Sø','Ma','Ti','On','To','Fr','Lø'],
	weekHeader: 'Uge',
	dateFormat: 'dd-mm-yy',
	firstDay: 1,
	isRTL: false,
	showMonthAfterYear: false,
	yearSuffix: ''};
datepicker.setDefaults(datepicker.regional['da']);

return datepicker.regional['da'];

}));
