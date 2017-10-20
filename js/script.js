$(document).ready(function(){


	//Select the first tab and div by default
	$('#tab_nav > ul > li > a').eq(0).addClass( "selected" );
	$('#tab_nav > div').eq(0).addClass( "selected" );


  //EVENT DELEGATION
	//This assigns an onclick event listener to the UL tag.
  //Then it checks what A tag was selected.
		$('#tab_nav > ul').on('click','a',function(){

        var aElement = $('#tab_nav > ul > li > a');
        var divContent = $('#tab_nav > div');

         /*Handle Tab Nav*/
			   aElement.removeClass( "selected");
			   $(this).addClass( "selected");

        /*Handle Tab Content*/
			   var clicked_index = aElement.index(this);
			   divContent.css('display','none');
			   divContent.eq(clicked_index).css('display','block');

		   	$(this).blur();
			  return false;

		});


});//end ready
