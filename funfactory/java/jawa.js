document.addEventListener('DOMContentLoaded', function () {
  const loginForm = document.getElementById('loginForm');
  const loadingPopup = document.getElementById('loadingPopup');
  const forgotPasswordLink = document.getElementById('forgotPasswordLink');

  // Saat form dikirim → tampilkan loading
  loginForm.addEventListener('submit', function() {
    loadingPopup.style.display = 'flex';
  });

  // Lupa password
  forgotPasswordLink.addEventListener('click', function (event) {
    event.preventDefault();
    loadingPopup.style.display = 'flex';
    setTimeout(() => {
      loadingPopup.style.display = 'none';
      window.location.href = 'forgot.html';
    }, 1200);
  });
});
