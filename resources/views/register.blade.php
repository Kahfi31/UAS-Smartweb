<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visit Ease - Register</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f3f4f6;
            display: flex;
            font-family: 'Inter';
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            width: 100vw;
            height: 100vh;
            margin: 0;
            overflow: hidden;
        }

        .container {
            display: flex;
            width: 100%;
            height: 100vh;
            background-color: white;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        /* LEFT SIDE */
        .left-side {
            position: relative;
            width: 50%;
        }

        .left-side img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .overlay {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 50%;
    height: 600px;
    padding: 2rem;
    background: rgba(245, 240, 235, 0.7); /* Warna putih tulang dengan transparansi */
    backdrop-filter: blur(1px); /* Efek blur */
    border-radius: 15px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
}


        .overlay h1 {
            font-size: 6.0rem;
            font-weight: bold;
            color: white;
            -webkit-text-stroke: 2px #022059; /* Stroke */
            margin: -10px;
        }

        .overlay h2 {
            font-size: 6.0rem;
            font-weight: 800;
            color: #022059;
            margin: 0;
        }

        .overlay p {
            color: #022059;
            font-size: 2.2rem;
            margin-top: 10px;
            font-weight: 100;
        }

        /* RIGHT SIDE */
        .right-side {
            width: 50%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 2.5rem;
        }

        .right-side h2 {
            font-size: 1.75rem;
            font-weight: 600;
            color: #022059;
            margin-bottom: 4.50rem;
            margin-right: 2.00rem;
            text-align: left;
            width: 100%;
            max-width: 400px;
        }

        .input-field {
            width: 400px;
            height: 3.5rem;
            background-color: #d1d5db;
            border-radius: 0.5rem;
            border: none;
            padding: 0 1rem;
            font-size: 1rem;
            color: #374151;
            outline: none;
            margin-bottom: 1rem;
            margin-left: -20px;
        }

        .input-field::placeholder {
            color: #C3B8B8;
        }

        /* Floating label CSS */
        .form-group {
            position: relative;
            width: 100%;
            max-width: 400px;
            margin-bottom: 1.5rem;
        }
        .form-group label {
            position: absolute;
            left: 0rem;
            top: 1.1rem;
            color: #C3B8B8;
            font-size: 1rem;
            pointer-events: none;
            background: transparent;
            transition: 0.2s ease all;
        }
        .input-field:focus + label,
        .input-field:not(:placeholder-shown) + label {
            top: 0;
            left: 0rem;
            font-size: 0.7rem;
            color: #022059;
            background: #fff;
            padding: 0 0.5rem;
        }

        /* BUTTON */
        .register-btn {
            width: 100%;
            max-width: 300px;
            height: 3rem;
            background-color: #022059;
            color: white;
            border: none;
            border-radius: 0.5rem;
            font-size: 1rem;
            cursor: pointer;
            margin-top: 60px;
            margin-left: 60px;
        }

        .register-btn:hover {
            background-color: #011437;
        }

        /* LOGIN LINK */
        .login-text {
            margin-top: 10px;
            font-size: 0.9rem;
            color: #4b5563;
            margin-left: 10px;
        }

        .login-text a {
            color: #022059;
            text-decoration: none;
            font-weight: bold;
        }

        .login-text a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- BAGIAN KIRI (GAMBAR) -->
        <div class="left-side">
            <img src="{{ asset('images/mountainous-landscape-with-fog 2.png') }}" alt="Background">
            <div class="overlay">
                <h1>VISIT</h1>
                <h2>EASE</h2>
                <p>Let's get started</p>
            </div>
        </div>

        <!-- BAGIAN KANAN (FORM) -->
        <div class="right-side">
            <h2>Created account</h2>
            @if (session('success') || session('error'))
            <div id="toast" class="toast {{ session('success') ? 'success' : 'error' }}">
                {{ session('success') ?? session('error') }}
            </div>
            @endif

            @if (isset($pin))
            <div style="margin-bottom: 1rem; color: #022059; font-size: 1.2rem; font-weight: bold;">
                PIN Anda: {{ $pin }}
            </div>
            @endif

            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="email" name="email" class="input-field" placeholder=" " required>
                    <label>Email</label>
                </div>
                <div class="form-group">
                    <input type="text" name="first_name" class="input-field" placeholder=" " required>
                    <label>First Name</label>
                </div>
                <div class="form-group">
                    <input type="text" name="last_name" class="input-field" placeholder=" " required>
                    <label>Last Name</label>
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="input-field" placeholder=" " required>
                    <label>Password</label>
                </div>
                <div class="form-group">
                    <input type="password" name="password_confirmation" class="input-field" placeholder=" " required>
                    <label>Confirm Password</label>
                </div>
                <div class="form-group">
                    <select name="role" class="input-field" required style="appearance: none; -webkit-appearance: none; background-color: #d1d5db;">
                        <option value="" disabled selected hidden></option>
                        <option value="tourist">Tourist</option>
                        <option value="guide">Guide</option>
                        <option value="admin">Admin</option>
                    </select>
                    <label>Role</label>
                </div>
                <button class="register-btn">Register</button>
            </form>

            <p class="login-text">Sudah punya akun? <a href={{ route('login') }}>Masuk</a></p>

        </div>
    </div>

    <script>
        // Auto hide toast
        setTimeout(() => {
            const toast = document.getElementById('toast');
            if (toast) toast.style.opacity = '0';
        }, 3000);
    </script>

    <style>
        .toast {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 1rem 1.5rem;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            color: white;
            z-index: 9999;
            opacity: 1;
            transition: opacity 0.5s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            animation: slideIn 0.3s ease-out;
        }

        .toast.success {
            background-color: #16a34a; /* hijau */
        }

        .toast.error {
            background-color: #dc2626; /* merah */
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</body>
</html>
