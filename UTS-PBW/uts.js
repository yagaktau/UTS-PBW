// JavaScript for Animations and Interactivity

document.addEventListener("DOMContentLoaded", () => {
    // Smooth Scroll for Navigation Links
    const navLinks = document.querySelectorAll("nav ul li a");

    navLinks.forEach(link => {
        link.addEventListener("click", (e) => {
            e.preventDefault();
            const targetId = link.getAttribute("href").substring(1);
            const targetSection = document.getElementById(targetId);

            if (targetSection) {
                window.scrollTo({
                    top: targetSection.offsetTop,
                    behavior: "smooth"
                });
            }
        });
    });

    // Simple Form Validation
    const contactForm = document.querySelector("form");

    contactForm.addEventListener("submit", (e) => {
        const name = document.getElementById("name").value.trim();
        const email = document.getElementById("email").value.trim();
        const message = document.getElementById("message").value.trim();

        if (!name || !email || !message) {
            alert("Semua field harus diisi sebelum mengirim!");
            e.preventDefault();
        } else if (!validateEmail(email)) {
            alert("Alamat email tidak valid!");
            e.preventDefault();
        }
    });

    // Email Validation Function
    function validateEmail(email) {
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailPattern.test(email);
    }
});
