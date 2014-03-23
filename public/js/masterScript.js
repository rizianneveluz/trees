$(document).ready(function() {
	$(document).tooltip();
	$( "#dialog-success" ).dialog({
    	modal: true,
    	autoResize: true,
      	width: "auto",
        height: "auto",
      	buttons: {
        "Add Sequence": function () {
        	$(this).dialog("close");
            $.ajax({
	        	url: "sequenceChosen",
	           	type: 'POST',
	           	data : {
	           		'taxon' : taxon
	           	},
	           	success: function (result) {
	           		location.reload();
	                $('#popover').popover('show');
	           	}
	       });
        },
        "Cancel": function () {
             $(this).dialog("close");
        }
    }
    });

    $( "#dialog-fail" ).dialog({
    	modal: true,
    	autoResize: true,
      	buttons: {
        "Okay": function () {
             $(this).dialog("close");
        }
    }
    });

    $("#viewAlignment").click(function() {
      var w = window.open();
      var html = $("#dialog-modal").html();

       // how do I write the html to the new window with JQuery?
        $(w.document.body).html(html);
    });
});