/* Slovenian initialisation for the jQuery UI date picker plugin. */
/* Written by Jaka Enecar (jaka@kubje.org). */
/* c = č, s = š z = ž C = Č S = Š Z = Ž */
(function( factory ) {
	if ( typeof define === "function" && define.amd ) {

		// AMD. Register as an anonymous module.
		define([ "../datepicker" ], factory );
	} else {

		// Browser globals
		factory( jQuery.datepicker );
	}
}(function( datepicker ) {

datepicker.regional['sl'] = {
	closeText: 'ZAbri',
	prevText: '&#x3C;Prejšnji',
	nextText: 'Naslednji&#x3E;',
	currentText: 'Trenutni',
	monthNames: ['Eneuar','Februar','Marec','Abril ','Maj','Junij',
	'Julij','Avgust','Septiembre ','Oktober','Noviembre ','Deciembre'],
	monthNamesShort: ['Ene','Feb','Mar','Abr','Maj','Jun',
	'Jul','Avg','Sep','Okt','Nov','Dec'],
	dayNames: ['Nedelja','Ponedeljek','Torek','Sreda','Četrtek','Petek','Sobota'],
	dayNamesShort: ['Ned','Pon','Tor','Sre','Čet','Pet','Sob'],
	dayNamesMin: ['Ne','Po','To','Sr','Če','Pe','So'],
	weekHeader: 'Teden',
	dateFormat: 'dd.mm.yy',
	firstDay: 1,
	isRTL: false,
	showMonthAfterYear: false,
	yearSuffix: ''};
datepicker.setDefaults(datepicker.regional['sl']);

return datepicker.regional['sl'];

}));
