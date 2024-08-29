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
        // Save the selected language to localStorage
        localStorage.setItem('language', currentLang);
        // Reload the page with the new language parameter in the URL
        window.location.search = `?lang=${currentLang}`;
    });
});
