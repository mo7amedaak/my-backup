let char = prompt("Enter a character");
let code = char.charCodeAt(0);

if (code >= 48 && code <= 57) {
    console.log("IS DIGIT");
} else {
    console.log("ALPHA");

    if (code >= 65 && code <= 90) {
        console.log("IS CAPITAL");
    } else {
        console.log("IS SMALL");
    }
} 