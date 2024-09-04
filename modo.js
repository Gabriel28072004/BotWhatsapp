let darModeEnabled = false;

const darkModeButton = document.getElementById("darkModeButton");

darkModeButton.addEventListener("click", () =>{
    darModeEnabled = !darModeEnabled;

    if(darModeEnabled){
        enableDarkMode();
    }else{
        disableDarkMode();
    }
});

const enableDarkMode = () => {
    document.body.classList.add("dark-mode");
}

const disableDarkMode = () => {
    document.body.classList.remove("dark-mode");
}