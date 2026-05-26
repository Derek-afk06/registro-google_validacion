<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Completar Perfil - Alumno</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="d-flex align-items-center justify-content-center vh-100 p-3 cp-body"> <div class="cp-card p-4 shadow-lg"> <div class="text-center mb-4">
            <h2 class="fw-bold mb-1">¡Ya casi listo!</h2>
            <p class="text-secondary small">Completa los últimos detalles de tu cuenta</p>
        </div>

        <form action="{{ route('complete.profile.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label text-secondary small fw-medium">Nombre Completo</label>
                <div class="input-group">
                    <span class="input-group-text bg-dark border-secondary text-secondary"><i class="bi bi-person"></i></span>
                    <input type="text" class="form-control cp-input-disabled" value="{{ session('google_name') }}" readonly> </div>
            </div>

            <div class="mb-3">
                <label class="form-label text-secondary small fw-medium">Correo Electrónico</label>
                <div class="input-group">
                    <span class="input-group-text bg-dark border-secondary text-secondary"><i class="bi bi-envelope"></i></span>
                    <input type="email" class="form-control cp-input-disabled" value="{{ session('google_email') }}" readonly> </div>
            </div>

            <div class="mb-3">
                <label class="form-label small fw-medium">Selecciona tu Carrera <span class="text-danger">*</span></label>
                
                <select name="career_id" class="form-select py-2.5" required>
                    <option value="" disabled selected>Selecciona tu carrera...</option>
                    @foreach($careers as $career)
                        <option value="{{ $career->id }}">{{ $career->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4 form-check">
                <input type="checkbox" name="terms_accepted" class="form-check-input" id="terms" required>
                <label class="form-check-label small text-secondary" for="terms">
                    Acepto los <a href="#" class="text-decoration-none text-primary">Términos y condiciones de uso</a>
                </label>
            </div>

            <button type="submit" class="btn btn-primary w-100 py-2 fw-medium">
                <i class="bi bi-check-circle me-1"></i> Finalizar Registro
            </button>
        </form>
    </div>

</body>
</html>