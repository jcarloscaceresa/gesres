function togglePasswordVisibility() {
    var passwordInput = document.getElementById("password");
    var passwordToggle = document.querySelector("#password-toggle");
  
    if (passwordInput.type === "password") {
      passwordInput.type = "text";
      passwordToggle.src = "../assets/img/ojocerrado.png";
      passwordToggle.alt = "Ocultar contraseña";
    } else {
      passwordInput.type = "password";
      passwordToggle.src = "../assets/img/ojoabierto.png";
      passwordToggle.alt = "Mostrar contraseña";
    }
  }