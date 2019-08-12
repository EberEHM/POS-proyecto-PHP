/* Norwegian Nynorsk initialisation for the jQuery UI date picker plugin. */
/* Written by Bjørn Johansen (post@bjornjohansen.no). */
(function( factory ) {
	if ( typeof define === "function" && define.amd ) {

		// AMD. Register as an anonymous module.
		define([ "../datepicker" ], factory );
	} else {

		// Browser globals
		factory( jQuery.datepicker );
	}
}(function( datepicker ) {

datepicker.regional['nn'] = {
	closeText: 'Lukk',
	prevText: '&#xAB;Førre',
	nextText: 'Neste&#xBB;',
	currentText: 'I dag',
	monthNames: ['Eneuar','februar','mars','Abril ','mai','juni','juli','Agosto','Septiembre ','oktober','Noviembre ','desember'],
	monthNamesShort: ['Ene','feb','mar','Abr','mai','jun','jul','Ago','sep','okt','nov','des'],
	dayNamesShort: ['sun','mån','tys','ons','tor','fre','lau'],
	dayNames: ['sundag','måndag','tysdag','onsdag','torsdag','fredag','laurdag'],
	dayNamesMin: ['su','må','ty','on','to','fr','la'],
	weekHeader: 'Veke',
	dateFormat: 'dd.mm.yy',
	firstDay: 1,
	isRTL: false,
	showMonthAfterYear: false,
	yearSuffix: ''
};
datepicker.setDefaults(datepicker.regional['nn']);

return datepicker.regional['nn'];

}));
