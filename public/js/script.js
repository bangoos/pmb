document.addEventListener("DOMContentLoaded", function () {
  const slides = document.querySelectorAll(".hero-slide");
  let currentSlide = 0;
  const slideInterval = 5000;

  function nextSlide() {
    slides[currentSlide].classList.remove("active");
    currentSlide = (currentSlide + 1) % slides.length;
    slides[currentSlide].classList.add("active");
  }

  setInterval(nextSlide, slideInterval);

  // Dropdown menu functionality
  const dropdowns = document.querySelectorAll(".dropdown");

  dropdowns.forEach((dropdown) => {
    const toggle = dropdown.querySelector(".dropdown-toggle");
    const menu = dropdown.querySelector(".dropdown-menu");

    // Handle click for mobile
    toggle.addEventListener("click", function (e) {
      e.preventDefault();

      // Close other dropdowns
      dropdowns.forEach((otherDropdown) => {
        if (otherDropdown !== dropdown) {
          otherDropdown.querySelector(".dropdown-menu").style.display = "none";
        }
      });

      // Toggle current dropdown
      if (menu.style.display === "block") {
        menu.style.display = "none";
      } else {
        menu.style.display = "block";
        menu.style.opacity = "1";
        menu.style.visibility = "visible";
        menu.style.transform = "translateY(0)";
      }
    });

    // Handle hover for desktop
    dropdown.addEventListener("mouseenter", function () {
      if (window.innerWidth > 768) {
        menu.style.display = "block";
        menu.style.opacity = "1";
        menu.style.visibility = "visible";
        menu.style.transform = "translateY(0)";
      }
    });

    dropdown.addEventListener("mouseleave", function () {
      if (window.innerWidth > 768) {
        menu.style.display = "none";
        menu.style.opacity = "0";
        menu.style.visibility = "hidden";
        menu.style.transform = "translateY(-10px)";
      }
    });
  });

  // Close dropdowns when clicking outside
  document.addEventListener("click", function (e) {
    if (!e.target.closest(".dropdown")) {
      dropdowns.forEach((dropdown) => {
        const menu = dropdown.querySelector(".dropdown-menu");
        menu.style.display = "none";
        menu.style.opacity = "0";
        menu.style.visibility = "hidden";
        menu.style.transform = "translateY(-10px)";
      });
    }
  });

  // Handle responsive navigation
  function handleResponsiveNav() {
    const nav = document.querySelector("nav ul");
    const isMobile = window.innerWidth <= 768;

    if (isMobile) {
      nav.style.flexDirection = "column";
      nav.style.gap = "10px";

      // Adjust dropdown for mobile
      dropdowns.forEach((dropdown) => {
        const menu = dropdown.querySelector(".dropdown-menu");
        menu.style.position = "static";
        menu.style.opacity = "1";
        menu.style.visibility = "visible";
        menu.style.transform = "none";
        menu.style.boxShadow = "none";
        menu.style.display = "none";
      });
    } else {
      nav.style.flexDirection = "row";
      nav.style.gap = "20px";

      // Reset dropdown for desktop
      dropdowns.forEach((dropdown) => {
        const menu = dropdown.querySelector(".dropdown-menu");
        menu.style.position = "absolute";
        menu.style.display = "";
      });
    }
  }

  // Initial check and resize listener
  handleResponsiveNav();
  window.addEventListener("resize", handleResponsiveNav);
});
