export function applyCreateGoverningBoardTranslations(translations) {
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

    if (elements.title) elements.title.textContent = translations.GoverningBoard.Create.Title;
    if (elements.dragImage) elements.dragImage.textContent = translations.GoverningBoard.Create.DragImage;
    if (elements.uploadImage) elements.uploadImage.textContent = translations.GoverningBoard.Create.UploadImage;
    if (elements.firstNameLabel) elements.firstNameLabel.textContent = translations.GoverningBoard.Create.LbFirstName;
    if (elements.lastNameLabel) elements.lastNameLabel.textContent = translations.GoverningBoard.Create.LbLastName;
    if (elements.middleNameLabel) elements.middleNameLabel.textContent = translations.GoverningBoard.Create.LbMiddleName;
    if (elements.positionEsLabel) elements.positionEsLabel.textContent = translations.GoverningBoard.Create.LbPositionEs;
    if (elements.positionEnLabel) elements.positionEnLabel.textContent = translations.GoverningBoard.Create.LbPositionEn;
    if (elements.institutionLabel) elements.institutionLabel.textContent = translations.GoverningBoard.Create.LbInstitution;
    if (elements.button) elements.button.value = translations.GoverningBoard.Create.Button;
}
