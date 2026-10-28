
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }

    body {
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background: linear-gradient(135deg, #0f172a, #2563eb);
      padding: 20px;
    }

    .login-container {
      width: 100%;
      max-width: 400px;
      background: #ffffff;
      padding: 35px;
      border-radius: 16px;
      box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
    }

    .login-container h2 {
      text-align: center;
      color: #1e293b;
      margin-bottom: 10px;
    }

    .subtitle {
      text-align: center;
      color: #64748b;
      font-size: 14px;
      margin-bottom: 28px;
    }

    .form-group {
      margin-bottom: 18px;
    }

    label {
      display: block;
      margin-bottom: 8px;
      color: #334155;
      font-size: 14px;
      font-weight: 600;
    }

    input[type="email"],
    input[type="password"],
    input[type="text"] {
      width: 100%;
      padding: 12px;
      border: 1px solid #cbd5e1;
      border-radius: 8px;
      outline: none;
      font-size: 15px;
    }

    input:focus {
      border-color: #2563eb;
      box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.12);
    }

    .password-wrapper {
      position: relative;
    }

    .password-wrapper input {
      padding-right: 65px;
    }

    .toggle-password {
      position: absolute;
      right: 10px;
      top: 50%;
      transform: translateY(-50%);
      border: none;
      background: none;
      color: #2563eb;
      cursor: pointer;
      font-size: 12px;
    }

    .form-options {
      display: flex;
      justify-content: space-between;
      align-items: center;
      gap: 10px;
      margin: 5px 0 22px;
      font-size: 13px;
    }

    .remember {
      display: flex;
      align-items: center;
      gap: 6px;
      color: #475569;
    }

    a {
      color: #2563eb;
      text-decoration: none;
    }

    a:hover {
      text-decoration: underline;
    }

    .login-btn {
      width: 100%;
      padding: 13px;
      border: none;
      border-radius: 8px;
      background: #2563eb;
      color: white;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
      transition: background 0.2s;
    }

    .login-btn:hover {
      background: #1d4ed8;
    }

    .signup {
      text-align: center;
      margin-top: 22px;
      font-size: 14px;
      color: #64748b;
    }

    #message {
      margin-top: 14px;
      text-align: center;
      font-size: 13px;
      color: #b91c1c;
    }

    @media (max-width: 480px) {
      .login-container {
        padding: 25px 20px;
      }
    }
	.alert{
		color: red;
		text-align: center;
	}
  </style>
</head>

<body>
  <main class="login-container">
    <h2>Welcome Back</h2>
    <p class="subtitle">Sign in to continue to your account</p>

    <form id="loginForm" action="<?php echo base_url('Auth/login'); ?>" method="POST">
      <div class="form-group">
        <label for="email">Email Address</label>
        <input
          type="email"
          id="email"
          name="email"
          placeholder="you@example.com"
          autocomplete="username"
          required
        >
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <div class="password-wrapper">
          <input
            type="password"
            id="password"
            name="password"
            placeholder="Enter your password"
            autocomplete="current-password"
            required
          >
          <button
            type="button"
            class="toggle-password"
            id="togglePassword"
            aria-controls="password"
            aria-pressed="false"
          >Show</button>
        </div>
      </div>


      <button type="submit" class="login-btn">
        Sign In
      </button>

      <p id="message" role="status" aria-live="polite"></p>
    </form>

	<?= validation_errors() ?>
	<?php if ($this->session->flashdata('error')) { ?>
    	<div class="alert alert-danger" >
			<?php echo $this->session->flashdata('error'); ?>
		</div>
	<?php } ?>

  </main>

  <script>
    const password = document.getElementById("password");
    const toggle = document.getElementById("togglePassword");

    toggle.addEventListener("click", () => {
      const isHidden = password.type === "password";

      password.type = isHidden ? "text" : "password";
      toggle.textContent = isHidden ? "Hide" : "Show";
      toggle.setAttribute("aria-pressed", String(isHidden));
    });

  </script>
</body>
</html>
