export function applyHeaderTranslations(translations) {
    const elements = {
        homeBtn: document.querySelector('#HomeBtn'),
        dashboardBtn: document.querySelector('#DashboardBtn'),
        managementBoardBtn: document.querySelector('#GoverningBoardBtn'),
        membersBtn: document.querySelector('#MembersBtn'),
        eventsBtn: document.querySelector('#EventsBtn'),
        languageBtn: document.querySelector('#LanguageBtn')
    };

    if (elements.homeBtn) elements.homeBtn.textContent = translations.Header.HomeBtn;
    if (elements.dashboardBtn) elements.dashboardBtn.textContent = translations.Header.DashboardBtn;
    if (elements.managementBoardBtn) elements.managementBoardBtn.textContent = translations.Header.GoverningBoardBtn;
    if (elements.membersBtn) elements.membersBtn.textContent = translations.Header.MembersBtn;
    if (elements.eventsBtn) elements.eventsBtn.textContent = translations.Header.EventsBtn;
    if (elements.languageBtn) elements.languageBtn.textContent = translations.Header.LanguageBtn;
}
