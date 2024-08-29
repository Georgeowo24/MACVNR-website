export function applyIndexTranslations(translations) {
    const elements = {
        title: document.querySelector('#Title'),

        aboutUs: document.querySelector('#AboutUs'),
        aboutUsTxt1: document.querySelector('#AboutUsTxt1'),
        aboutUsTxt2: document.querySelector('#AboutUsTxt2'),
        aboutUsTxt3: document.querySelector('#AboutUsTxt3'),

        titleMissionActivities: document.querySelector('#TitleMissionActivities'),
        txtMissionActivities: document.querySelector('#TxtMissionActivities'),

        titleObjectives: document.querySelector('#TitleObjectives'),
        objectivesItem1: document.querySelector('#ObjectivesItem1'),
        objectivesItem2: document.querySelector('#ObjectivesItem2'),
        objectivesItem3: document.querySelector('#ObjectivesItem3'),
        objectivesItem4: document.querySelector('#ObjectivesItem4'),
        objectivesItem5: document.querySelector('#ObjectivesItem5'),

        titleActivities: document.querySelector('#TitleActivities'),
        ActivitiesItem1: document.querySelector('#ActivitiesItem1'),
        ActivitiesItem2: document.querySelector('#ActivitiesItem2'),
        ActivitiesItem3: document.querySelector('#ActivitiesItem3'),
        ActivitiesItem4: document.querySelector('#ActivitiesItem4'),
        ActivitiesItem5: document.querySelector('#ActivitiesItem5'),
        
        upcomingEvents: document.querySelector('#UpcomingEvents'),
        noEvents: document.querySelector('#NoEvents'),
        viewEvents: document.querySelector('#ViewEvents')
    };

    if (elements.title)elements.title.textContent = translations.Index.Title;

    if (elements.aboutUs)elements.aboutUs.textContent = translations.Index.Main.AboutUs.Title;
    if (elements.aboutUsTxt1)elements.aboutUsTxt1.textContent = translations.Index.Main.AboutUs.Txt1;
    if (elements.aboutUsTxt2){
        const txt2BeforeLink = translations.Index.Main.AboutUs.Txt2.split("Lecture Notes")[0];
        const txt2AfterLink = translations.Index.Main.AboutUs.Txt2.split("Lecture Notes")[1];

        // Crear el contenido con el enlace
        elements.aboutUsTxt2.innerHTML = `${txt2BeforeLink}<a href="https://link.springer.com/conference/mcpr2" target="_blank" id='Link'>Lecture Notes</a>${txt2AfterLink}`;
    }
    if (elements.aboutUsTxt3)elements.aboutUsTxt3.textContent = translations.Index.Main.AboutUs.Txt3;

    if (elements.titleMissionActivities) elements.titleMissionActivities.textContent = translations.Index.Main.MissionActivities.Title;
    if (elements.txtMissionActivities) elements.txtMissionActivities.textContent = translations.Index.Main.MissionActivities.Txt;

    if (elements.titleObjectives) elements.titleObjectives.textContent = translations.Index.Main.MissionActivities.Objectives.Title;
    if (elements.objectivesItem1) elements.objectivesItem1.textContent = translations.Index.Main.MissionActivities.Objectives.Item1;
    if (elements.objectivesItem2) elements.objectivesItem2.textContent = translations.Index.Main.MissionActivities.Objectives.Item2;
    if (elements.objectivesItem3) elements.objectivesItem3.textContent = translations.Index.Main.MissionActivities.Objectives.Item3;
    if (elements.objectivesItem4) elements.objectivesItem4.textContent = translations.Index.Main.MissionActivities.Objectives.Item4;
    if (elements.objectivesItem5) elements.objectivesItem5.textContent = translations.Index.Main.MissionActivities.Objectives.Item5;

    if (elements.titleActivities) elements.titleActivities.textContent = translations.Index.Main.MissionActivities.Activities.Title;
    if (elements.ActivitiesItem1) elements.ActivitiesItem1.textContent = translations.Index.Main.MissionActivities.Activities.Item1;
    if (elements.ActivitiesItem2) elements.ActivitiesItem2.textContent = translations.Index.Main.MissionActivities.Activities.Item2;
    if (elements.ActivitiesItem3) elements.ActivitiesItem3.textContent = translations.Index.Main.MissionActivities.Activities.Item3;
    if (elements.ActivitiesItem4) elements.ActivitiesItem4.textContent = translations.Index.Main.MissionActivities.Activities.Item4;
    if (elements.ActivitiesItem5) elements.ActivitiesItem5.textContent = translations.Index.Main.MissionActivities.Activities.Item5;

    if (elements.upcomingEvents)elements.upcomingEvents.textContent = translations.Index.Aside.UpcomingEvents;
    if (elements.noEvents) elements.noEvents.textContent = translations.Index.Aside.NoEvents;
    if (elements.viewEvents) elements.viewEvents.textContent = translations.Index.Aside.ViewEvents;
}