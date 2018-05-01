function validate(form_id,email) {
  console.log('it works');
   var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
   var address = document.forms[form_id].elements[email].value;
   var errorEl = document.getElementsByClassName('.signup-form__error')[0];
   if(reg.test(address) == false) {
     console.log(errorEl);
      errorEl.innerHTML('Enter correct email!');
      return false;
       }
}
