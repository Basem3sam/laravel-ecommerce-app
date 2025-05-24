function validateLoginForm() {
    const username = document.forms["loginForm"]["username"].value;
    const password = document.forms["loginForm"]["password"].value;

    if (username === "" || password === "") {
        alert("Both fields must be filled out");
        return false;
    }
    return true;
}

function validateRegisterForm() {
    const username = document.forms["registerForm"]["username"].value;
    const email = document.forms["registerForm"]["email"].value;
    const password = document.forms["registerForm"]["password"].value;

    if (username === "" || email === "" || password === "") {
        alert("All fields must be filled out");
        return false;
    }
    return true;
}