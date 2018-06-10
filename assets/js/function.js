$(function () {

    // Tabs
    $('#tabs2, #tabs, #tabs3').tabs();
    //date start
    $( "#eventDateStart" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 3,
        dateFormat: 'yy-mm-dd',
        onClose: function( selectedDate ) {
            $( "#eventDateStart" ).datepicker( "option", "minDate", selectedDate );
        }
    });

    //date end
    $( "#eventDateEnd" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 3,
        dateFormat: 'yy-mm-dd',
        onClose: function( selectedDate ) {
            $( "#eventDateEnd" ).datepicker( "option", "minDate", selectedDate );
        }
    });

  

    //onload
    $("#print-title").append("<p id='title-text'>Yor Event Title</p>");
    $("#print-description").append("<div id='desc-text'>Your Event Description will diplay here</div>");

    //component hide when load
    $("#no-ticket").hide();

    //component update
    //when event title is change
   

    $("#eventTitle").change(function(){
        $("#title-text").remove();
        $("#print-title").append("<p id='title-text'>"+$("#eventTitle").val()+"</p>");
    });
    //when event desc is change 
    $("#eventDescription").change(function(){
        var value = $("#eventDescription").val().replace(/\n\r?/g,'<br>');
        $("#desc-text").remove();
        $("#print-description").append("<div id='desc-text'>"+value+"</div>");
    });

   
   

     
   

    //end
});