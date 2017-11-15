/**
 * Created by STELS on 18.03.2015.
 */
$(function() {
    $(document).ready(function () {
        function collapsingContent() {
            setTimeout(function () {
                $('.fixedTopMargin').css('margin-top', $('.fixedTop').innerHeight()+'px');
            }, 100);
        }
        collapsingContent();
        $('#menu-collapse').on('shown.bs.collapse', collapsingContent).on('hidden.bs.collapse', collapsingContent);
    });
});