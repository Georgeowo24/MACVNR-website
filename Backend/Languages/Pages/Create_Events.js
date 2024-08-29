export function applyCreateEventsTranslations(translations) {
    const elements = {
        title: document.querySelector('#Title'),
        nameEventLabel: document.querySelector('#LbNameEvent'),
        descriptionEnLabel: document.querySelector('#LbDescriptionEn'),
        descriptionEsLabel: document.querySelector('#LbDescriptionEs'),
        countryLabel: document.querySelector('#LbCountry'),
        cityLabel: document.querySelector('#LbCity'),
        lbDeadline: document.querySelector('#LbDeadline'),
        lbEventdate: document.querySelector('#LbEventDate'),
        linkEventLabel: document.querySelector('#LbLinkEvent'),
        button: document.querySelector('#Button')
    };

    if (elements.title) elements.title.textContent = translations.Events.Create.Title;
    if (elements.nameEventLabel) elements.nameEventLabel.textContent = translations.Events.Create.LbNameEvent;
    if (elements.descriptionEnLabel) elements.descriptionEnLabel.textContent = translations.Events.Create.LbDescriptionEn;
    if (elements.descriptionEsLabel) elements.descriptionEsLabel.textContent = translations.Events.Create.LbDescriptionEs;
    if (elements.countryLabel) elements.countryLabel.textContent = translations.Events.Create.LbCountry;
    if (elements.cityLabel) elements.cityLabel.textContent = translations.Events.Create.LbCity;
    if (elements.lbDeadline) elements.lbDeadline.textContent = translations.Events.Create.LbDeadline;
    if (elements.lbEventdate) elements.lbEventdate.textContent= translations.Events.Create.LbEventdate;
    if (elements.linkEventLabel) elements.linkEventLabel.textContent = translations.Events.Create.LbLinkEvent;
    if (elements.button) elements.button.value = translations.Events.Create.Button;
}
