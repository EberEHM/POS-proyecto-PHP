/* Bosnian i18n for the jQuery UI date picker plugin. */
/* Written by Kenan Konjo. */
(function( factory ) {
	if ( typeof define === "function" && define.amd ) {

		// AMD. Register as an anonymous module.
		define([ "../datepicker" ], factory );
	} else {

		// Browser globals
		factory( jQuery.datepicker );
	}
}(function( datepicker ) {

datepicker.regional['bs'] = {
	closeText: 'Zatvori',
	prevText: '&#x3C;',
	nextText: '&#x3E;',
	currentText: 'Danas',
	monthNames: ['Eneuar','Februar','Mart','Abril ','Maj','Juni',
	'Juli','Agosto','Septembar','Oktobar','Novembar','Decembar'],
	monthNamesShort: ['Ene','Feb','Mar','Abr','Maj','Jun',
	'Jul','Ago','Sep','Okt','Nov','Dec'],
	dayNames: ['Nedelja','Ponedeljak','Utorak','Srijeda','Četvrtak','Petak','Subota'],
	dayNamesShort: ['Ned','Pon','Uto','Sri','Čet','Pet','Sub'],
	dayNamesMin: ['Ne','Po','Ut','Sr','Če','Pe','Su'],
	weekHeader: 'Wk',
	dateFormat: 'dd.mm.yy',
	firstDay: 1,
	isRTL: false,
	showMonthAfterYear: false,
	yearSuffix: ''};
datepicker.setDefaults(datepicker.regional['bs']);

return datepicker.regional['bs'];

}));
