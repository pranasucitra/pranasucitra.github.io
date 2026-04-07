/**
 * Main JavaScript for Portfolio Website
 * Uses jQuery for animations and interactions
 */

// === document.ready ===
$(document).ready(function() {
    
    // === TYPING ANIMATION ===
    initTypingAnimation();
    
    // === SMOOTH SCROLL ===
    initSmoothScroll();
    
    // === NAVBAR SCROLL EFFECT ===
    initNavbarScroll();
    
    // === MOBILE MENU ===
    initMobileMenu();
    
    // === SCROLL ANIMATIONS ===
    initScrollAnimations();
    
    // === ACTIVE NAV LINK ===
    initActiveNavLink();
    
    // === PROJECTS SCROLL ===
    initProjectsScroll();
    
});

// === TYPING ANIMATION ===
function initTypingAnimation() {
    const text = "Sr. Software Engineer | Full Stack Developer";
    const $typingText = $(".typing-text");
    let index = 0;
    
    function type() {
        if (index < text.length) {
            $typingText.append(text.charAt(index));
            index++;
            setTimeout(type, 100);
        }
    }
    
    setTimeout(type, 1000);
}

// === SMOOTH SCROLL ===
function initSmoothScroll() {
    $('a[href^="#"]').on("click", function(e) {
        e.preventDefault();
        const target = $(this).attr("href");
        
        if (target === "#") return;
        
        const $target = $(target);
        
        if ($target.length) {
            $("html, body").animate({
                scrollTop: $target.offset().top - 70
            }, 800, "easeInOutCubic");
            
            // Close mobile menu if open
            $(".nav-menu").removeClass("active");
            $(".hamburger").removeClass("active");
        }
    });
}

// === NAVBAR SCROLL EFFECT ===
function initNavbarScroll() {
    $(window).on("scroll", function() {
        if ($(this).scrollTop() > 100) {
            $("#navbar").addClass("scrolled");
        } else {
            $("#navbar").removeClass("scrolled");
        }
    });
}

// === MOBILE MENU ===
function initMobileMenu() {
    $(".hamburger").on("click", function() {
        $(this).toggleClass("active");
        $(".nav-menu").toggleClass("active");
    });
    
    $(".nav-menu a").on("click", function() {
        $(".hamburger").removeClass("active");
        $(".nav-menu").removeClass("active");
    });
}

// === SCROLL ANIMATIONS (Intersection Observer) ===
function initScrollAnimations() {
    const $sections = $(".section");
    
    const observerOptions = {
        root: null,
        rootMargin: "0px",
        threshold: 0.1
    };
    
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
            if (entry.isIntersecting) {
                $(entry.target).addClass("visible");
            }
        });
    }, observerOptions);
    
    $sections.each(function() {
        observer.observe(this);
    });
    
    // Also animate hero elements on load
    $(".hero-content").addClass("visible");
}

// === ACTIVE NAV LINK ON SCROLL ===
function initActiveNavLink() {
    const $navLinks = $(".nav-menu a");
    const $sections = $("section");
    
    $(window).on("scroll", function() {
        let scrollPos = $(this).scrollTop() + 150;
        
        $sections.each(function() {
            const $section = $(this);
            const sectionTop = $section.offset().top;
            const sectionHeight = $section.outerHeight();
            const sectionId = $section.attr("id");
            
            if (scrollPos >= sectionTop && scrollPos < sectionTop + sectionHeight) {
                $navLinks.removeClass("active");
                $('.nav-menu a[href="#' + sectionId + '"]').addClass("active");
            }
        });
    });
}

// === EASE FUNCTION ===
$.easing.easeInOutCubic = function(x, t, b, c, d) {
    if ((t /= d / 2) < 1) return c / 2 * t * t * t + b;
    return c / 2 * ((t -= 2) * t * t + 2) + b;
};

// === PROJECTS SCROLL ===
function initProjectsScroll() {
    const $scrollContainer = $('#projectsScroll');
    const $prevBtn = $('#projectsPrev');
    const $nextBtn = $('#projectsNext');
    const scrollAmount = 340;
    
    $nextBtn.on('click', function() {
        $scrollContainer.animate({
            scrollLeft: '+=' + scrollAmount
        }, 400, 'easeInOutCubic');
    });
    
    $prevBtn.on('click', function() {
        $scrollContainer.animate({
            scrollLeft: '-=' + scrollAmount
        }, 400, 'easeInOutCubic');
    });
    
    $scrollContainer.on('scroll', function() {
        const maxScroll = this.scrollWidth - this.clientWidth;
        const currentScroll = $(this).scrollLeft();
        
        $prevBtn.prop('disabled', currentScroll <= 0);
        $nextBtn.prop('disabled', currentScroll >= maxScroll - 10);
    });
    
    $scrollContainer.trigger('scroll');
}

// === END ===