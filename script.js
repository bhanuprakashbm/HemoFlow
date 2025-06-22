// Handle mobile menu toggle
document.addEventListener('DOMContentLoaded', function() {
	const navbarToggler = document.querySelector('.navbar-toggler');
	const navList = document.querySelector('.nav-list');

	if (navbarToggler && navList) {
		navbarToggler.addEventListener('click', function() {
			navList.classList.toggle('show');
		});
	}

	// Close mobile menu when clicking outside
	document.addEventListener('click', function(event) {
		if (!event.target.closest('.main-nav') && navList.classList.contains('show')) {
			navList.classList.remove('show');
		}
	});

	// Handle font size controls
	const fontControls = document.querySelectorAll('.font-control-btn');
	fontControls.forEach(button => {
		button.addEventListener('click', function() {
			const size = this.textContent;
			const body = document.body;
			
			if (size === 'A+') {
				body.style.fontSize = '18px';
			} else if (size === 'A-') {
				body.style.fontSize = '14px';
			} else {
				body.style.fontSize = '16px';
			}

			// Store the preference
			localStorage.setItem('preferred-font-size', body.style.fontSize);
		});
	});

	// Apply stored font size preference
	const storedFontSize = localStorage.getItem('preferred-font-size');
	if (storedFontSize) {
		document.body.style.fontSize = storedFontSize;
	}

	// Handle active navigation state
	const currentPage = window.location.pathname.split('/').pop() || 'index.php';
	const navLinks = document.querySelectorAll('.nav-link');
	
	navLinks.forEach(link => {
		const href = link.getAttribute('href');
		if (href === currentPage) {
			link.classList.add('active');
		}
	});
});

// Handle scroll behavior
let lastScrollTop = 0;
const mainNav = document.querySelector('.main-nav');
const topHeader = document.querySelector('.top-header');

window.addEventListener('scroll', function() {
	const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
	
	if (scrollTop > lastScrollTop && scrollTop > 200) {
		// Scrolling down & past header
		mainNav.style.transform = 'translateY(-100%)';
		topHeader.style.transform = 'translateY(-100%)';
	} else {
		// Scrolling up or at top
		mainNav.style.transform = 'translateY(0)';
		topHeader.style.transform = 'translateY(0)';
	}
	
	lastScrollTop = scrollTop;
});

// Mobile Menu Toggle
document.addEventListener('DOMContentLoaded', function() {
	const menuToggle = document.querySelector('.menu-toggle');
	const navList = document.querySelector('.home-nav-list');

	if (menuToggle && navList) {
		menuToggle.addEventListener('click', function() {
			navList.classList.toggle('show');
			menuToggle.querySelector('i').classList.toggle('fa-bars');
			menuToggle.querySelector('i').classList.toggle('fa-times');
		});
	}
});

// Font Size Controls
document.addEventListener('DOMContentLoaded', function() {
	const fontControls = document.querySelectorAll('.font-control-btn');
	const root = document.documentElement;
	const defaultFontSize = 16; // Base font size in pixels

	fontControls.forEach(button => {
		button.addEventListener('click', function() {
			const currentSize = parseInt(getComputedStyle(root).fontSize);
			
			if (this.textContent === 'A+') {
				root.style.fontSize = `${currentSize + 2}px`;
			} else if (this.textContent === 'A-') {
				root.style.fontSize = `${currentSize - 2}px`;
			} else {
				root.style.fontSize = `${defaultFontSize}px`;
			}
		});
	});
});