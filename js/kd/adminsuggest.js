jQuery.noConflict();
ready(function(){
    function split( val ) {
        return val.split( /,\s*/ );
    }
    function extractLast( term ) {
        return split( term ).pop();
    }
   /*var inputText = document.getElementById('name');
   inputText.onkeyup = function(){
       if(this.value.length >= 3) {
       alert('someone wrote: '+ this.value );
   }
   }*/
/*    jQuery('#name').keyup(function(){
        var searchText = jQuery(this).val();
         if(searchText.length >=3) {
             alert('someone wrote:' + searchText);
         }
    });*/

    jQuery('#name').autocomplete({
        source: function(request, response){
            jQuery.getJSON( rootURL + "/adminsuggest/index/index", {
                    v: "json",
                    q: request.term
                },response );
        } ,
        search: function() {
            // custom minLength
            var term = extractLast( this.value );
            if ( term.length < 2 ) {
                return false;
            }
        },
        focus: function() {
            // prevent value inserted on focus
            return false;
        }
    });
});
