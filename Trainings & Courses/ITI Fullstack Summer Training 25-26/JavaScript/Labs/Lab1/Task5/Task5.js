let char = prompt("Enter a character:").toLowerCase();

switch (char) {
    case 'a':
    case 'e':
    case 'i':
    case 'o':
    case 'u':
        console.log("Vowel");
        break;

    default:
        console.log("Consonant");
}
