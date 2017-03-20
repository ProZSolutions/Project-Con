function valid(){
	var a = document.getElementById("date").value;
	var b = document.getElementById("mat").value;
	var c= document.getElementById("del").value;
	var d= document.getElementById("first-name").value;
	var e = document.getElementById("first-name1").value;
	var f= document.getElementById("first-name2").value;
	var g= document.getElementById("first-name3").value;
	if(a == null||a == "")
	{	
	  
	
	  
	    return false;
    }
	
	else if(b == null||b =="")
	    {
			
	      return false;
	    }
	
			
		else if(c == null||c =="")
	    {
			
			 return false;
	      
	    }
			
		else if(d == null||d =="")
	    {
			 return false;
	      
	    }	
		else if(e == null||e =="")
	    {
			 return false;
	      
	    }
		else if(f == null||f =="")
	    {
			 return false;
	      
	    }
		else if(g == null||g =="")
	    {
			 return false;
	      
	    }
		else{
	        var r = confirm("Are you save Data!");
               if (r == true) {
                 window.load("inwarddb.php");
				
				
                               }
							   else {
								   alert("Data saved Unsucessfully");
        
		 return false;
                                     }
   
		}
		 }

/*
function confirm()
 {
    var txt;
   

}*/