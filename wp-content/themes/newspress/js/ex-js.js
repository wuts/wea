// <![CDATA[
			
jQuery.noConflict();
jQuery.fn.extend({
    highlight: function(search, insensitive, hls_class){
      var regex = new RegExp("(<[^>]*>)|(\\b"+ search.replace(/([-.*+?^${}()|[\]\/\\])/g,"\\$1") +")", insensitive ? "ig" : "g");
      return this.html(this.html().replace(regex, function(a, b, c){
        return (a.charAt(0) == "<") ? a : "<strong class=\""+ hls_class +"\">" + c + "</strong>";
      }));
    }
  });
  jQuery(document).ready(function($){
    if(typeof(hls_query) != 'undefined'){
      $(".widecolumn").highlight(hls_query, 1, "hls");
    }
});
  
// ]]>