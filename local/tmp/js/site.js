(function ($) {
	'use strict';

    // btn more
    $(document).on('click.site', '.btn-more', function(e) {
      var $dp = $(this).next('.dropdown-menu');
      var id = $(this).data("id");
      var autor = $(this).data("autor");
      if( $dp.html() == "" ){
        $dp.append('<a data-autor="'+autor+'" data-id="'+id+'" data-addtrackplaylist data-toggle="modal" data-target="#addPlaylistTrack" class="dropdown-item" href="javascript:void(0)"><i class="fa fa-music fa-fw text-left"></i> Добавить в плейлист</a><div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i class="fa fa-share-alt fa-fw text-left"></i> Поделиться</a>');
      }

      if( (e.pageY + $dp.height() + 60) > $('body').height() ){
        $dp.parent().addClass('dropup');
      }

      if( e.pageX < $dp.width() ){
        $dp.removeClass('pull-right');
      }

    });
    
    $(document).on('click.site', '#search-result a', function(e) {
      $(this).closest('.modal').modal('hide');
    });

})(jQuery);