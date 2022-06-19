let arrLang = {
    en: {
        'top_title': 'COMMISSIONERATE OF TRANSPORT AND ROAD SAFETY',
        'top_title_sub': 'Government of Tamil Nadu',
        'nav-home': 'Home',
        'nav-home': 'Home',
        'nav-home': 'Home',
        'nav-home': 'Home',
        'nav-home': 'Home',
        'nav-home': 'Home',
        'nav-home': 'Home',
        'nav-home': 'Home',
        'nav-home': 'Home',
        'nav-home': 'Home',
        'nav-home': 'Home',
        'nav-home': 'Home',
        'nav-home': 'Home',
        'nav-home': 'Home',
        'nav-home': 'Home',
        'nav-home': 'Home',
        'nav-home': 'Home',
        'nav-home': 'Home'

    },

    tn: {
        'top_title': 'போக்குவரத்து ஆணையர் மற்றும் மாநில போக்குவரத்து ஆணையம்',
        'top_title_sub': 'தமிழ்நாடு அரசு',
        'nav-home': 'முகப்பு',
        'nav-home': 'Home',
        'nav-home': 'Home',
        'nav-home': 'Home',
        'nav-home': 'Home',
        'nav-home': 'Home',
        'nav-home': 'Home',
        'nav-home': 'Home',
        'nav-home': 'Home',
        'nav-home': 'Home',
        'nav-home': 'Home',
        'nav-home': 'Home',
        'nav-home': 'Home',
        'nav-home': 'Home',
        'nav-home': 'Home',
        'nav-home': 'Home',
        'nav-home': 'Home',
        'nav-home': 'Home'

    }
}

$(function() {
    let lang = localStorage.getItem('language');
    changeLanguage(lang);


    $('.translate').click(function() {
        lang = $(this).attr('id');
        localStorage.setItem('language', lang);
        changeLanguage(lang);
    });

    function changeLanguage(lang) {
        $('.lang').each(function(index, element) {
            $(this).text(arrLang[lang][$(this).attr('key')]);
        });
    }

})