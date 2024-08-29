export function applyUpdateGoverningBoardTranslations(translations) {
    const elements = {
        title: document.querySelector('#Title'),
        dragImage: document.querySelector('#DragImage'),
        uploadImage: document.querySelector('#UploadImage'),
        firstNameLabel: document.querySelector('#LbFirstName'),
        lastNameLabel: document.querySelector('#LbLastName'),
        middleNameLabel: document.querySelector('#LbMiddleName'),
        positionEsLabel: document.querySelector('#LbPositionEs'),
        positionEnLabel: document.querySelector('#LbPositionEn'),
        institutionLabel: document.querySelector('#LbInstitution'),
        button: document.querySelector('#Button')
    };

    if (elements.title) elements.title.textContent = translations.GoverningBoard.Update.Title;
    if (elements.dragImage) elements.dragImage.textContent = translations.GoverningBoard.Update.DragImage;
    if (elements.uploadImage) elements.uploadImage.textContent = translations.GoverningBoard.Update.UploadImage;
    if (elements.firstNameLabel) elements.firstNameLabel.textContent = translations.GoverningBoard.Update.LbFirstName;
    if (elements.lastNameLabel) elements.lastNameLabel.textContent = translations.GoverningBoard.Update.LbLastName;
    if (elements.middleNameLabel) elements.middleNameLabel.textContent = translations.GoverningBoard.Update.LbMiddleName;
    if (elements.positionEsLabel) elements.positionEsLabel.textContent = translations.GoverningBoard.Update.LbPositionEs;
    if (elements.positionEnLabel) elements.positionEnLabel.textContent = translations.GoverningBoard.Update.LbPositionEn;
    if (elements.institutionLabel) elements.institutionLabel.textContent = translations.GoverningBoard.Update.LbInstitution;
    if (elements.button) elements.button.value = translations.GoverningBoard.Create.Button;
}
