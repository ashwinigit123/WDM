function sendMail() {
			var emailID=document.getElementById("email").value;
			var password=document.getElementById('pwd').value;
			var subject = ('Welcome to YouareonDefault');
			var body = ('Here are your credentials- %0DLogin email:' +emailID+ '%0DPassword :'+password+ '%0D%0DThank you') ;
			//document.write('<a href="mailto:' + emailID + '?subject=' +subject+ '&body=' +body+ '">' + 'Click here to get an email with credentials' + '<'+'/a>');
			//location.href = "Login.html";
			var link = "mailto:"+emailID
             + "?subject=" + encodeURIComponent(subject)
             + "&body=" + encodeURIComponent(body)
    		 ;

    	window.location.href = link;
				alert('You have registered successfully and Email has been sent. Click on login to go to login page.');
		}
		// document.getElementById("myButton").onclick = function () {
	  //        location.href = "www.yoursite.com";
	  //    };
		function redirectUser(f){
			var user = document.getElementById("em").value;
			if(user == 'abc@gmail.com')
			{
				//window.location="/BuildingDashboard.html"
				f.action = "BuildingDashboard.html"
				//return false;
			}
			if(user == 'xyz@gmail.com')
			{
				f.action ="ApartmentDash.html"
			}
			if(user == 'lmn@gmail.com')
			{

				f.action ="SubdivisionDashboard.html"
			}
			if(user == 'pqr@gmail.com')
			{
				f.action ="SuperUserDash.html"
			}
			return false;
		}
