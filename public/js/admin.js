const generatePassword = () => {
    let newPassword = "";
    var char = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789",
        password = document.getElementById("password");

    for (let i = 0; i < 8; i++) {
        newPassword += char.charAt(Math.floor(Math.random() * char.length));
    }
    password.setAttribute("value", newPassword);
};
generatePassword();
