$(function() {
    $(document).ready(function () {
        setTimeout(function () {
            var $container = $('.news-block #mix-container');

            $container.infinitescroll({
                    navSelector  : '.pager',                // selector for the paged navigation
                    nextSelector : '.pager a.pager-next',  // selector for the NEXT link (to page 2)
                    itemSelector : '.infinity-item',                 // selector for all items you'll retrieve
                    debug        : false,
                    loading: {
                        finishedMsg: 'No more pages to load.',
                        img: '/img/22.GIF',
                        msgText: '',
                        selector: '.infinity-message',
                        spead: 'slow'
                    },
                    state: {
                        currPage: 0
                    }
                },
                function( newElements ) {
                    $container.append($( newElements ));
                    $container.mixItUp('filter', 'all');
                }
            );

            if ($('html').height() <= $(window).height()){
                $("html, body").trigger('scroll');
            }
        }, 500);

    });
});