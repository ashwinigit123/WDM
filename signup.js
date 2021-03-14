function sendMail() {
		alert('in sendemail');
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

		function redirectUser(){
			var emailID = document.getElementById("em").value;
			alert('email:'+emailID);
			if(emailID.includes('abc'))
			{
				alert('true')
				location.href="https://www.w3schools.com/howto/howto_css_login_form.asp"
			}
		}
