/**
 * Main JavaScript for Portfolio Website
 * Uses jQuery for animations and interactions
 */

// Wait for DOM and jQuery to be ready
(function() {
    function init() {        
        // === SMOOTH SCROLL ===
        initSmoothScroll();
        
        // === NAVBAR SCROLL EFFECT ===
        initNavbarScroll();
        
        // === MOBILE MENU ===
        initMobileMenu();
        
        // === SCROLL ANIMATIONS (includes typing animation) ===
        initScrollAnimations();
        
        // === ACTIVE NAV LINK ===
        initActiveNavLink();
        
        // === PROJECTS SCROLL ===
        initProjectsScroll();
        
        // === PROJECTS FILTER ===
        initProjectsFilter();
    }

    // === TYPING ANIMATION ===
    function initTypingAnimation() {
        var typingText = document.querySelector(".typing-text");
        var cursor = document.querySelector(".cursor");
        
        if (!typingText) {
            // Retry after a short delay if element not found
            setTimeout(initTypingAnimation, 200);
            return;
        }
        
        var text = "Sr. Software Engineer | Full Stack Developer";
        var index = 0;
        
        function type() {
            if (index < text.length) {
                typingText.textContent = text.substring(0, index + 1);
                index++;
                setTimeout(type, 80);
            }
        }
        
        setTimeout(function() {
            type();
            if (cursor) cursor.style.opacity = "1";
        }, 600);
    }

    // === SMOOTH SCROLL ===
    function initSmoothScroll() {
        document.querySelectorAll('a[href^="#"]').forEach(function(anchor) {
            anchor.addEventListener("click", function(e) {
                e.preventDefault();
                var target = this.getAttribute("href");
                
                if (target === "#") return;
                
                var targetEl = document.querySelector(target);
                
                if (targetEl) {
                    var headerOffset = 70;
                    var elementPosition = targetEl.getBoundingClientRect().top;
                    var offsetPosition = elementPosition + window.pageYOffset - headerOffset;
    
                    window.scrollTo({
                        top: offsetPosition,
                        behavior: "smooth"
                    });
                    
                    // Close mobile menu if open
                    document.querySelector(".nav-menu").classList.remove("active");
                    document.querySelector(".hamburger").classList.remove("active");
                }
            });
        });
    }

    // === NAVBAR SCROLL EFFECT ===
    function initNavbarScroll() {
        window.addEventListener("scroll", function() {
            var navbar = document.getElementById("navbar");
            if (window.scrollY > 100) {
                navbar.classList.add("scrolled");
            } else {
                navbar.classList.remove("scrolled");
            }
        });
    }

    // === MOBILE MENU ===
    function initMobileMenu() {
        var hamburger = document.querySelector(".hamburger");
        var navMenu = document.querySelector(".nav-menu");
        
        if (!hamburger || !navMenu) return;
        
        hamburger.addEventListener("click", function() {
            hamburger.classList.toggle("active");
            navMenu.classList.toggle("active");
        });
        
        document.querySelectorAll(".nav-menu a").forEach(function(link) {
            link.addEventListener("click", function() {
                hamburger.classList.remove("active");
                navMenu.classList.remove("active");
            });
        });
    }

    // === SCROLL ANIMATIONS (Intersection Observer) ===
    function initScrollAnimations() {
        var sections = document.querySelectorAll(".section");
        
        if (!sections.length) return;
        
        // Make first section (hero) visible immediately
        var firstSection = sections[0];
        if (firstSection) {
            firstSection.classList.add("visible");
            // Also make hero content visible
            var heroContent = firstSection.querySelector(".hero-content");
            if (heroContent) heroContent.classList.add("visible");
            
            // Trigger typing animation after hero is visible
            setTimeout(initTypingAnimation, 300);
        }
        
        var observerOptions = {
            root: null,
            rootMargin: "0px",
            threshold: 0.1
        };
        
        var observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add("visible");
                    
                    // Animate timeline items in experience section
                    if (entry.target.id === "experience") {
                        var timelineItems = entry.target.querySelectorAll(".timeline-item");
                        timelineItems.forEach(function(item, index) {
                            setTimeout(function() {
                                item.classList.add("visible");
                            }, index * 150);
                        });
                    }
                }
            });
        }, observerOptions);
        
        sections.forEach(function(section) {
            observer.observe(section);
        });
        
        // Fallback: Show all sections after 2 seconds if not visible
        setTimeout(function() {
            sections.forEach(function(section) {
                if (!section.classList.contains("visible")) {
                    section.classList.add("visible");
                }
            });
            
            // Fallback: Show timeline items after 2.5 seconds
            var timelineItems = document.querySelectorAll(".timeline-item");
            timelineItems.forEach(function(item, index) {
                setTimeout(function() {
                    item.classList.add("visible");
                }, index * 100);
            });
        }, 2000);
    }

    // === ACTIVE NAV LINK ON SCROLL ===
    function initActiveNavLink() {
        var navLinks = document.querySelectorAll(".nav-menu a");
        var sections = document.querySelectorAll("section");
        
        if (!navLinks.length || !sections.length) return;
        
        window.addEventListener("scroll", function() {
            var scrollPos = window.scrollY + 150;
            
            sections.forEach(function(section) {
                var sectionTop = section.offsetTop;
                var sectionHeight = section.offsetHeight;
                var sectionId = section.getAttribute("id");
                
                if (scrollPos >= sectionTop && scrollPos < sectionTop + sectionHeight) {
                    navLinks.forEach(function(link) {
                        link.classList.remove("active");
                    });
                    var activeLink = document.querySelector('.nav-menu a[href="#' + sectionId + '"]');
                    if (activeLink) activeLink.classList.add("active");
                }
            });
        });
    }

    // === PROJECTS SCROLL ===
    function initProjectsScroll() {
        var scrollContainer = document.getElementById("projectsScroll");
        var prevBtn = document.getElementById("projectsPrev");
        var nextBtn = document.getElementById("projectsNext");
        var scrollAmount = 340;
        
        if (!scrollContainer || !prevBtn || !nextBtn) return;
        
        nextBtn.addEventListener("click", function() {
            scrollContainer.scrollBy({
                left: scrollAmount,
                behavior: "smooth"
            });
        });
        
        prevBtn.addEventListener("click", function() {
            scrollContainer.scrollBy({
                left: -scrollAmount,
                behavior: "smooth"
            });
        });
        
        scrollContainer.addEventListener("scroll", function() {
            var maxScroll = scrollContainer.scrollWidth - scrollContainer.clientWidth;
            var currentScroll = scrollContainer.scrollLeft;
            
            prevBtn.disabled = currentScroll <= 0;
            nextBtn.disabled = currentScroll >= maxScroll - 10;
        });
        
        scrollContainer.dispatchEvent(new Event("scroll"));
    }

    // === PROJECTS FILTER ===
    function initProjectsFilter() {
        var tabs = document.querySelectorAll(".project-tab");
        var cards = document.querySelectorAll(".project-card");
        
        if (!tabs.length || !cards.length) return;
        
        tabs.forEach(function(tab) {
            tab.addEventListener("click", function() {
                var category = this.getAttribute("data-category");
                
                tabs.forEach(function(t) {
                    t.classList.remove("active");
                });
                this.classList.add("active");
                
                cards.forEach(function(card) {
                    var cardCategory = card.getAttribute("data-category");
                    
                    if (category === "all" || cardCategory === category) {
                        card.style.display = "flex";
                        setTimeout(function() {
                            card.style.opacity = "1";
                            card.style.transform = "scale(1)";
                        }, 10);
                    } else {
                        card.style.opacity = "0";
                        card.style.transform = "scale(0.8)";
                        setTimeout(function() {
                            card.style.display = "none";
                        }, 300);
                    }
                });
            });
        });
    }

    // Initialize when DOM is ready
    if (document.readyState === "loading") {
        document.addEventListener("DOMContentLoaded", init);
    } else {
        init();
    }
})();

// === END ===