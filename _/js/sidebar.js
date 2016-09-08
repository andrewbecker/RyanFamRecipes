$(document).ready(function(){
	//********Hides and shows sidebar********** //
	//Sets up sidebar so only first box is shown
	$('.sidebar ul').hide().addClass('hidden');
	$('.sidebar img').addClass('rotated');
	$('.sidebar ul').first().show().removeClass('hidden');
	$('.sidebar img').first().removeClass('rotated');
	
	//Click event
	//Will hide 
	$('.sidebar h2').click(function(){
		if($(this).children().hasClass('rotated')) {
			$('.sidebar ul').hide(100).addClass('hidden');
			$('.sidebar img').addClass('rotated');
			$(this).next($('ul')).toggle("slow").toggleClass('hidden');
			$(this).find($('img')).toggleClass('rotated');
		} else {
			$('.sidebar ul').hide(100).addClass('hidden');
			$('.sidebar img').addClass('rotated');
		}	// end else	
	}); // end click

	function setCheckboxes(){
		var values = $('.checkbox:checked').map(function(){
        //Return the value for the array
        return this.value;
    }).get();

    //Set the new val to you input
    $('#hide').val(values.join(','));

    //See the result
    console.log($('#hide').val())
  }

  setCheckboxes();

	//Bind change event
	$('.checkbox').on('change', function(){
    //Select every checked input and build an array
    var values = $('.checkbox:checked').map(function(){
        //Return the value for the array
        return this.value;
    }).get();

    //Set the new val to you input
    $('#hide').val(values.join(','));

    //See the result
    console.log($('#hide').val())
	});

	//Remove filters
	$('#breadcrumb ul li img').click(function(){
		var dat = ($(this).parent().attr('data-filter'));
		$("#"+dat).attr('value', dat).prop('checked', false);
		setCheckboxes();
		$('#hiddenval').submit();
	}); // end click

	$('input[name="preview"]').click(function(e){
		var title = $('input[name="title"]').val();
		var creator = $('input[name="creator"]').val();
		var ingredients = $('textarea[name="ingredients"]').val();
		var directions = $('textarea[name="directions"]').val();
		var winHeight = $( document ).height();
		console.log(ingredients);
		var testarray = new Array();
		testarray = ingredients.split('\n');
		var directionsArray = directions.split('\n');
		console.log(testarray);
		console.log(testarray.length);
		console.log(testarray[0]);
		console.log(list);
		var i;
		for(i=0; i < testarray.length; i++){
			if(i===0){ var list = "<ul>"; }
			list += "<li>" + testarray[i] + "</li>";
			if(i=== (testarray.length - 1)) { list += "</ul>" }
		}
		for(i=0; i < directionsArray.length; i++){
			if(i===0){ var directionsList = "<ol>"; }
			directionsList += "<li>" + directionsArray[i] + "</li>";
			if(i=== (directionsArray.length - 1)) { directionsList += "</ol>" }
		}

		var ele = "<div id='overlay'>";
		 ele += "<img id='clickable' src='_/components/images/x.png'>";	
		 ele += "<h2>" + title + "</h2>";
		 ele += "<h3>Recipe by " + creator + "</h3>";
		 ele += "<p>Ingredients:</p>" + list;
		 ele += "<p>Directions:<br>" + directionsList + "</p>";
		 ele += "</div>";
		var blur = "<div class='blurry'></div>";
		$('body').append(blur);
		$('.blurry').css( "height", winHeight );
		$('body').append(ele);

		//$('#overlay').show("slow");

		$('#clickable').click(function(){
			// console.log('in click');
			// console.log($('#overlay').length);
			// if($('#overlay').length >= 1) {
			// 	console.log('in if');
				$('#overlay').remove();
				$('.blurry').remove();
			//}
		});	

		e.preventDefault();

	});


}); // end ready

