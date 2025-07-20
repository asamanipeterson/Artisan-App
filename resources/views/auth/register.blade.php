<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Register Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      background-image: url('https://source.unsplash.com/random/1920x1080/?nature,landscape');
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
    .register-container {
      max-width: 500px;
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
      right: 10px; /* Adjusted to be consistent with floating label padding */
      transform: translateY(-50%);
      cursor: pointer;
      color: #6c757d;
      z-index: 3; /* Ensure it's above the label */
    }
    .toggle-password:hover {
      color: #007bff;
    }
    .login-link {
      text-align: center;
      margin-top: 15px;
      color: #333;
    }
    .login-link a {
      color: #007bff;
      text-decoration: none;
    }
    .login-link a:hover {
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

    /* Floating Label Specific Styles (Copied from Login Form and adjusted) */
    .form-floating-group {
        position: relative;
        margin-bottom: 25px; /* Ensure enough space for floating label and error messages */
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
        height: 100%;
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
      right: 0.75rem; /* Adjusted right position */
      top: 50%;
      transform: translateY(-50%);
    }

  </style>
</head>
<body>

  <div class="register-container">
    <h4 class="mb-4 text-center">Register</h4>
    <form  method="POST" action="{{ route('auth.register') }}" enctype="multipart/form-data">
        @csrf
      <x-form-field label="Name" name="name" type="text"></x-form-field>

      <x-form-field label="Email" name="email" type="email"></x-form-field>

      <div class="mb-3 position-relative form-floating-group"> {{-- Added form-floating-group here --}}
        <x-form-field label="Password" name="password" type="password"></x-form-field>
        <button type="button" class="toggle-password" onclick="togglePassword('password', 'toggleIcon1')">
          <i class="bi bi-eye" id="toggleIcon1"></i>
        </button>
      </div>

      <div class="mb-3 position-relative form-floating-group"> {{-- Added form-floating-group here --}}
        <x-form-field label="Confirm password" name="password_confirmation" type="password"></x-form-field>
        <button type="button" class="toggle-password" onclick="togglePassword('password_confirmation', 'toggleIcon2')">
          <i class="bi bi-eye" id="toggleIcon2"></i>
        </button>
      </div>

        <x-form-field label="Contact Number" name="contact" type="tel"></x-form-field>

      <x-form-field label="location" name="location" type="text"></x-form-field>

      {{-- Special handling for 'file' type as floating labels don't typically apply well to them.
           We'll keep it as a standard Bootstrap input for now.
           If you want a custom file input, that's a different UI pattern.
      --}}
      <div class="mb-4">
        <label for="image" class="form-label">Image</label>
        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image">
        @error('image')
            <div id="invalidImageFeedback" class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="mb-4">
        {{-- <x-form-field label="User Type" name="user_type" type="text"></x-form-field> --}}
      </div>

      <div class="d-grid">
        <button type="submit" class="btn btn-wine">Register</button>
      </div>
    </form>
    <div class="login-link">
      <p>Already have an account? <a href="{{ route('auth.login.page') }}">Login here</a></p>
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
