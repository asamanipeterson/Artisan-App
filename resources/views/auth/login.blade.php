<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

</head>
<body>
    <style>
        body {
  background-image: url('https://source.unsplash.com/random/1920x1080/?city,urban');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  margin: 0;
  position: relative;
  color: #fff;
}
body::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0, 0, 0, 0.5);
  z-index: 1;
}
.login-container {
  max-width: 400px;
  padding: 30px;
  background: rgba(255, 255, 255, 0.95);
  border-radius: 15px;
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
  z-index: 2;
  color: #333;
}
.toggle-password {
  background: none;
  border: none;
  position: absolute;
  top: 50%;
  right: 10px;
  transform: translateY(-50%);
  cursor: pointer;
  color: #6c757d;
  z-index: 3;
}
.toggle-password:hover {
  color: #007bff;
}
.register-link {
  text-align: center;
  margin-top: 15px;
  color: #333;
}
.register-link a {
  color: #007bff;
  text-decoration: none;
}
.register-link a:hover {
  text-decoration: underline;
}
.btn-wine {
  background-color: #800020;
  border-color: #800020;
  color: #fff;
}
.btn-wine:hover {
  background-color: #66001a;
  border-color: #66001a;
  color: #fff;
}

/* Floating Label Specific Styles - ADJUSTED FOR SMALLER INPUTS */
.form-floating-group {
    position: relative;
    margin-bottom: 25px; /* Keep enough space for error messages */
}
.form-floating-group .form-control {
    padding: 0.75rem 0.75rem; /* Reduced vertical padding */
    height: calc(2.5rem + 2px); /* Reduced height */
    min-height: calc(2.5rem + 2px); /* Ensure minimum height */
}
.form-floating-group .floating-label {
    position: absolute;
    top: 0;
    left: 0;
    height: 100%; /* Still spans full height of input for positioning */
    padding: 0.75rem 0.75rem; /* Reduced vertical padding to match input */
    pointer-events: none;
    border: 1px solid transparent;
    transform-origin: 0 0;
    transition: opacity 0.15s ease-in-out, transform 0.15s ease-in-out;
    color: #6c757d;
    font-size: 1rem; /* Default font size */
}
.form-floating-group .form-control:focus ~ .floating-label,
.form-floating-group .form-control:not(:placeholder-shown) ~ .floating-label {
    transform: scale(0.75) translateY(-0.8rem) translateX(0.1rem); /* Adjusted transform for smaller size and higher movement */
    opacity: 0.65;
    color: #0d6efd;
    font-size: 0.8rem; /* Smaller font size when floating */
}

/* Specific adjustments for password field with toggle button */
.form-floating-group.position-relative .form-control[type="password"] {
  padding-right: 3rem !important; /* Keep space for the eye icon */
}
.form-floating-group.position-relative .toggle-password {
  right: 0.75rem;
  top: 50%;
  transform: translateY(-50%);
}
    </style>
  <div class="login-container">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <h4 class="mb-4 text-center">Login</h4>
    <form action="{{ route('auth.login') }}" method="post">
      @csrf
      {{-- Changed label to "Email or Username" and type to "text" --}}
      <x-form-field label="Email" name="email" type="text"></x-form-field>


      <div class="mb-3 position-relative form-floating-group">
        <x-form-field label="Password" name="password" type="password"></x-form-field>
        <button type="button" class="toggle-password" onclick="togglePassword('password', 'toggleIcon1')">
          <i class="bi bi-eye" id="toggleIcon1"></i>
        </button>
      </div>

      <div class="d-grid">
        <button type="submit" class="btn btn-wine">Login</button>
      </div>
    </form>
    <div class="register-link">
      <p>Don't have an account? <a href="{{ route('auth.register.page') }}">Register here</a></p>
    </div>
  </div>

  <script>
    function togglePassword(inputId, iconId) {
      const input = document.getElementById(inputId);
      const icon = document.getElementById(iconId);

      if (input.type === "password") {
        input.type = "text";
        icon.classList.remove("bi-eye");
        icon.classList.add("bi-eye-slash");
      } else {
        input.type = "password";
        icon.classList.remove("bi-eye-slash");
        icon.classList.add("bi-eye");
      }
    }
  </script>

</body>
</html>
