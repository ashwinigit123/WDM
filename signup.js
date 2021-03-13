function sendMail() {
			var emailID=document.getElementById("email").value;
			var password=document.getElementById('pwd').value;
			var subject = ('Welcome to YouareonDefault');
			var body = ('Here are your credentials- %0DLogin email:' +emailID+ '%0DPassword :'+password+ '%0D%0DThank you') ;
			document.write('<a href="mailto:' + emailID + '?subject=' +subject+ '&body=' +body+ '">' + 'Click here to get an email with credentials' + '<'+'/a>');
		}