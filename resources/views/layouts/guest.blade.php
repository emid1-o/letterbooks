<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Letterbooks – Autenticação</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400&family=DM+Sans:wght@300;400&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <style>
            body {
                background: #0d0d0a;
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                font-family: 'DM Sans', sans-serif;
                font-weight: 300;
            }

            .lb-bg {
                position: fixed;
                inset: 0;
                background-image: url('https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?q=80&w=2000&auto=format&fit=crop');
                background-size: cover;
                background-position: center;
                filter: grayscale(40%) brightness(0.25);
                z-index: 0;
                transform: scale(1.04);
                animation: lb-slowZoom 20s ease-in-out infinite alternate;
            }

            @keyframes lb-slowZoom {
                from { transform: scale(1.04); }
                to   { transform: scale(1.10); }
            }

            .lb-wrapper {
                position: relative;
                z-index: 10;
                display: flex;
                flex-direction: column;
                align-items: center;
                gap: 2rem;
                width: 100%;
                max-width: 420px;
                padding: 1.5rem;
                animation: lb-fadeUp 0.9s cubic-bezier(0.22, 1, 0.36, 1) both;
            }

            @keyframes lb-fadeUp {
                from { opacity: 0; transform: translateY(24px); }
                to   { opacity: 1; transform: translateY(0); }
            }

            .lb-brand h1 {
                font-family: 'Cormorant Garamond', serif;
                font-weight: 300;
                font-size: 2.6rem;
                letter-spacing: 0.22em;
                color: #f0ebe3;
                text-transform: uppercase;
            }

            .lb-brand .lb-divider {
                width: 32px;
                height: 1px;
                background: #4a4035;
                margin: 0.5rem auto 0.4rem;
            }

            .lb-brand p {
                font-size: 0.68rem;
                letter-spacing: 0.3em;
                color: #8a8070;
                text-transform: uppercase;
            }

            .lb-card {
                width: 100%;
                background: rgba(14, 12, 10, 0.82);
                border: 1px solid rgba(255, 255, 255, 0.07);
                border-radius: 4px;
                padding: 2.4rem 2.2rem;
                backdrop-filter: blur(18px);
                -webkit-backdrop-filter: blur(18px);
            }

            .form-control {
                background: rgba(255, 255, 255, 0.04) !important;
                border-color: rgba(255, 255, 255, 0.09) !important;
                color: #d4cdc5 !important;
                border-radius: 2px;
                font-family: 'DM Sans', sans-serif;
                font-size: 0.88rem;
            }

            .form-control:focus {
                background: rgba(255, 255, 255, 0.06) !important;
                border-color: rgba(255, 255, 255, 0.22) !important;
                box-shadow: none !important;
            }

            .form-label {
                font-size: 0.68rem;
                letter-spacing: 0.18em;
                text-transform: uppercase;
                color: #6b6257;
                margin-bottom: 0.45rem;
            }

            .lb-btn {
                background: #c9b99a;
                color: #0d0c0a;
                font-size: 0.75rem;
                font-weight: 400;
                letter-spacing: 0.2em;
                text-transform: uppercase;
                border: none;
                border-radius: 2px;
                padding: 0.6rem 1.4rem;
                transition: background 0.2s;
            }

            .lb-btn:hover {
                background: #d9c9aa;
                color: #0d0c0a;
            }

            .lb-link {
                font-size: 0.75rem;
                color: #5a5248;
                text-decoration: none;
                letter-spacing: 0.05em;
                transition: color 0.2s;
            }

            .lb-link:hover {
                color: #c9b99a;
            }

            .invalid-feedback {
                font-size: 0.75rem;
                color: #c07a6a;
            }
        </style>
    </head>
    <body>

        <div class="lb-bg"></div>

        <div class="lb-wrapper">

            <div class="lb-brand text-center">
                <a href="/" style="text-decoration:none;">
                    <h1>Letterbooks</h1>
                    <div class="lb-divider"></div>
                    <p>O que você tem lido?</p>
                </a>
            </div>

            <div class="lb-card">
                {{ $slot }}
            </div>

        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>