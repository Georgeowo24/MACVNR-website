export function applyMembersTranslations(translations) {
    const elements = {
        title: document.querySelector('#Title'),
        btnAddMembers: document.querySelector('#BtnAddMembers'),
    };
    
    if (elements.title) elements.title.textContent = translations.Members.Title;
    if (elements.btnAddMembers) elements.btnAddMembers.textContent = translations.Members.BtnAddMembers;
}