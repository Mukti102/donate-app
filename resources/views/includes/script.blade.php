{{-- flowbite --}}
<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>


<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


    <script>
        // Mobile menu toggle
        function toggleMobileMenu() {
            const mobileMenu = document.getElementById('mobile-menu');
            const menuIcon = document.getElementById('menu-icon');
            const closeIcon = document.getElementById('close-icon');
            
            mobileMenu.classList.toggle('hidden');
            menuIcon.classList.toggle('hidden');
            closeIcon.classList.toggle('hidden');
            
            // Add slide animation
            if (!mobileMenu.classList.contains('hidden')) {
                mobileMenu.style.animation = 'slideDown 0.3s ease-out';
            }
        }

        // Dark mode toggle
        function toggleDarkMode() {
            document.documentElement.classList.toggle('dark');
            
            // Save preference to localStorage (note: this won't work in Claude artifacts)
            const isDark = document.documentElement.classList.contains('dark');
            try {
                localStorage.setItem('darkMode', isDark);
            } catch (e) {
                // Fallback for environments without localStorage
                console.log('Dark mode toggled:', isDark);
            }
        }

        // Initialize dark mode from localStorage
        document.addEventListener('DOMContentLoaded', function() {
            try {
                const darkMode = localStorage.getItem('darkMode');
                if (darkMode === 'true') {
                    document.documentElement.classList.add('dark');
                }
            } catch (e) {
                // Fallback: check system preference
                if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
                    document.documentElement.classList.add('dark');
                }
            }
        });

        // Close mobile menu when clicking outside
        document.addEventListener('click', function(event) {
            const mobileMenu = document.getElementById('mobile-menu');
            const menuButton = event.target.closest('button[onclick="toggleMobileMenu()"]');
            
            if (!mobileMenu.contains(event.target) && !menuButton && !mobileMenu.classList.contains('hidden')) {
                toggleMobileMenu();
            }
        });

        // Add scroll effect to navbar
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('nav');
            if (window.scrollY > 10) {
                navbar.classList.add('shadow-xl');
            } else {
                navbar.classList.remove('shadow-xl');
            }
        });
    </script>
    <script>
    function setAmount(amount) {
        const input = document.querySelector('input[name="amount"]');
        if (input) {
            input.value = amount;
        }
    }
</script>