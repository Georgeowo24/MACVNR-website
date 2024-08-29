export function applyCreateMembersTranslations(translations) {
    const elements = {
        title: document.querySelector('#Title'),
        firstNameLabel: document.querySelector('#LbFirstName'),
        lastNameLabel: document.querySelector('#LbLastName'),
        middleNameLabel: document.querySelector('#LbMiddleName'),
        institutionLabel: document.querySelector('#LbInstitution'),
        button: document.querySelector('#Button')
    };

    if (elements.title) elements.title.textContent = translations.Members.Create.Title;
    if (elements.firstNameLabel) elements.firstNameLabel.textContent = translations.Members.Create.LbFirstName;
    if (elements.lastNameLabel) elements.lastNameLabel.textContent = translations.Members.Create.LbLastName;
    if (elements.middleNameLabel) elements.middleNameLabel.textContent = translations.Members.Create.LbMiddleName;
    if (elements.institutionLabel) elements.institutionLabel.textContent = translations.Members.Create.LbInstitution;
    if (elements.button) elements.button.value = translations.Members.Create.Button;
}
