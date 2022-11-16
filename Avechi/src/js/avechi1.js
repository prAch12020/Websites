
	function openContactForm()
	{
		var x = document.getElementById("contact_form");
		if(x.style.display == "none")
		{
			x.style.display = "block";
		}
		else
		{
			x.style.display = "none";
		}
	}

	function openForm(evt, form_type) {
	  var i, tabcontent, tablinks;
	  tabcontent = document.getElementsByClassName("tabcontent");
	  for (i = 0; i < tabcontent.length; i++) {
	    tabcontent[i].style.display = "none";
	  }
	  tablinks = document.getElementsByClassName("tablinks");
	  for (i = 0; i < tablinks.length; i++) {
	    tablinks[i].className = tablinks[i].className.replace(" active-tab", "");
	  }
	  document.getElementById(form_type).style.display = "block";
	  evt.currentTarget.className += " active-tab";
	}
	
	function openSearch(elem1, elem2)
	{
		var x = document.getElementById(elem1);
		var y = document.getElementById(elem2);

		if (x.style.display === "none" && y.style.display === "none")
		{
			x.style.display = "block";
			y.style.display = "block"
		}
		else
		{
			x.style.display = "none";
			y.style.display = "none"
		}
	}

	function viewSearch(elem1, elem2)
	{
		var x = document.getElementById(elem1);
		var y = document.getElementById(elem2);

		x.style.display = "block";
		y.style.display = "none";
	}
	function openDiv(elem1, elem2)
	{
		var x = document.getElementById(elem1);

		x.style.display = "block";

		var y = document.getElementById(elem2);
		y.style.display = "block";

	}

	function like1()
    {
        var x = document.getElementById("like_btn1");
		var y = document.getElementById("like_btn2");

                            
        if(y.style.display = 'inline-block')
        {
        	y.style.display = "none";
            x.style.display = "inline-block";
        }
                            
    }

    function cart()
    {
    	var x = document.getElementById("cart1");
        var y = document.getElementById("cart2");

        if(x.style.display = 'inline-block')
        {
        	x.style.display = "none";
            y.style.display = "inline-block";
        }
                    
    }
    
    function cart1()
    {
    	var x = document.getElementById("cart1");
        var y = document.getElementById("cart2");

                    
        if(y.style.display = 'inline-block')
        {
        	y.style.display = "none";
            x.style.display = "inline-block";
        }
                    
    }

    function openMenu(evt, method) {
		var i, tabcontent, tablinks;
		tabcontent = document.getElementsByClassName("tabcontent");
		for (i = 0; i < tabcontent.length; i++) {
		  tabcontent[i].style.display = "none";
		}
		tablinks = document.getElementsByClassName("tablinks");
		for (i = 0; i < tablinks.length; i++) {
		  tablinks[i].className = tablinks[i].className.replace("active-tab", "");
		}
		document.getElementById(method).style.display = "block";
		evt.currentTarget.className += " active-tab";
	}
	
	function enableEdit(element, opp_element, value){
		let ele = document.getElementById(element);
		let opp = document.getElementById(opp_element);
		if(value){
			ele.disabled = !value;
			opp.disabled = value;
		}
		else{
			ele.disabled = value;
			opp.disabled = !value;
		}
	}