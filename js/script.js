let form = document.forms['subscription-form'];
let error = document.getElementsByClassName('signup-form__error')[0];
let emailPattern = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

form.addEventListener('submit', (e) => {
  e.preventDefault();
  let email = form.elements['email'].value;
  if (email.length === 0 || emailPattern.test(email) == false) {
    error.style.display = "block";
    error.innerHTML = 'Please, enter correct email!';
  } else {
    console.log('processing');
    const xhr = new XMLHttpRequest();

    xhr.open('POST', form.action);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if (xhr.status === 200) {
          alert('Email is now ' + xhr.responseText);
        }
        else {
          alert('Request failed.  Returned status of ' + xhr.status);
        }
    };
    xhr.send(encodeURI('email=' + email));
  }
});
