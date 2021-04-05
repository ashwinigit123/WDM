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

		function confirmPass(){
			var enteredpass = document.getElementById("pwd").value;
			var confirmpass = document.getElementById("cnpass").value;
			if(enteredpass != confirmpass)
			{
				alert('passwords do not match. Please re-enter password')
				return false;
			}
		}


    function getSelectValue(e){
      var id = e.id;  // get the sender's id to save it .
      var val = e.value; // get the value.
      localStorage.setItem(id, val);
        self.location='Signup.php?ch=' + val ;
    }
    function selectElement(id, valueToSelect) {
        let element = document.getElementById(id);
        element.value = valueToSelect;
    }
    function loadData() {
     alert('page load')
      var name = localStorage.getItem("choice");
      alert(name)
      if (name !== null) selectElement('ch',name);

      // ...
    }
    function saveValue(e){
      var id = e.id;  // get the sender's id to save it .
      var val = e.value; // get the value.
      localStorage.setItem(id, val);// Every time user writing something, the localStorage's value will override .
    }
    function getSavedValue  (v){
        if (!localStorage.getItem(v)) {
            return "";// You can change this to your defualt value.
        }
        return localStorage.getItem(v);
    }
    function clearData(){
       // Clear the local storage
       window.MyStorage.clear()

    }
    function reloadPage(form){
      var choice = form.choice.options[form.choice.options.selectedIndex].value;
      window.location +='?choice=' + choice ;
      window.location.reload() ;

    }
    
