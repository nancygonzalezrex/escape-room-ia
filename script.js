window.addEventListener("load", function () {
    const loader = document.getElementById("loader");

    if (loader) {
        setTimeout(() => {
            loader.style.opacity = "0";
            setTimeout(() => {
                loader.style.display = "none";
            }, 600);
        }, 1200);
    }

    iniciarParticulas();
    iniciarTemporizador();
});

function validarFormulario() {
    let respuesta = document.getElementById("respuesta").value;

    if (respuesta.trim() === "") {
        sonidoError();
        alert("⚠️ NÉMESIS detectó un intento vacío. Debes ingresar una respuesta.");
        return false;
    }

    sonidoClick();
    return true;
}

document.addEventListener("click", function (e) {
    if (e.target.tagName === "A" || e.target.tagName === "BUTTON") {
        sonidoClick();
    }
});

function sonidoClick() {
    const audio = new AudioContext();
    const oscilador = audio.createOscillator();
    const ganancia = audio.createGain();

    oscilador.type = "sine";
    oscilador.frequency.value = 620;

    ganancia.gain.setValueAtTime(0.08, audio.currentTime);
    ganancia.gain.exponentialRampToValueAtTime(0.001, audio.currentTime + 0.2);

    oscilador.connect(ganancia);
    ganancia.connect(audio.destination);

    oscilador.start();
    oscilador.stop(audio.currentTime + 0.2);
}

function sonidoError() {
    const audio = new AudioContext();
    const oscilador = audio.createOscillator();
    const ganancia = audio.createGain();

    oscilador.type = "sawtooth";
    oscilador.frequency.value = 180;

    ganancia.gain.setValueAtTime(0.1, audio.currentTime);
    ganancia.gain.exponentialRampToValueAtTime(0.001, audio.currentTime + 0.4);

    oscilador.connect(ganancia);
    ganancia.connect(audio.destination);

    oscilador.start();
    oscilador.stop(audio.currentTime + 0.4);
}

function iniciarTemporizador() {
    const temporizador = document.getElementById("temporizador");

    if (!temporizador) return;

    let tiempo = 60;

    setInterval(() => {
        tiempo--;

        temporizador.textContent = "Tiempo restante: " + tiempo;

        if (tiempo <= 10) {
            temporizador.classList.add("peligro");
        }

        if (tiempo <= 0) {
            tiempo = 60;
            alert("⚠️ NÉMESIS reinició el contador del núcleo.");
        }
    }, 1000);
}

function iniciarParticulas() {
    const contenedor = document.querySelector(".particulas");

    if (!contenedor) return;

    for (let i = 0; i < 35; i++) {
        const particula = document.createElement("span");

        particula.style.left = Math.random() * 100 + "%";
        particula.style.animationDuration = 3 + Math.random() * 6 + "s";
        particula.style.animationDelay = Math.random() * 4 + "s";

        contenedor.appendChild(particula);
    }
}