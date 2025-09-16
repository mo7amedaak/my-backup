let answer = prompt("Do You Fly ?").toLowerCase();
if(answer != "yes" && answer != "no"){
    console.log("please answer with yes or no only");
}else{
    if(answer == "yes"){
    answer = prompt("Are you Wild ?").toLowerCase();
    if(answer == "yes"){
        console.log("You are Eagle.");
    }else if(answer == "no"){
        console.log("You are Parrot.");
    }else{
        console.log("please answer with yes or no only");
    }
}else{
    answer = prompt("Do you live under sea ?").toLowerCase();
    if(answer == "yes"){
        answer = prompt("Are you wild ?").toLowerCase();
        if (answer == "yes"){
            console.log("You are Shark.");
        }else if(answer == "no"){
            console.log("You are Dolphin.")
        }else{
            console.log("please answer with yes or no only");
        }
    }else if(answer == "no"){
        answer = prompt("You are wild ?").toLowerCase();
        {
            if(answer == "yes"){
                console.log("You are Lion");
            }else if(answer == "no"){
                console.log("You are Cat");
            }else{
                console.log("please answer with yes or no only");
            }
        }
    }
}
}
