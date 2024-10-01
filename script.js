
document.getElementById('login-form').addEventListener('submit', (e) => {
  e.preventDefault();
  const username = document.getElementById('username').value;
  const password = document.getElementById('password').value;


  fetch('/login', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({ username, password })
  })
  .then((response) => response.json())
  .then((data) => {
    if (data.success) {

      window.location.href = 'dashboard.html';
    } else {
      alert('Invalid username or password');
    }
  })
  .catch((error