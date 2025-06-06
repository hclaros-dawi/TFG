const form = document.getElementById("imc-form");
const resultadoDiv = document.getElementById("resultado");
const imcValorSpan = document.getElementById("imc-valor");
const pesoInput = document.getElementById("peso");
const alturaInput = document.getElementById("altura");
const pesoError = document.getElementById("peso-error");
const alturaError = document.getElementById("altura-error");

function validarPeso() {
    let valor = pesoInput.value.trim();

    valor = valor.replace(",", ".");

    if (valor === "") {
        pesoError.textContent = "";
        pesoInput.classList.remove("is-valid", "is-invalid");
        return false;
    }

    if (/[a-zA-Z]/.test(valor)) {
        pesoError.textContent = "Solo se permiten números, no letras";
    } else if (isNaN(valor)) {
        pesoError.textContent = "Valor inválido. Ingresa un número";
    } else {
        const numero = parseFloat(valor);
        if (numero < 1 || numero > 500) {
            pesoError.textContent = "El peso debe estar entre 1 kg y 500 kg";
        } else {
            pesoError.textContent = "";
            pesoInput.classList.add("is-valid");
            pesoInput.classList.remove("is-invalid");
            return true;
        }
    }

    pesoInput.classList.add("is-invalid");
    pesoInput.classList.remove("is-valid");
    return false;
}

function validarAltura() {
    const valor = alturaInput.value.trim();

    if (valor === "") {
        alturaError.textContent = "";
        alturaInput.classList.remove("is-valid", "is-invalid");
        return;
    }

    if (/[a-zA-Z.,]/.test(valor)) {
        alturaError.textContent =
            "Solo se permiten números enteros, sin letras ni símbolos.";
    } else if (isNaN(valor)) {
        alturaError.textContent = "Valor inválido. Ingresa un número.";
    } else {
        const numero = parseInt(valor, 10);
        if (numero < 50 || numero > 300) {
            alturaError.textContent = "La altura debe estar entre 50 y 300 cm.";
        } else {
            alturaError.textContent = "";
            alturaInput.classList.add("is-valid");
            alturaInput.classList.remove("is-invalid");
            return;
        }
    }

    alturaInput.classList.add("is-invalid");
    alturaInput.classList.remove("is-valid");
}

pesoInput.addEventListener("input", validarPeso);
alturaInput.addEventListener("input", validarAltura);

form.addEventListener("submit", function (event) {
    event.preventDefault();

    validarPeso();
    validarAltura();

    const pesoValido = !pesoInput.classList.contains("is-invalid");
    const alturaValida = !alturaInput.classList.contains("is-invalid");

    if (!pesoValido || !alturaValida) return;

    const peso = parseFloat(pesoInput.value);
    const alturaCm = parseInt(alturaInput.value, 10);
    const alturaM = alturaCm / 100;
    const imc = peso / (alturaM * alturaM);
    const imcRounded = imc.toFixed(1);

    imcValorSpan.textContent = imcRounded;
    resultadoDiv.classList.remove("d-none");
    resultadoDiv.style.opacity = 1;

    const clasificacionSpan = document.getElementById("clasificacion-imc");

    let clasificacion = "";
    if (imc < 18.5) {
        clasificacion = "Inferior a lo normal";
    } else if (imc < 25) {
        clasificacion = "Normal";
    } else if (imc < 30) {
        clasificacion = "Superior a lo normal";
    } else {
        clasificacion = "Obesidad";
    }

    clasificacionSpan.textContent = `Clasificación: ${clasificacion}`;
    clasificacionSpan.classList.remove(
        "text-success",
        "text-warning",
        "text-danger",
        "text-info"
    );

    if (clasificacion === "Normal") {
        clasificacionSpan.classList.add("text-success");
    } else if (clasificacion === "Inferior a lo normal") {
        clasificacionSpan.classList.add("text-info");
    } else if (clasificacion === "Superior a lo normal") {
        clasificacionSpan.classList.add("text-warning");
    } else {
        clasificacionSpan.classList.add("text-danger");
    }
});
