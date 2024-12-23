<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer Contraseña - FEDETIRO</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            height: 100vh;
            margin: 0;
            background-color: #f4f7fa;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container-fluid {
            height: 100%;
            padding: 0;
            display: flex;
            flex-wrap: wrap;
        }

        .image-section {
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100%;
            flex: 1;
            min-height: 300px;
            position: relative;
            box-shadow: 10px 0 20px rgba(0, 0, 0, 0.5);
            /* Sombra a la derecha */
            transition: filter 1s ease;
            z-index: 1;
            /* Asegura que esté por debajo del contenedor de login */
        }

        .image-section:hover {
            filter: grayscale(100%);
        }

        .login-section {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #ffffff;
            flex: 1;
            min-height: 300px;
            position: relative;
            z-index: 2;
            /* Asegura que esté por encima del contenedor de imagen */
            padding-left: 15px;
            /* Espacio para la sombra */
        }

        .login-container {
            max-width: 400px;
            width: 100%;
            padding: 30px;
            background: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .login-container img {
            display: block;
            margin: 0 auto 20px;
            max-width: 150px;
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-control {
            border-radius: 5px;
            box-shadow: none;
            border-color: #ddd;
        }

        .btn-primary {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            background-color: #007bff;
            border-color: #007bff;
            box-shadow: none;
            transition: background-color 0.3s, border-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .text-sm {
            font-size: 0.875rem;
            color: #666;
        }

        .underline {
            text-decoration: underline;
        }

        .text-center {
            text-align: center;
        }

        @media (max-width: 768px) {
            .image-section {
                display: none;
                /* Oculta la imagen en dispositivos móviles */
            }

            .login-section {
                flex: 0 0 100%;
                max-width: 100%;
            }
        }
    </style>
</head>

<body>
    <?php $admin_logo_img = Voyager::setting('admin.icon_image', ''); ?>
    <?php $admin_bg_image = Voyager::setting('admin.bg_image', ''); ?>
    <div class="container-fluid">
        <div class="col-lg-6 col-md-6 image-section"
            style="background-image: url('{{ $admin_bg_image ? Voyager::image($admin_bg_image) : voyager_asset('images/fedetiro.png') }}');">
        </div>
        <div class="col-lg-6 col-md-6 login-section">
            <div class="login-container">
                <div class="logo-icon-container">
                    <?php $admin_logo_img = Voyager::setting('admin.icon_image', ''); ?>
                    @if ($admin_logo_img == '')
                    <a href="{{ url('/') }}">
                        <img src="{{ $admin_logo_img ? Voyager::image($admin_logo_img) : voyager_asset('images/fedetiro.png') }}"
                            alt="FEDETIRO Logo">
                    </a>
                @else
                    <a href="{{ url('/') }}">
                        <img src="{{ Voyager::image($admin_logo_img) }}" alt="Logo Icon">
                    </a>
                @endif
                </div>
                </a>
                <h2>Restablecer Contraseña</h2>
                <x-guest-layout>
                    <x-authentication-card>
                        <div class="mb-4 text-sm text-gray-600">
                            {{ __('¿Olvidaste tu contraseña? Simplemente háganos saber su número de identificación y le enviaremos un enlace para restablecer su contraseña que le permitirá elegir una nueva.') }}
                        </div>

                        @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ session('status') }}
                            </div>
                        @endif

                        <x-validation-errors class="mb-4" />

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div>
                                <x-label for="username" value="{{ __('Número de Identificación') }}" />
                                <x-input id="username" class="block mt-1 w-full" type="text" name="username"
                                    :value="old('username')" required autofocus autocomplete="username" pattern="[0-9]*"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '')" />
                            </div>

                            <div class="mt-4">
                                <x-button>
                                    {{ __('Restablecer contraseña') }}
                                </x-button>
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                    href="{{ route('login') }}">
                                    {{ __('Iniciar Sesión') }}
                                </a>
                            </div>
                        </form>
                    </x-authentication-card>
                </x-guest-layout>
            </div> <!-- .login-container -->
        </div>
    </div>
</body>

</html>
