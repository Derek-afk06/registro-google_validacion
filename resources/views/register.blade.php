<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

    <div class="container-fluid p-0">
        <div class="row g-0 min-vh-100">
            
            <div class="col-md-5 col-lg-6 d-none d-md-flex flex-column justify-content-end p-5 img-sidebar text-white">
                <div class="mb-4">
                    <h2 class="fw-bold fs-1">La siguiente revolución digital.</h2>
                    <p class="text-secondary fs-5">La nueva etapa de la revolución digital se aproxima.</p>
                </div>
            </div>

            <div class="col-12 col-md-7 col-lg-6 d-flex align-items-center justify-content-center p-4 p-sm-5">
                <div class="w-100" style="max-width: 480px;">
                    
                    <h2 class="fw-bold mb-2 fs-1">Crea tu cuenta gratis</h2>
                    
                    <div class="row g-2 my-4">
                        <div class="col-6">
                            <a href="/auth/google" class="btn btn-outline-secondary text-white w-100 py-2 d-flex align-items-center justify-content-center gap-2" style="text-decoration: none;">
                                <i class="bi bi-google"></i> Google
                            </a>
                        </div>
                        <div class="col-6">
                            <button type="button" class="btn btn-outline-secondary text-white w-100 py-2 d-flex align-items-center justify-content-center gap-2">
                                <i class="bi bi-facebook"></i> Facebook
                            </button>
                        </div>
                    </div>

                    <p class="text-secondary small mb-4">Ingresa la siguiente información para registrarte.</p>

                    @if(session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ url('/register') }}" method="POST">
                        
                        @csrf
                        
                        <div class="mb-3">
                            <label for="name" class="form-label small fw-semibold text-secondary">Nombre <span class="text-danger">*</span></label>
                            <input type="text" class="form-control py-2.5" id="name" name="name" placeholder="Tu nombre" value="{{ old('name') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label small fw-semibold text-secondary">Correo electrónico <span class="text-danger">*</span></label>
                            <input type="email" class="form-control py-2.5" id="email" name="email" placeholder="Ingresa tu correo" value="{{ old('email') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label small fw-semibold text-secondary">Contraseña <span class="text-danger">*</span></label>
                            <input type="password" class="form-control py-2.5" id="password" name="password" placeholder="Mínimo 8 caracteres" required>
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label small fw-semibold text-secondary">Confirmar Contraseña <span class="text-danger">*</span></label>
                            <input type="password" class="form-control py-2.5" id="password_confirmation" name="password_confirmation" placeholder="Repite tu contraseña" required>
                        </div>

                        <div class="mb-4">
                            <label for="career_id" class="form-label small fw-semibold text-secondary">Carrera <span class="text-danger">*</span></label>
                            <select class="form-select py-2.5" id="career_id" name="career_id" required>
                                <option selected disabled value="">Selecciona tu carrera...</option>
                                @foreach($careers as $career)
                                    <option value="{{ $career->id }}">{{ $career->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4 form-check">
                            <input type="checkbox" class="form-check-input" name="terms_accepted" id="terms_accepted" required>
                            <label class="form-check-label small text-secondary" for="terms_accepted">
                                Acepto los términos y condiciones
                            </label>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-2.5 fw-bold rounded-pill shadow-sm">
                            Registrar
                        </button>
                    </form>

                    <div class="text-center mt-5 text-secondary" style="font-size: 11px;">
                        Todos los derechos reservados | © 2026 Registro Estudiantes
                    </div>

                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>