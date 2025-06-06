<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grasa-corporal | Calculadoras</title>
    <link rel="icon" href="https://live.staticflickr.com/65535/54501688131_7e4cf65737_n.jpg" type="image/jpeg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wdth,wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite(['resources/js/grasaCorp.js', 'resources/js/dropdown.js', 'resources/js/select.js', 'resources/sass/app.scss'])
</head>

<body class="bg-dark-gray home-page">
    <x-navbar />
    <section class="grasa-corp">
        <div class="grasa-corp__container container">
            <img src="https://live.staticflickr.com/65535/54494721934_e89a62393b_s.jpg" alt="Icono calculadoras"
                class="grasa-corp__icon">
            <h1 class="grasa-corp__title display-5">CÁLCULO DE % DE GRASA CORPORAL</h1>
            <p class="grasa-corp__description lead">
                Esta calculadora de porcentaje de grasa corporal (PGC), te indica, de forma aproximada, que % de tu
                cuerpo es grasa.
            </p>
            <div class="grasa-corp__form-wrapper row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8">
                    <div class="grasa-corp__form-container">
                        <form id="grasa-corp-form" class="grasa-corp__form">
                            <div class="row g-3">
                                <div class="col-md-6 grasa-corp__form-group">
                                    <label for="edad" class="grasa-corp__label">Tu edad</label>
                                    <input type="number" class="grasa-corp__input form-control" id="edad"
                                        placeholder="Introduce tu edad" required step="0.1" min="1">
                                    <div class="grasa-corp__text-danger invalid-feedback" id="edad-error"></div>
                                </div>
                                <div class="col-md-6 grasa-corp__form-group">
                                    <label for="sexo-trigger" class="grasa-corp__label">Tu sexo</label>
                                    <div class="custom-select-wrapper">
                                        <div class="custom-select grasa-corp__input" id="sexo-trigger" tabindex="0">
                                            <span class="custom-select-value">Selecciona tu sexo</span>
                                            <i class="custom-select-arrow fas fa-chevron-down"></i>
                                        </div>
                                        <div class="custom-select-options">
                                            <div class="custom-select-option" data-value="hombre">Hombre</div>
                                            <div class="custom-select-option" data-value="mujer">Mujer</div>
                                        </div>
                                        <input type="hidden" name="sexo" id="sexo" required>
                                    </div>
                                    <div id="sexo-error" class="grasa-corp__text-danger" style="display:none;"></div>
                                </div>
                            </div>

                            <div class="row g-3">
                                <div class="col-md-6 grasa-corp__form-group">
                                    <label for="peso" class="grasa-corp__label">Tu peso (kg)</label>
                                    <input type="number" class="grasa-corp__input form-control" id="peso"
                                        placeholder="Introduce tu peso en kg." required step="0.1" min="1">
                                    <div class="grasa-corp__text-danger invalid-feedback" id="peso-error"></div>
                                </div>
                                <div class="col-md-6 grasa-corp__form-group">
                                    <label for="altura" class="grasa-corp__label">Tu altura (cm)</label>
                                    <input type="number" class="grasa-corp__input form-control" id="altura"
                                        placeholder="Introduce tu altura en cm." required step="1" min="50">
                                    <div class="grasa-corp__text-danger invalid-feedback" id="altura-error"></div>
                                </div>
                            </div>

                            <div class="d-grid gap-2 mt-4">
                                <button type="submit"
                                    class="grasa-corp__button btn button button--yellow">Calcular</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div id="resultado-grasa-corp" class="grasa-corp__result result-container"
                    style="opacity: 0; transition: opacity 0.5s;">
                    <h2 class="grasa-corp__result-text"> <span id="grasa-corp-valor">--</span>
                    </h2>
                </div>
            </div>
        </div>

        <div class="container text-center mt-5">
            <a href="{{ route('pages.calculadoras.index') }}" class="btn btn-outline-secondary px-4 py-2">
                <i class="fas fa-arrow-left me-2"></i> Volver a todas las calculadoras
            </a>
        </div>
    </section>

    <x-footer />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
