import { applyHeaderTranslations } from './Header.js';
import { applyFooterTranslations } from './Footer.js';

import { applyIndexTranslations } from './Index.js';
import { applyMembersTranslations } from './Members.js';
import { applyDashboardTranslations } from './Dashboard.js';
import { applyEventsTranslations } from './Events.js';
import { applyLoginTranslations } from './Login.js';
import { applyGoverningBoardTranslations } from './Governing_Board.js';

// Function to load language translations for the specific page
export function loadLanguageForPage(lang, pageId) {
    // Set the document language attribute
    document.documentElement.lang = lang;
    
    // Fetch the appropriate translation file based on the selected language
    fetch(`./Resources/Languages/JSON/${lang === 'es' ? 'Esp.json' : 'Eng.json'}`)
        .then(response => response.json())
        .then(translations => {
            // Apply header translations
            applyHeaderTranslations(translations);

            // Apply translations based on the page ID
            switch (pageId) {
                case 'Index':
                    applyIndexTranslations(translations);
                    break;
                case 'Members':
                    applyMembersTranslations(translations);
                    break;
                case 'Dashboard':
                    applyDashboardTranslations(translations);
                    break;
                case 'Events':
                    applyEventsTranslations(translations);
                    break;
                case 'Login':
                    applyLoginTranslations(translations);
                    break;
                case 'Management_Board':
                    applyGoverningBoardTranslations(translations);
                    break;
                
                default:        
                    break;
            }
            
            // Apply footer translations
            applyFooterTranslations(translations);
        });
}
