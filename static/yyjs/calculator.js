function show(value)
    {
        if(value==6)
           document.getElementById("lendingrates").value=5.60+"%"
         else if(value==12)
           document.getElementById("lendingrates").value=6.00+"%"
            else if(value==24)
            document.getElementById("lendingrates").value=6.15+"%"
                 else if(value==36)
                    document.getElementById("lendingrates").value=6.15+"%"
               
    }

function Calculator()
    {
         var x=document.getElementById("loadAmt").value
         var y=document.getElementById("deadline").value
         var z
         var t
         var m
         var b
         var c
         var a=document.getElementsByName("radio1")
         if(y==6 && a[0].checked)
         {
         	//var a=document.getElementById("radio").value
         	
         	    b=0.056/12
         	    z=1
         	    for(var i=0;i<y;i++)
         	         z=z*(1+b)
                m=z*x
                m=m*b
                t=z-1
                m=m/t
                m=m*y  
                t=m-x
                document.getElementById("a1").value=t.toFixed(2)
                document.getElementById("a2").value=m.toFixed(2)
             }
            else if(y==6 && a[1].checked)

             {
             	var sum1=0
                var sum2=0
             	   b=0.056/12
             	   z=x/y
             	   var u
             	  // var v=y+1
                   for(var j=0;j<y;j++)
                        {   
                   	        
                   	        c=z*j
                   	        u=x-c    
                   	        t=u*b
                   	        sum1=z+t
                   	        sum2=sum1+sum2
                        }
                sum1=sum2-x
                document.getElementById("a1").value=sum1.toFixed(2)
                document.getElementById("a2").value=sum2.toFixed(2)

             }
                 	
         
         else  if(y==12 && a[0].checked)
         {
           
         	    b=0.06/12
         	    z=1
         	    for(var i=0;i<y;i++)
         	         z=z*(1+b)
                m=z*x
                m=m*b
                t=z-1
                m=m/t
                m=m*y  
                t=m-x
                document.getElementById("a1").value=t.toFixed(2)
                document.getElementById("a2").value=m.toFixed(2)
             

         }
          else  if(y==12 && a[1].checked)
         {
           
         	    var sum1=0
                var sum2=0
             	   b=0.06/12
             	   z=x/y
             	   var u
             	  // var v=y+1
                   for(var j=0;j<y;j++)
                        {   
                   	        
                   	        c=z*j
                   	        u=x-c    
                   	        t=u*b
                   	        sum1=z+t
                   	        sum2=sum1+sum2
                        }
                sum1=sum2-x
                document.getElementById("a1").value=sum1.toFixed(2)
                document.getElementById("a2").value=sum2.toFixed(2)
             

         }
         else if(y==24 && a[0].checked)
         {
            
         	    b=0.0615/12
         	    z=1
         	    for(var i=0;i<y;i++)
         	         z=z*(1+b)
                m=z*x
                m=m*b
                t=z-1
                m=m/t
                m=m*y  
                t=m-x
                document.getElementById("a1").value=t.toFixed(2)
                document.getElementById("a2").value=m.toFixed(2)
             

         }
           else if(y==24 && a[1].checked)
             {
             	 var sum1=0
                var sum2=0
             	   b=0.0615/12
             	   z=x/y
             	   var u
             	  // var v=y+1
                   for(var j=0;j<y;j++)
                        {   
                   	        
                   	        c=z*j
                   	        u=x-c    
                   	        t=u*b
                   	        sum1=z+t
                   	        sum2=sum1+sum2
                        }
                sum1=sum2-x
                document.getElementById("a1").value=sum1.toFixed(2)
                document.getElementById("a2").value=sum2.toFixed(2)

             }
         else if(y==36 &&a[0].checked)
         {  
            
         	    b=0.0615/12
         	    z=1
         	    for(var i=0;i<y;i++)
         	         z=z*(1+b)
                m=z*x
                m=m*b
                t=z-1
                m=m/t
                m=m*y  
                t=m-x
                document.getElementById("a1").value=t.toFixed(2)
                document.getElementById("a2").value=m.toFixed(2)
             


         }
           else if(y==36 && a[1].checked)
             {
             	var sum1=0
                var sum2=0
             	   b=0.0615/12
             	   z=x/y
             	   var u
             	  // var v=y+1
                   for(var j=0;j<y;j++)
                        {   
                   	        
                   	        c=z*j
                   	        u=x-c    
                   	        t=u*b
                   	        sum1=z+t
                   	        sum2=sum1+sum2
                        }
                sum1=sum2-x
                document.getElementById("a1").value=sum1.toFixed(2)
                document.getElementById("a2").value=sum2.toFixed(2)

             }
           
    }
    function Reset()
    {
         document.getElementById("loadAmt").value=" "
         document.getElementById("lendingrates").value=6.85+"%"
         document.getElementById("deadline").value=6
         document.getElementById("a1").value=" "
         document.getElementById("a2").value=" "
    }
	function slideTab(slideId) {

				var curSlide = document.getElementById(slideId);
				var curTab = curSlide.getElementsByTagName("dt");
				var count = curTab.length;
				for (var i=0;i<count ;i++ )
				{
				   curTab[i].onclick = function() {
				      var dl = this.parentNode;
					  dl.className = dl.className == "zc_show" ? "" : "zc_show";
					  this.className = this.className == "zc_down" ? "zc_up" : "zc_down" ;
				   }
				}
				return false;
			}

			slideTab("slide_1")
			function left( dl, dd ){
				var dl = jQuery("#slide_1 dl[param='" + dl + "']").addClass( "zc_show" );
				dl.find("DT").addClass("zc_down");
				dl.find("DD p a[param='" + dd + "']").addClass("selected");
			}
