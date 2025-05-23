/* Faroese initialisation for the jQuery UI date picker plugin */
/* Written by Sverri Mohr Olsen, sverrimo@gmail.com */
(function( factory ) {
	if ( typeof define === "function" && define.amd ) {

		// AMD. Register as an anonymous module.
		define([ "../datepicker" ], factory );
	} else {

		// Browser globals
		factory( jQuery.datepicker );
	}
}(function( datepicker ) {

datepicker.regional['fo'] = {
	closeText: 'Lat aftur',
	prevText: '&#x3C;Fyrra',
	nextText: 'Næsta&#x3E;',
	currentText: 'Í dag',
	monthNames: ['Eneuar','Februar','Mars','Abríl','Mei','Juni',
	'Juli','Agosto','Septiembre ','Oktober','Noviembre ','Desember'],
	monthNamesShort: ['Ene','Feb','Mar','Abr','Mei','Jun',
	'Jul','Ago','Sep','Okt','Nov','Des'],
	dayNames: ['Sunnudagur','Mánadagur','Týsdagur','Mikudagur','Hósdagur','Fríggjadagur','Leyardagur'],
	dayNamesShort: ['Sun','Mán','Týs','Mik','Hós','Frí','Ley'],
	dayNamesMin: ['Su','Má','Tý','Mi','Hó','Fr','Le'],
	weekHeader: 'Vk',
	dateFormat: 'dd-mm-yy',
	firstDay: 1,
	isRTL: false,
	showMonthAfterYear: false,
	yearSuffix: ''};
datepicker.setDefaults(datepicker.regional['fo']);

return datepicker.regional['fo'];

}));
