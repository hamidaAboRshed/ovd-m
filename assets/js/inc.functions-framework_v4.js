function toggleSidebar(){
	if(parent.document.body.cols == "*,0") {
		parent.document.body.cols = "*,300";
		parent.frames.sidebar.location.href = "central/map_edit.php";
	}else{
		parent.document.body.cols = "*,0";
	}
}	


function validEmail(email) { 
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function sendProfileEmail(){
	
	var Ex_ID 	= $('#Form_Exhibitor_ID').val();
	var Email 	= $('#Form_Email').val();
	var Name 	= $('#Form_Name').val();
	var Phone 	= $('#Form_Phone').val();
	var Message = $('#Form_Message').val();
	
	if(validEmail(Email)){	
		$('#exhibitorContact').html("<br>Sending...");
							
		$.ajax({
			type:'POST',
			url:"https://api.map-dynamics.com/embed/exhibitor-profile/action.handle-email-send.php",
			data:"Ex_ID="+Ex_ID+"&Email="+Email+"&Name="+Name+"&Phone="+Phone+"&Message="+Message,
			success:function(data) {
				$('#exhibitorContact').html("<br>Thank you.  Your email has been sent.");
			}
		});
	}else{
		window.alert("Please enter a valid email.");
	}
}



function submitSearch(){				
	$.ajax({
		type:'POST',
		url:"action.search-exhibitors.php",
		data:"Search="+$('#Search').val()+"&Show_ID="+$('#Show_ID').val()+"&Map_ID="+$('#Map_ID').val()+"&Cat_ID="+$('#Cat_ID').val(),
		success:function(data) {
			$('#searchResults').html(data);
		}
	});			
}
					
                                        
/*******************************************************************************/
//MAP FUNCTIONS
/*******************************************************************************/		
function closeBoothProfile(){
	$('#innerBox').hide();
}

function closeProfile(){
	$('#innerBox').hide();
}


function showCategory(ID){
	$('.categories').hide();	
	$('#group'+ID).show();
}


/*******************************************************************************/
//SCHEDULE FUNCTIONS
/*******************************************************************************/
function getScheduleProfile(ID){
	$('#innerContent').html('<br><br><br><br><center>loading...</center>');		
	$.ajax({
	     type:'POST',
	     url:"https://api.map-dynamics.com/embed/schedule-profile/inc.profile.php",
	     data:"ID="+ID,
	     success:function(data) {
	          $('#innerContent').html(data);
	     }
	});
	$('#innerBox').show();
}


function searchSchedule(searchText){
	var classname = "searchRow";

	if(searchText.length>1){
        showAllTracks();
        
		var searchTerms = searchText.trim().split(' ');
		$('.'+classname).css('display', 'table-row');		
				
		for (var i = 0; i < searchTerms.length; i++) {	
			$('.'+classname).each(function(){
				if($(this).html().toUpperCase().search(searchTerms[i].toUpperCase()) <= 0){
			    	$(this).css('display', 'none');
                    $('.hideTime').show();
				}
			});
		}
	}else{
		$('.'+classname).css('display', 'table-row');
        $('.hideTime').hide();
	}	
}    


var lastTrack = 0;
function showTracks(ID){
    
    if(lastTrack==ID){
        showAllTracks();
    }else{
        $(".trackButton").removeClass('seeThrough');
        $(".searchRow").hide();
        $(".trackButton").addClass('seeThrough');
        
        $(".trackButton"+ID).removeClass('seeThrough');
        $(".track"+ID).show();
        $('.hideTime').show();
        lastTrack = ID;
    }
}  

function showAllTracks(){
    $(".searchRow").show();    
    $(".trackButton").removeClass('seeThrough');
    $('.hideTime').hide();
    lastTrack = 0;    
}
/*******************************************************************************/



/*******************************************************************************/
//SPEAKER FUNCTIONS
/*******************************************************************************/
function getSpeakerProfile(ID){
	$('#innerContent').html('<br><br><br><br><center>loading...</center>');		
	$.ajax({
	     type:'POST',
	     url:"https://api.map-dynamics.com/embed/speaker-profile/inc.profile.php",
	     data:"ID="+ID,
	     success:function(data) {
	          $('#innerContent').html(data);
	     }
	});
	$('#innerBox').show();
}
/*******************************************************************************/