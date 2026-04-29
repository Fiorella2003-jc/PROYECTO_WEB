document.addEventListener("DOMContentLoaded", () => {
    
    // 1. BARRA DE PROGRESO
    const barra = document.getElementById("barra-progreso");
    window.addEventListener("scroll", () => {
        if (barra) {
            const alturaTotal = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            const progreso = (window.scrollY / alturaTotal) * 100;
            barra.style.width = progreso + "%";
        }
    });

    // 2. BOTÓN IR ARRIBA
    const btnTop = document.getElementById("btnTop");
    if (btnTop) {
        window.addEventListener("scroll", () => {
            // Aparece solo después de bajar 300px
            btnTop.style.display = window.scrollY > 300 ? "block" : "none";
        });

        btnTop.addEventListener("click", () => {
            window.scrollTo({ top: 0, behavior: "smooth" });
        });
    }

    // 3. NAVBAR QUE CAMBIA DE COLOR
    const navbar = document.querySelector(".navbar");
    if (navbar) {
        window.addEventListener("scroll", () => {
            if (window.scrollY > 50) {
                navbar.classList.add("navbar-scrolled");
            } else {
                navbar.classList.remove("navbar-scrolled");
            }
        });
    }
});