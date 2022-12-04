$(document).ready(function(){
    $('.primary-navigation').hide();

    $('a').each(function(){
        console.log($(this).attr('href'));

        switch ($(this).attr('href')) {
            case M.cfg.wwwroot + '/grade/report/overview/index.php':
            case M.cfg.wwwroot + '/user/profile.php':
            case M.cfg.wwwroot + '/calendar/view.php?view=month%7Ci%2Fcalendar':
            case M.cfg.wwwroot + '/message/index.php|message':
            case M.cfg.wwwroot + '/user/files.php':
            case M.cfg.wwwroot + '/reportbuilder/index.php':
            case M.cfg.wwwroot + '/user/preferences.php':
                $(this).hide();
                break;
        }
    });

    $('.dropdown-divider').hide();
})