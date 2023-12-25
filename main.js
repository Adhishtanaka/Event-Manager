
//check user log in or not 
function checklogin() {
  //check localstorage file to check user log in or not
    let islogin = localStorage.getItem('user_logged_in');

    if (!islogin || islogin !== 'true') { //if user not log in then it will show modal with sign in & sign up option
        let loginModal = new bootstrap.Modal(document.getElementById("exampleModal"));
        loginModal.show();
    } else {

        //if user log in then it will redirect this page into  dashboard.html
        window.location.href = 'dashboard.html';
       
        
    
    }
}
//check user log in or not & fetch user email 
function checkdashlogin() {
   //check localstorage file to check user log in or not
    let islogin = localStorage.getItem('user_logged_in');

    if (!islogin || islogin !== 'true') { //if user not log in then it will show modal with sign in & sign up option
        let loginModal = new bootstrap.Modal(document.getElementById("exampleModal"));
        loginModal.show();
    }else{
 
      //if user is login then itwill fetch user email from localstorage 
        let userEmail = localStorage.getItem('email');
        if (userEmail) {
           //show user email in usermail element
            document.uev.useremail.value = userEmail;
            document.uev.hiddenuseremail.value = userEmail;

        }
    }
}

//function for validate user sign up form input
function validatesup() {

  //check email is empty or not
    if (document.sup.email.value == "") {
        alert("Type your Email");
        return false;
      }
      //check passowrd is empty or not
      if (document.sup.password.value == "") {
        alert("Type your Password");
        return false;
      }
      //check confird password is empty or not
      if (document.sup.cpassword.value == "") {
        alert("Type your Password again");
        return false;
      }
  //check the passwords are matching or not
    if (document.sup.password.value !== document.sup.cpassword.value) {
      alert("Passwords do not match");
      return false;
    }

    //check user click the agree button
    if (!(document.sup.agree.checked)) {
      alert("You must agree to the terms and conditions");
      return false;
    }

    return true;
  }

  //validation for signin form
  function validatesin() {

    //check email is empty or not
    if (document.sin.email.value == "") {
        alert("Type your Email");
        return false;
      }
      //check passowrd is empty or not
      if (document.sin.password.value == "") {
        alert("Type your Password");
        return false;
      }

    return true;
  }
//validate events submit form to check that user did fill it without empty value
  function validateevent(){

    //check event title is empty or not
    if (document.uev.eventti.value == "") {
        alert("Please Complete Info");
        return false;
      }
      //check event discription is empty or not
      if (document.uev.eventdis.value == "") {
        alert("Please Complete Info");
        return false;
      }
    //check event category is selected or not
      if (document.uev.tag.value == "0") {
        alert("Please Select Category");
        return false;
      }

      //check user picked any date or not
      let x = document.uev.datepicker.value;

      if (!x) {
        alert("Please select a date and time.");
        return false;
      }
      
      //get current data & selected date
      const selectedDateTime = new Date(x);
      const currentDateTime = new Date();

      //chek user picked old date or not
      if (selectedDateTime <= currentDateTime) {
        alert("Please select an upcoming date and time.");
        return false;
      } 

    return true;
  }


  