$(function() { 
			$( "#dragList" ).sortable({ 
			update: function(event, ui) { 
				getIdsOfItems(); 
			}		 
			}); 
		}); 
		
function getIdsOfItems() { 
			var values = []; 
			$('.itemList').each(function (index) { 
				values.push($(this).attr("id") 
						.replace("taskNum", " #")); 
			}); 
			$('#priority').val(values); 
		}	