export function applyFooterTranslations(translations) {
    const elements = {
        copyright: document.querySelector('#Copyright'),
        email: document.querySelector('#EmailFooter'),
        location: document.querySelector('#Location'),
        credits: document.querySelector('#Credits')
    };
    
    if (elements.copyright)elements.copyright.textContent = translations.Footer.Copyright;
    if (elements.email) elements.email.textContent = translations.Footer.Email;
    if (elements.location) elements.location.textContent = translations.Footer.Location;
    if (elements.credits) elements.credits.textContent = translations.Footer.Credits;
}
