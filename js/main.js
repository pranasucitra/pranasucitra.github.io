/**
 * Main JavaScript for Portfolio Website
 * Uses jQuery for animations and interactions
 */

// Wait for DOM and jQuery to be ready
(function() {
    function init() {        
        // === WOW.js ===
        if (typeof WOW !== 'undefined') {
            new WOW({
                boxClass: 'wow',
                animateClass: 'animate__animated',
                offset: 100,
                mobile: true,
                live: true
            }).init();
        }
        
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
        
        // === LOAD PROJECTS FROM JSON ===
        loadProjects().then(function() {
            // === PROJECTS FILTER ===
            initProjectsFilter();
            
            // === PROJECT MODAL ===
            initProjectModal();
        });
        
        // === LOAD SKILLS FROM JSON ===
        loadSkills();
        
        // === LOAD EXPERIENCE FROM JSON ===
        loadExperience();
        
        // === GO TO TOP BUTTON ===
        initGoToTop();
        
        // === NAME REVEAL ANIMATION ===
        initNameReveal();
        
        // === TIMELINE TOGGLE ===
        initTimelineToggle();
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

    // === NAME REVEAL ANIMATION ===
    function initNameReveal() {
        var nameWrapper = document.querySelector(".name-wrapper");
        if (!nameWrapper) return;
        
        var name = nameWrapper.getAttribute("data-name");
        var timer = 30;
        var letters = name.split("");
        
        nameWrapper.innerHTML = "";
        
        letters.forEach(function(char) {
            var span = document.createElement("span");
            if (char === " ") {
                span.className = "space";
                span.textContent = " ";
            } else {
                span.className = "nbr ltr";
                span.setAttribute("data-letter", char);
                span.textContent = Math.floor(Math.random() * 10);
            }
            nameWrapper.appendChild(span);
        });
        
        var nbrs = document.querySelectorAll(".nbr");
        var change = 0;
        var data = 0;
        var interval = setInterval(function() {
            var randomNbr = Math.floor(Math.random() * nbrs.length);
            var el = nbrs[randomNbr];
            
            if (!el.classList.contains("revealed")) {
                el.textContent = Math.floor(Math.random() * 10);
                change++;
                
                if (change > 15) {
                    var char = el.getAttribute("data-letter");
                    el.textContent = char;
                    el.classList.remove("nbr");
                    el.classList.add("revealed");
                    data++;
                    
                    if (data === letters.length) {
                        clearInterval(interval);
                    }
                }
            }
        }, timer);
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
            
            // Make hero name visible
            var heroName = firstSection.querySelector(".hero-name");
            if (heroName) heroName.classList.add("visible");
            
            // Trigger name reveal and typing animation after hero is visible
            setTimeout(function() {
                initNameReveal();
                initTypingAnimation();
            }, 300);
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
        
        var categoryMap = {
            "mobile": ["android", "ios", "flutter"],
            "web": ["web", "php", "javascript", "mysql"],
            "pwa": ["pwa"],
            "iot": ["gps", "tcp/ip", "traccar"],
            "arvr": ["ar", "vr", "unity", "webgl"]
        };
        
        tabs.forEach(function(tab) {
            tab.addEventListener("click", function() {
                var category = this.getAttribute("data-category");
                
                tabs.forEach(function(t) {
                    t.classList.remove("active");
                });
                this.classList.add("active");
                
                cards.forEach(function(card) {
                    var cardTags = card.getAttribute("data-tags") || "";
                    var tagsArray = cardTags.split(",").map(function(t) { return t.trim().toLowerCase(); });
                    
                    var isMatch = false;
                    if (category === "all") {
                        isMatch = true;
                    } else if (categoryMap[category]) {
                        isMatch = categoryMap[category].some(function(c) { 
                            return tagsArray.includes(c); 
                        });
                    }
                    
                    if (isMatch) {
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

    // === LOAD PROJECTS FROM JSON ===
    function loadProjects() {
        return new Promise(function(resolve, reject) {
            var container = document.getElementById("projectsScroll");
            var jsonPath = container.getAttribute("data-json");
            
            if (!jsonPath) {
                resolve();
                return;
            }
            
            fetch(jsonPath)
                .then(function(response) {
                    return response.json();
                })
                .then(function(data) {
                    renderProjects(data.projects);
                    resolve();
                })
                .catch(function(error) {
                    console.error("Error loading projects:", error);
                    resolve();
                });
        });
    }

    function renderProjects(projects) {
        var container = document.getElementById("projectsScroll");
        container.innerHTML = "";
        
        projects.forEach(function(project, index) {
            var card = document.createElement("div");
            card.className = "project-card wow animate__fadeInUp";
            card.setAttribute("data-wow-delay", (index * 0.1) + "s");
            card.setAttribute("data-category", project.category);
            card.setAttribute("data-title", project.title);
            card.setAttribute("data-description", project.description);
            card.setAttribute("data-image", project.image);
            card.setAttribute("data-tags", project.tags.join(", "));
            card.setAttribute("data-link", project.link || "");
            
            var tagsHTML = project.tags.map(function(tag) {
                return '<span class="tag">' + tag + '</span>';
            }).join("");
            
            var number = (index + 1).toString().padStart(2, "0");
            
            card.innerHTML = 
                '<div class="project-image">' +
                    '<img src="' + project.image + '" alt="' + project.title + '">' +
                '</div>' +
                '<span class="project-number">' + number + '</span>' +
                '<div class="project-content">' +
                    '<h3>' + project.title + '</h3>' +
                    '<p>' + project.shortDescription + '</p>' +
                    '<div class="project-tags">' + tagsHTML + '</div>' +
                '</div>';
            
            container.appendChild(card);
        });
        
        if (typeof WOW !== "undefined") {
            new WOW({
                boxClass: "wow",
                animateClass: "animate__animated",
                offset: 100,
                mobile: true,
                live: true
            }).init();
        }
    }

    // === LOAD SKILLS FROM JSON ===
    function loadSkills() {
        return new Promise(function(resolve, reject) {
            var container = document.getElementById("skillsGrid");
            var jsonPath = container.getAttribute("data-json");
            
            if (!jsonPath) {
                resolve();
                return;
            }
            
            fetch(jsonPath)
                .then(function(response) {
                    return response.json();
                })
                .then(function(data) {
                    renderSkills(data.categories);
                    resolve();
                })
                .catch(function(error) {
                    console.error("Error loading skills:", error);
                    resolve();
                });
        });
    }

    function renderSkills(categories) {
        var container = document.getElementById("skillsGrid");
        container.innerHTML = "";
        
        categories.forEach(function(category) {
            var card = document.createElement("div");
            card.className = "skill-card";
            
            var skillsHTML = category.skills.map(function(skill) {
                return '<span class="tag">' + skill + '</span>';
            }).join("");
            
            card.innerHTML = 
                '<h3>' + 
                    (category.icon ? '<i class="' + category.icon + '"></i> ' : '') + 
                    category.name + 
                '</h3>' +
                '<div class="skill-tags">' + skillsHTML + '</div>';
            
            container.appendChild(card);
        });
    }

    // === LOAD EXPERIENCE FROM JSON ===
    function loadExperience() {
        return new Promise(function(resolve, reject) {
            var container = document.getElementById("experienceTimeline");
            var jsonPath = container.getAttribute("data-json");
            
            if (!jsonPath) {
                resolve();
                return;
            }
            
            fetch(jsonPath)
                .then(function(response) {
                    return response.json();
                })
                .then(function(data) {
                    renderExperience(data.experiences);
                    resolve();
                })
                .catch(function(error) {
                    console.error("Error loading experience:", error);
                    resolve();
                });
        });
    }

    function renderExperience(experiences) {
        var container = document.getElementById("experienceTimeline");
        container.innerHTML = "";
        
        experiences.forEach(function(exp, index) {
            var positionsHTML = "";
            
            exp.positions.forEach(function(pos, posIndex) {
                var hasMultiple = exp.positions.length > 1;
                
                positionsHTML += 
                    '<div class="exp-position ' + (hasMultiple ? 'multi' : '') + '">' +
                        '<div class="exp-role">' +
                            '<h4>' + pos.title + '</h4>' +
                            '<span class="exp-type">' + pos.employmentType + '</span>' +
                        '</div>' +
                        '<div class="exp-meta">' +
                            '<span class="exp-period">' + pos.period + ' • ' + pos.duration + '</span>' +
                            '<span class="exp-location-inline"> </span>' +
                            // '<span class="exp-location-inline"> • ' + exp.location + ' • ' + exp.type + '</span>' +
                        '</div>' +
                        '<p class="exp-description">' + pos.description + '</p>' +
                    '</div>';
            });
            
            var item = document.createElement("div");
            item.className = "exp-company wow animate__fadeInUp";
            item.setAttribute("data-wow-delay", ((index + 1) * 0.1) + "s");
            
            item.innerHTML = 
                '<div class="exp-company-header">' +
                    '<div class="exp-company-icon">' +
                        '<i class="' + exp.companyIcon + '"></i>' +
                    '</div>' +
                    '<div class="exp-company-info">' +
                        '<h3>' + exp.company + '</h3>' +
                        '<span class="exp-location">' + exp.location + ' • ' + exp.type + '</span>' +
                    '</div>' +
                '</div>' +
                '<div class="exp-positions">' + positionsHTML + '</div>';
            
            container.appendChild(item);
        });
        
        initExperienceCollapsible();
        
        if (typeof WOW !== "undefined") {
            new WOW({
                boxClass: "wow",
                animateClass: "animate__animated",
                offset: 100,
                mobile: true,
                live: true
            }).init();
        }
    }
    
    function initExperienceCollapsible() {
        var descriptions = document.querySelectorAll('.exp-description');
        descriptions.forEach(function(desc) {
            var text = desc.textContent;
            var fullText = text;
            var isLong = text.length > 200;
            
            if (isLong) {
                var truncated = text.substring(0, 200) + '...';
                desc.innerHTML = truncated;
                desc.dataset.full = fullText;
                desc.dataset.truncated = truncated;
                
                var btn = document.createElement('button');
                btn.className = 'exp-toggle-btn';
                btn.textContent = 'See more';
                btn.style.cssText = 'background:none;border:none;color:var(--accent);cursor:pointer;font-size:0.85rem;padding:0;margin-top:4px;';
                
                btn.addEventListener('click', function() {
                    var isExpanded = desc.dataset.expanded === 'true';
                    desc.innerHTML = isExpanded ? desc.dataset.truncated : desc.dataset.full;
                    desc.dataset.expanded = isExpanded ? 'false' : 'true';
                    btn.textContent = isExpanded ? 'See more' : 'Show less';
                });
                
                desc.parentNode.insertBefore(btn, desc.nextSibling);
            }
        });
    }

    // === PROJECT MODAL ===
    function initProjectModal() {
        var modal = document.getElementById("projectModal");
        if (!modal) return;
        
        var closeBtn = modal.querySelector(".project-modal-close");
        var cards = document.querySelectorAll(".project-card");
        
        cards.forEach(function(card) {
            card.style.cursor = "pointer";
            card.addEventListener("click", function() {
                var title = card.getAttribute("data-title") || card.querySelector("h3").textContent;
                var description = card.getAttribute("data-description") || card.querySelector("p").textContent;
                var image = card.getAttribute("data-image") || card.querySelector("img").src;
                var tags = card.getAttribute("data-tags") || "";
                var link = card.getAttribute("data-link") || "";
                var category = card.getAttribute("data-category") || "";
                
                modal.querySelector(".project-modal-title").textContent = title;
                var descWithBreaks = description.replace(/\\n/g, "<br>");
                modal.querySelector(".project-modal-description").innerHTML = descWithBreaks;
                modal.querySelector(".project-modal-image img").src = image;
                modal.querySelector(".project-modal-category").textContent = category.toUpperCase();
                
                var tagsContainer = modal.querySelector(".project-modal-tags");
                tagsContainer.innerHTML = "";
                if (tags) {
                    tags.split(",").forEach(function(tag) {
                        var span = document.createElement("span");
                        span.className = "tag";
                        span.textContent = tag.trim();
                        tagsContainer.appendChild(span);
                    });
                }
                
                var linksContainer = modal.querySelector(".project-modal-links");
                linksContainer.innerHTML = "";
                if (link) {
                    var btn = document.createElement("a");
                    btn.href = link;
                    btn.className = "btn btn-primary";
                    btn.target = "_blank";
                    btn.innerHTML = '<i class="ri-external-link-line"></i> View Project';
                    linksContainer.appendChild(btn);
                }
                
                modal.classList.add("active");
                document.body.style.overflow = "hidden";
            });
        });
        
        closeBtn.addEventListener("click", function() {
            modal.classList.remove("active");
            document.body.style.overflow = "";
        });
        
        modal.addEventListener("click", function(e) {
            if (e.target === modal) {
                modal.classList.remove("active");
                document.body.style.overflow = "";
            }
        });
        
        document.addEventListener("keydown", function(e) {
            if (e.key === "Escape" && modal.classList.contains("active")) {
                modal.classList.remove("active");
                document.body.style.overflow = "";
            }
        });
    }

    // === TIMELINE TOGGLE ===
    function initTimelineToggle() {
        document.addEventListener("click", function(e) {
            if (e.target.classList.contains("timeline-toggle")) {
                var timelineItem = e.target.closest(".timeline-item");
                var isVisible = timelineItem.classList.contains("visible") || timelineItem.classList.contains("animated");
                if (!isVisible) return;
                
                var isExpanded = timelineItem.classList.contains("expanded");
                
                document.querySelectorAll(".timeline-item.expanded").forEach(function(item) {
                    item.classList.remove("expanded");
                    item.querySelector(".timeline-toggle").textContent = "Show more";
                });
                
                if (!isExpanded) {
                    timelineItem.classList.add("expanded");
                    e.target.textContent = "Show less";
                } else {
                    timelineItem.classList.remove("expanded");
                    e.target.textContent = "Show more";
                }
            }
        });
    }

    // === GO TO TOP BUTTON ===
    function initGoToTop() {
        var goToTopBtn = document.getElementById("goToTop");
        
        if (!goToTopBtn) return;
        
        window.addEventListener("scroll", function() {
            if (window.scrollY > 100) {
                goToTopBtn.classList.add("visible");
            } else {
                goToTopBtn.classList.remove("visible");
            }
        });
        
        goToTopBtn.addEventListener("click", function() {
            window.scrollTo({
                top: 0,
                behavior: "smooth"
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