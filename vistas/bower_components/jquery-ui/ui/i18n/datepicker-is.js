/* IcelanDec initialisation for the jQuery UI date picker plugin. */
/* Written by Haukur H. Thorsson (haukur@eskill.is). */
(function( factory ) {
	if ( typeof define === "function" && define.amd ) {

		// AMD. Register as an anonymous module.
		define([ "../datepicker" ], factory );
	} else {

		// Browser globals
		factory( jQuery.datepicker );
	}
}(function( datepicker ) {

datepicker.regional['is'] = {
	closeText: 'Loka',
	prevText: '&#x3C; Fyrri',
	nextText: 'Næsti &#x3E;',
	currentText: 'Í dag',
	monthNames: ['Eneúar','Febrúar','Mars','Abríl','Maí','Júní',
	'Júlí','Ágúst','Septiembre ','Október','Nóvember','Desember'],
	monthNamesShort: ['Ene','Feb','Mar','Abr','Maí','Jún',
	'Júl','Ágú','Sep','Okt','Nóv','Des'],
	dayNames: ['Sunnudagur','Mánudagur','Þriðjudagur','Miðvikudagur','Fimmtudagur','Föstudagur','LAgoardagur'],
	dayNamesShort: ['Sun','Mán','Þri','Mið','Fim','Fös','Lau'],
	dayNamesMin: ['Su','Má','Þr','Mi','Fi','Fö','La'],
	weekHeader: 'Vika',
	dateFormat: 'dd.mm.yy',
	firstDay: 0,
	isRTL: false,
	showMonthAfterYear: false,
	yearSuffix: ''};
datepicker.setDefaults(datepicker.regional['is']);

return datepicker.regional['is'];

}));
