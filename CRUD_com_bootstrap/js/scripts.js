function check() {
    document.getElementById("myCheck").checked = true;
    document.getElementById("myCheck").removeAttribute('disabled')
  };
  
  function uncheck() {
    document.getElementById("myCheck").checked = false;
    document.getElementById("myCheck").setAttribute('disabled','true')
  };
function teste() {alert('teste')};

function validaSenha (input) { 
  if (input.value != document.getElementById('txtSenha').value) {
  input.setCustomValidity('Senha não é igual à digitada')
  input.reportValidity();
  
} else {
  input.setCustomValidity('');
  input.reportValidity();
}};

function seleciona_nivel(form_id) {
  let nivel = document.getElementById(form_id).value;
  console.log(nivel);
  return nivel;
};

function submit_user (user_form) {
  //let formulario = document.getElementById(user)
  let formulario = document.forms[user_form];
  return formulario.submit();
}