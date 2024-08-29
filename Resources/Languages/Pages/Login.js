export function applyLoginTranslations(translations) {
    const elements = {
        title: document.querySelector("#Title"),
        email_Login: document.querySelector("#Email"),
        password: document.querySelector("#Password"),
    };

    if (elements.title) elements.title.textContent = translations.Login.Title;
    if (elements.email_Login) elements.email_Login.textContent = translations.Login.Email;
    if (elements.password) elements.password.textContent = translations.Login.Password;
}