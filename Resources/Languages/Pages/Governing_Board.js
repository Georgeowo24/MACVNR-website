export function applyGoverningBoardTranslations(translations) {
    const elements = {
        title: document.querySelector('#Title'),
        btnAddMembers: document.querySelector('#BtnAddMembers'),
        txt: document.querySelector('#Txt')
    };
    
    if (elements.title) elements.title.textContent = translations.GoverningBoard.Title;
    if (elements.btnAddMembers) elements.btnAddMembers.textContent = translations.GoverningBoard.BtnAddMembers;
    if (elements.txt) elements.txt.textContent = translations.GoverningBoard.Txt;
}