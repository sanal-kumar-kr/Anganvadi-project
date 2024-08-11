(function($) {
    $(document).ready(function() {
       $('body').anganvadiWidget({
       });
   });
   $.widget("zuike.anganvadiWidget", {
     options: {
        fid: 0,
        ingedients: {}
     },
     _init: function() {},
     _create: function() {
        var self = this;
       self._eventManager();
     },
     _eventManager: function() {
        var self = this;
        $('.btn-ingredients').on("click", function(){
            var fid = $(this).attr('data-fid');
            self._dataFetch('/get-ingredients', {i: fid});
            $('#ing-modal').modal('show'); 
        });
        $('.add-more-ing').on('click', function() {
            var htmlStr = '<tr><td></td>';
        })
     },
     _dataFetch: function(dataurl, dataObj) {
        var self = this;
       $.ajax({
         url: dataurl,
         data: dataObj,
         type: 'post',
         dataType: 'json',
         async: false,
         success: function (doc) {
           console.log(doc);
         },
         error: function (err) {
           console.log(err)
         }
       })
     }
    });
})(jQuery);