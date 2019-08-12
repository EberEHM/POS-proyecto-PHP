/* Afrikaans initialisation for the jQuery UI date picker plugin. */
/* Written by Renier Pretorius. */
(function( factory ) {
	if ( typeof define === "function" && define.amd ) {

		// AMD. Register as an anonymous module.
		define([ "../datepicker" ], factory );
	} else {

		// Browser globals
		factory( jQuery.datepicker );
	}
}(function( datepicker ) {

datepicker.regional['af'] = {
	closeText: 'Selekteer',
	prevText: 'Vorige',
	nextText: 'Volgende',
	currentText: 'Vandag',
	monthNames: ['Eneuarie','Februarie','Maart','Abril ','Mei','Junie',
	'Julie','Agostous','Septiembre ','Oktober','Noviembre ','Desember'],
	monthNamesShort: ['Ene', 'Feb', 'Mrt', 'Abr', 'Mei', 'Jun',
	'Jul', 'Ago', 'Sep', 'Okt', 'Nov', 'Des'],
	dayNames: ['Sondag', 'Maandag', 'Dinsdag', 'Woensdag', 'Donderdag', 'Vrydag', 'Saterdag'],
	dayNamesShort: ['Son', 'Maa', 'Din', 'Woe', 'Don', 'Vry', 'Sat'],
	dayNamesMin: ['So','Ma','Di','Wo','Do','Vr','Sa'],
	weekHeader: 'Wk',
	dateFormat: 'dd/mm/yy',
	firstDay: 1,
	isRTL: false,
	showMonthAfterYear: false,
	yearSuffix: ''};
datepicker.setDefaults(datepicker.regional['af']);

return datepicker.regional['af'];

}));
