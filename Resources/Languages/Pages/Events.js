export function applyEventsTranslations(translations) {
    const elements = {
        title: document.querySelector('#Title'),
        btnAddEvents:document.querySelector('#BtnAddEvents'),
    };
    
    if (elements.title) elements.title.textContent = translations.Events.Title;
    if (elements.btnAddEvents) elements.btnAddEvents.textContent = translations.Events.BtnAddEvents;
}