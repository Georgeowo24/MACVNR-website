export function applyUpdateMembersTranslations(translations) {
    const elements = {
        title: document.querySelector('#Title'),
        firstNameLabel: document.querySelector('#LbFirstName'),
        lastNameLabel: document.querySelector('#LbLastName'),
        middleNameLabel: document.querySelector('#LbMiddleName'),
        institutionLabel: document.querySelector('#LbInstitution'),
        button: document.querySelector('#Button')
    };

    if (elements.title) elements.title.textContent = translations.Members.Update.Title;
    if (elements.firstNameLabel) elements.firstNameLabel.textContent = translations.Members.Update.LbFirstName;
    if (elements.lastNameLabel) elements.lastNameLabel.textContent = translations.Members.Update.LbLastName;
    if (elements.middleNameLabel) elements.middleNameLabel.textContent = translations.Members.Update.LbMiddleName;
    if (elements.institutionLabel) elements.institutionLabel.textContent = translations.Members.Update.LbInstitution;
    if (elements.button) elements.button.value = translations.Members.Update.Button;
}
