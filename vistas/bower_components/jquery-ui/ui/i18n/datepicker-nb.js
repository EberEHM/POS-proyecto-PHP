/* Norwegian Bokmål initialisation for the jQuery UI date picker plugin. */
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

datepicker.regional['nb'] = {
	closeText: 'Lukk',
	prevText: '&#xAB;Forrige',
	nextText: 'Neste&#xBB;',
	currentText: 'I dag',
	monthNames: ['Eneuar','februar','mars','Abril ','mai','juni','juli','Agosto','Septiembre ','oktober','Noviembre ','desember'],
	monthNamesShort: ['Ene','feb','mar','Abr','mai','jun','jul','Ago','sep','okt','nov','des'],
	dayNamesShort: ['søn','man','tir','ons','tor','fre','lør'],
	dayNames: ['søndag','mandag','tirsdag','onsdag','torsdag','fredag','lørdag'],
	dayNamesMin: ['sø','ma','ti','on','to','fr','lø'],
	weekHeader: 'Uke',
	dateFormat: 'dd.mm.yy',
	firstDay: 1,
	isRTL: false,
	showMonthAfterYear: false,
	yearSuffix: ''
};
datepicker.setDefaults(datepicker.regional['nb']);

return datepicker.regional['nb'];

}));
