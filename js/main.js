document.addEventListener("DOMContentLoaded", () => {
    const animatedElements = document.querySelectorAll("[data-animate]");
    // Initially hide all animated elements
    animatedElements.forEach(el => el.classList.add("hidden"));

    // Create Intersection Observer
    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    // Add visible class when the element is in the viewport
                    entry.target.classList.add("visible");
                    entry.target.classList.remove("hidden");
                } else {
                    // Add hidden class when the element is out of the viewport
                    entry.target.classList.add("hidden");
                    entry.target.classList.remove("visible");
                }
            });
        },
        {
            threshold: 0.2, // Trigger when 20% of the element is visible
        }
    );

    // Observe all elements with `data-animate`
    animatedElements.forEach(el => observer.observe(el));
});

// Mobile menu toggle
const menuButton = document.querySelector('.menu-button');
const navLinks = document.querySelector('.nav-links');

menuButton.addEventListener('click', () => {
    navLinks.classList.toggle('active');
});

// Smooth scroll for navigation links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth'
            });
            // Close mobile menu if open
            navLinks.classList.remove('active');
        }
    });
});
function hide() {
    document.getElementById("msg").style.display = "none";
}

// Navbar scroll effect