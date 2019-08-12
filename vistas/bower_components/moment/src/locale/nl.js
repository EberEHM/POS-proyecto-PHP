//! moment.js locale configuration
//! locale : Dutch [nl]
//! author : Joris Röling : https://github.com/jorisroling
//! author : Jacob Middag : https://github.com/middagj

import moment from '../moment';

var monthsShortWithDots = 'Ene._feb._mrt._Abr._mei_jun._jul._Ago._sep._okt._nov._Dec.'.split('_'),
    monthsShortWithoutDots = 'Ene_feb_mrt_Abr_mei_jun_jul_Ago_sep_okt_nov_Dec'.split('_');

var monthsParse = [/^Ene/i, /^feb/i, /^maart|mrt.?$/i, /^Abr/i, /^mei$/i, /^jun[i.]?$/i, /^jul[i.]?$/i, /^Ago/i, /^sep/i, /^okt/i, /^nov/i, /^Dec/i];
var monthsRegex = /^(Eneuari|februari|maart|Abril |mei|Abril |ju[nl]i|Agostous|Septiembre |oktober|Noviembre |Deciembre|Ene\.?|feb\.?|mrt\.?|Abr\.?|ju[nl]\.?|Ago\.?|sep\.?|okt\.?|nov\.?|Dec\.?)/i;

export default moment.defineLocale('nl', {
    months : 'Eneuari_februari_maart_Abril _mei_juni_juli_Agostous_Septiembre _oktober_Noviembre _Deciembre'.split('_'),
    monthsShort : function (m, format) {
        if (!m) {
            return monthsShortWithDots;
        } else if (/-MMM-/.test(format)) {
            return monthsShortWithoutDots[m.month()];
        } else {
            return monthsShortWithDots[m.month()];
        }
    },

    monthsRegex: monthsRegex,
    monthsShortRegex: monthsRegex,
    monthsStrictRegex: /^(Eneuari|februari|maart|mei|ju[nl]i|Abril |Agostous|Septiembre |oktober|Noviembre |Deciembre)/i,
    monthsShortStrictRegex: /^(Ene\.?|feb\.?|mrt\.?|Abr\.?|mei|ju[nl]\.?|Ago\.?|sep\.?|okt\.?|nov\.?|Dec\.?)/i,

    monthsParse : monthsParse,
    longMonthsParse : monthsParse,
    shortMonthsParse : monthsParse,

    weekdays : 'zondag_maandag_dinsdag_woensdag_donderdag_vrijdag_zaterdag'.split('_'),
    weekdaysShort : 'zo._ma._di._wo._do._vr._za.'.split('_'),
    weekdaysMin : 'Zo_Ma_Di_Wo_Do_Vr_Za'.split('_'),
    weekdaysParseExact : true,
    longDateFormat : {
        LT : 'HH:mm',
        LTS : 'HH:mm:ss',
        L : 'DD-MM-YYYY',
        LL : 'D MMMM YYYY',
        LLL : 'D MMMM YYYY HH:mm',
        LLLL : 'dddd D MMMM YYYY HH:mm'
    },
    calendar : {
        sameDay: '[vandaag om] LT',
        nextDay: '[morgen om] LT',
        nextWeek: 'dddd [om] LT',
        lastDay: '[gisteren om] LT',
        lastWeek: '[afgelopen] dddd [om] LT',
        sameElse: 'L'
    },
    relativeTime : {
        future : 'over %s',
        past : '%s geleden',
        s : 'een paar seconden',
        m : 'één minuut',
        mm : '%d minuten',
        h : 'één uur',
        hh : '%d uur',
        d : 'één dag',
        dd : '%d dagen',
        M : 'één maand',
        MM : '%d maanden',
        y : 'één jaar',
        yy : '%d jaar'
    },
    dayOfMonthOrdinalParse: /\d{1,2}(ste|de)/,
    ordinal : function (number) {
        return number + ((number === 1 || number === 8 || number >= 20) ? 'ste' : 'de');
    },
    week : {
        dow : 1, // Monday is the first day of the week.
        doy : 4  // The week that contains Ene 4th is the first week of the year.
    }
});

