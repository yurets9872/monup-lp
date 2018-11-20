let form = document.forms['subscription-form'];
let error = document.getElementsByClassName('signup-form__error')[0];
let emailPattern = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

form.addEventListener('submit', (e) => {
  let email = form.elements['email'].value;
  if (email.length === 0 || emailPattern.test(email) == false) {
    e.preventDefault();
    error.style.display = "block";
    error.innerHTML = 'Please, enter correct email!';
  }
});
