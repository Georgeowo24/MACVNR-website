export function applyDashboardTranslations(translations) {
    const elements = {
        welcome: document.querySelector('#Welcome'),
        dashboardText: document.querySelector('main p.Present-Dashboard'),
        eventsButton: document.querySelector('#Events'),
        membersButton: document.querySelector('#Members'),
        managementBoardButton: document.querySelector('#GoverningBoard'),
    };
    
    const adminName = elements.welcome ? elements.welcome.getAttribute('data-admin-name') : '';

    if (elements.welcome) elements.welcome.textContent = translations.AdminDashboard.Welcome.replace('{admin_name}', adminName);
    if (elements.dashboardText) elements.dashboardText.textContent = translations.AdminDashboard.Text;
    if (elements.eventsButton) elements.eventsButton.textContent = translations.AdminDashboard.Buttons.Events;
    if (elements.membersButton) elements.membersButton.textContent = translations.AdminDashboard.Buttons.Members;
    if (elements.managementBoardButton) elements.managementBoardButton.textContent = translations.AdminDashboard.Buttons.GoverningBoard;
}
