let form = document.forms['subscription-form'];
let emailInput = form.elements['email'];
let error = document.querySelector('.signup-form-error-js');
let subscriptionModal = document.querySelector('.main-modal-js');
let emailPattern = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

form.addEventListener('submit', (e) => {
  e.preventDefault();
  const email = emailInput.value.trim();
  if (email.length === 0 || emailPattern.test(email) == false) {
    error.style.display = "block";
    error.innerHTML = "Please, enter correct email!";
  } else {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', form.action);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if (xhr.status === 200) {
          const response = JSON.parse(xhr.response.substring(1));
          const result = response.result;
          const errorCode = parseInt(response.errorCode);
          const errorMessage = errorCode == 1
            ? "Please, enter correct email!"
            : errorCode == 2
              ? "Something went wrong, please try again." : '';
          if (result) {
            subscriptionModal.style.display = "block";
            setTimeout(() => {
              form.elements['email'].value = '';
              subscriptionModal.style.display = "none";
            }, 3000);
          } else {
            error.style.display = "block";
            error.innerHTML = errorMessage;
            setTimeout(() => {
              error.style.display = "none";
              error.innerHTML = "";
            }, 3000);
          }
        }
        else {
          alert('Request failed.  Returned status of ' + xhr.status);
        }
    };
    xhr.send(encodeURI('email=' + email));
  }
});

emailInput.addEventListener('input', () => {
  if (error.innerHTML != "") {
    error.style.display = "none";
    error.innerHTML = "";
  }
});
