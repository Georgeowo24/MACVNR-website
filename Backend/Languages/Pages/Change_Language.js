import { loadLanguageForPage } from './Load_Languages.js';

// Event listener for when the DOM is fully loaded
document.addEventListener('DOMContentLoaded', () => {
    // Get the language button element
    const languageButton = document.getElementById('LanguageBtn');

    // Get the current language from localStorage, default to 'en' if not set
    let currentLang = localStorage.getItem('language') || 'en';
    
    // Load translations based on the body ID of the page
    const pageId = document.body.id;
    loadLanguageForPage(currentLang, pageId);

    // Event listener for when the language button is clicked
    languageButton.addEventListener('click', () => {
        currentLang = currentLang === 'en' ? 'es' : 'en';
        localStorage.setItem('language', currentLang);

        // Get all URL parameters from the current URL
        const urlParams = new URLSearchParams(window.location.search);

        // Set the new language parameter
        urlParams.set('lang', currentLang);

        // Preserve the 'id' parameter if it exists
        const id = urlParams.get('id');
        if (id) {
            urlParams.set('id', id);
        }

        // Update the URL without reloading the page
        window.history.replaceState(null, '', '?' + urlParams.toString());

        // Redirect to the same page with the new parameters
        window.location.href = window.location.pathname + '?' + urlParams.toString();
    });
});
