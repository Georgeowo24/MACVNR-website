import { applyHeaderTranslations } from './Header.js';
import { applyFooterTranslations } from './Footer.js';

import { applyCreateEventsTranslations } from './Create_Events.js';
import { applyUpdateEventsTranslations } from './Update_Events.js';
import { applyCreateGoverningBoardTranslations } from './Create_Governing_Board.js';
import { applyUpdateGoverningBoardTranslations } from './Update_Governing_Board.js';
import { applyCreateMembersTranslations } from './Create_Members.js';
import { applyUpdateMembersTranslations } from './Update_Members.js';

// Function to load language translations for the specific page
export function loadLanguageForPage(lang, pageId) {
    // Set the document language attribute
    document.documentElement.lang = lang;

    // Fetch the appropriate translation file based on the selected language
    fetch(`../../Languages/JSON/${lang === 'es' ? 'Esp.json' : 'Eng.json'}`)
        .then(response => response.json())
        .then(translations => {
            // Apply header translations
            applyHeaderTranslations(translations);

            // Apply translations based on the page ID
            switch (pageId) {
                case 'CreateEvents':
                    applyCreateEventsTranslations(translations);
                    break;
                case 'UpdateEvents':
                    applyUpdateEventsTranslations(translations);
                    break;
                case 'CreateGoverningBoard':
                    applyCreateGoverningBoardTranslations(translations);
                    break;
                case 'UpdateGoverningBoard':
                    applyUpdateGoverningBoardTranslations(translations);
                    break;
                case 'CreateMembers':
                    applyCreateMembersTranslations(translations);
                    break;
                case 'UpdateMembers':
                    applyUpdateMembersTranslations(translations);
                    break;
                default:
                    
                    break;
            }

            // Apply footer translations
            applyFooterTranslations(translations);
        });
}
