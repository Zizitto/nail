var mainColorEl = $('#new_shop_preferedColor').parent(),
    easyColorEl = $('#new_shop_preferedColorEasy').parent(),
    mediumColorEl = $('#new_shop_preferedColorMedium').parent(),
    userLineColorEl = $('#new_shop_userLineColor').parent(),
    userLineBackgroundColorEl = $('#new_shop_userLineBackgroundColor').parent(),
    menuColorEl = $('#new_shop_menuColor').parent(),
    menuBackgroundColorEl = $('#new_shop_menuBackgroundColor').parent(),
    footerColorEl = $('#new_shop_footerColor').parent(),
    footerBackgroundColorEl = $('#new_shop_footerBackgroundColor').parent(),
    colorOfTheTextInTheHomepageModulesEl = $('#new_shop_colorOfTheTextInTheHomepageModules').parent(),
    colorOfTheTextInButtonsEl = $('#new_shop_colorOfTheTextInButtons').parent(),
    colorOfTheButtonsEl = $('#new_shop_colorOfTheButtons').parent(),
    colorOfTwitterFeed = $('#new_shop_colorOfTwitterFeed').parent(),

    logoEl = $('#new_shop_logo').parent(),
    adminLogoEl = $('#new_shop_adminLogo').parent(),
    footer1LogoEl = $('#new_shop_footerLogo1').parent(),
    footer2LogoEl = $('#new_shop_footerLogo2').parent(),
    mainPageLogoEl = $('#new_shop_defaultHeaderImage').parent();

//colorpicker
[mainColorEl, easyColorEl, mediumColorEl, userLineColorEl, userLineBackgroundColorEl, menuColorEl, menuBackgroundColorEl, footerColorEl, footerBackgroundColorEl, colorOfTheTextInTheHomepageModulesEl,colorOfTheTextInButtonsEl, colorOfTheButtonsEl, colorOfTwitterFeed  ].forEach(function (val) {
    val.addClass('input-group colorpicker-element');
    val.prepend('<span class="input-group-addon"><i></i></span>');
    val.colorpicker().on('changeColor.colorpicker', function(event){
        $('.colorpicker').removeClass('colorpicker-visible').addClass('colorpicker-hidden');
    });
});

//filestyle
//[logoEl, adminLogoEl, footer1LogoEl, footer2LogoEl, mainPageLogoEl].forEach(function (val) {
    //val.addClass('bootstrap-filestyle input-group');
//});
